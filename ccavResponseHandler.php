<?php include('Crypto.php')?>
<?php
    require_once('dbconnect.php'); 
    require_once realpath(__DIR__ . '/vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
	error_reporting(0);
	
	$workingKey=$_ENV['WORKING_KEY'];		
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo"$dataSize";

	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
	}

	if($order_status==="Success")
	{
	 // Filter only the required keys and values
    $redirect_data = [];
    $required_keys = ['order_id', 'amount'];
    for($i = 0; $i < $dataSize; $i++) {
        $information = explode('=',$decryptValues[$i]);
        $key = $information[0];
        $value = $information[1];
        if (in_array($key, $required_keys)) {
            $redirect_data[$key] = $value;
        }
    }
    
    // Redirect to success.html with query parameters
    $redirect_url = 'PaymentSuccess.html?' . http_build_query($redirect_data);
    header('Location: ' . $redirect_url);
	}
	else if($order_status==="Aborted")
	{
// 		echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
		$redirect_url = 'PaymentAborted.html';
		 header('Location: ' . $redirect_url);
	
	}
	else if($order_status==="Failure")
	{
	
		$redirect_url = 'PaymentFailure.html';
		 header('Location: ' . $redirect_url);
	}
	else
	{
		echo "<br>Security Error. Illegal access detected";
	
	}

	echo "<br><br>";

	echo "<table cellspacing=4 cellpadding=4>";
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
	}

	echo "</table><br>";
	echo "</center>";
	
	echo"Adding data in Database";
	
	$keyValuePairs = [];
	
	for($i = 0; $i < $dataSize; $i++) {
    $information = explode('=', $decryptValues[$i]);
    
    // Extract key and value
    $key = $information[0];
    $value = $information[1];
    
    // Store key-value pair in the array
    $keyValuePairs[$key] = $value;
    }

    $columns = implode(", ", array_keys($keyValuePairs));
    $values = implode("', '", $keyValuePairs);
    
     function generateTID() {
        $dateTime = new DateTime();
        // $milliseconds = round(microtime(true) * 10); // Get current time in milliseconds
        return 'TID_' . $dateTime->format('YmdHis'); // Format: TID_YYYYMMDDHHMMSS<ms>
    }
    
  
    echo "generating tid";
    $tid = generateTID();
        
    echo "$tid";
    $sql = "INSERT INTO PaymentData (TID,$columns) VALUES ('$tid','$values')";
    
    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
	
	
	echo"Data added in the Database";

?>

