<?php
// Include the database configuration file
require_once 'dbconfig.php';

// Function to generate transaction ID
function generateTransactionID()
{
    // Generate a random number
    $randomNumber = mt_rand(100000, 999999);

    // Get current timestamp
    $timestamp = microtime(true) * 1000; // Convert to milliseconds

    // Concatenate timestamp and random number
    $transactionID = $timestamp . '-' . $randomNumber;

    return $transactionID;
}

// Function to generate order ID
function generateOrderID()
{
    // Generate a random number
    $randomNumber = mt_rand(100000000, 999999999);

    // Get current timestamp
    $timestamp = time();

    // Concatenate timestamp and random number
    $orderID = $timestamp . '-' . $randomNumber;

    return $orderID;
}

// Generate a unique transaction ID
$tid = generateTransactionID();

// Generate a unique order ID
$order_id = generateOrderID();

// Establish a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve other form data
$merchant_id = $_POST['merchant_id'];
$amount = $_POST['amount'];
$currency = $_POST['currency'];
// Retrieve other form fields as needed

// Prepare SQL statement to insert data into the database
$sql = "INSERT INTO your_table_name (tid, merchant_id, order_id, amount, currency) 
        VALUES ('$tid', '$merchant_id', '$order_id', '$amount', '$currency')";
// Add other form fields to the SQL statement as needed

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close database connection
$conn->close();
?>