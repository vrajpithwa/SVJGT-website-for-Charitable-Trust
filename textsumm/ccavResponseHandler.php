<?php

    include 'Crypto.php';
    require_once('dbconnect.php'); 
    require_once realpath(__DIR__ . '/vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
	error_reporting(0);
	
	$workingKey=$_ENV['WORKING_KEY'];		
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
    // print_r($rcvdString);echo"_________________decryption_________";
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
// 	echo"$dataSize";

// 	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
	}

	if($order_status==="Success")
	{
	 // Filter only the required keys and values
    // $redirect_data = [];
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
    
    // // Redirect to success.html with query parameters
    $redirect_url = 'PaymentSuccess.html?' . http_build_query($redirect_data);
    header('Location: ' . $redirect_url);
    echo"success";
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

// 	echo "<table cellspacing=4 cellpadding=4>";
// 	for($i = 0; $i < $dataSize; $i++) 
// 	{
// 		$information=explode('=',$decryptValues[$i]);
// 	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
// 	}

// 	echo "</table><br>";
// 	echo "</center>";
	
	
// 	echo"Adding data in Database";
	
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
    
  
    // echo "generating tid";
    $tid = generateTID();
        
    // echo "$tid";
    $sql = "INSERT INTO PaymentData (TID,$columns) VALUES ('$tid','$values')";
    
    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo ".";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
	
	
// 	echo"Data added in the Database";



$order_id = null; // Initialize order_id variable
$required_key = 'order_id'; // Specify the required key

foreach ($decryptValues as $pair) {
    $information = explode('=', $pair, 2); // Limiting explode to only split once
    $key = $information[0];
    $value = $information[1];
    
    if ($key === $required_key) {
        $order_id = $value; // Assign the value to $order_id if the key matches
        break; // Exit the loop since the required value has been found
    }
}

// echo $order_id;
// echo"123";
 require realpath(__DIR__ . '/vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    error_reporting(0);
    $working_key = $_ENV['WORKING_KEY'];//Shared by CCAVENUES

    $access_code = $_ENV['ACCESS_CODE'];

// echo"123444";

    

$merchant_json_data =
array(
	'order_no' => $order_id,
	'reference_no' =>'',
	
);

// echo"$orderid";
// echo"order added";

$merchant_data = json_encode($merchant_json_data);
// echo"merchant data encode in json";
$encrypted_data = encrypt($merchant_data, $working_key);
// echo"$encryted_data";
$final_data = 'enc_request='.$encrypted_data.'&access_code='.$access_code.'&command=orderStatusTracker&request_type=JSON&response_type=JSON';
// $final_data = 'enc_request='.$encrypted_data.'&access_code='.$access_code.'&command=orderStatusTracker&request_type=JSON&response_type=JSON';

echo"fetching data"."$final_data";


$ch = curl_init();


curl_setopt($ch, CURLOPT_VERBOSE, 1);
// echo"________3_________";

curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
// echo"5";

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// echo"___________2______________";

curl_setopt($ch, CURLOPT_URL, "https://apitest.ccavenue.com/apis/servlet/DoWebTrans");
// echo"____________1____________________";

curl_setopt($ch, CURLOPT_POST, 1);
// echo"____________6__________";

curl_setopt($ch, CURLOPT_POSTFIELDS, $final_data);
// echo"_______7___________";
// Get server response ...
$result = curl_exec($ch);
// echo"___________8___________";
// print_r($result);

curl_close($ch);
$status = '';
$information = explode('&', $result);
// print_r($information);
// echo("____________________________************************************************************___________________________________________________________");
// print_r($d);
// echo"___________9___________";


$dataSize = sizeof($information);
for ($i = 0; $i < $dataSize; $i++) {
	$info_value = explode('=', $information[$i]);
	if ($info_value[0] == 'enc_response') {
		$status = decrypt(trim($info_value[1]), $working_key);
		
	}
}


// echo"$status";
echo 'Status revert is: ' . $status.'<pre>';
$obj = json_decode($status);
print_r($obj);



?>




