<html>
<head>
<title> Non-Seamless-kit</title>
</head>
<body>
<center>

<?php include('Crypto.php')?>
<?php 
    require_once realpath(__DIR__ . '/vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
	error_reporting(0);
	
	$merchant_id=$_ENV['MERCHANT_ID'];
	$working_key=$_ENV['WORKING_KEY']; //Shared by CCAVENUES
	$access_code=$_ENV['ACCESS_CODE'];//Shared by CCAVENUES
	$currency = 'INR';
	$language = 'EN';
	
	$merchant_data .= 'merchant_id=' . $merchant_id . '&';
    $merchant_data .= 'language=' . $language . '&';
    $merchant_data .= 'currency=' . $currency . '&';
    
    $redirect_url = 'https://shreevachchhrajdadajivdayagausevatrust.com/ccavResponseHandler.php';
    $cancle_url = 'https://shreevachchhrajdadajivdayagausevatrust.com/ccavResponseHandler.php';
    $merchant_data .= 'redirect_url=' . $redirect_url . '&';
    $merchant_data .= 'cancle_url=' . $cancle_url . '&';

    function generateOrderId() {
        $dateTime = new DateTime();
        $seconds = round(microtime(true)/1000000000); // Get current time in seconds
        return  $dateTime->format('YmdHis').$seconds; // Format: TID_YYYYMMDDHHMMSS<ms>
    }
    $OId = generateOrderId();
    $OrId = $OId;
    $merchant_data .= 'order_id=' . $OrId . '&';
    
	foreach ($_POST as $key => $value){
    $merchant_data.=$key.'='.$value.'&';
	}

	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

?>
<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>