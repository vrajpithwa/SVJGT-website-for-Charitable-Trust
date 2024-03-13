<?php
 include('dbconnect.php'); 
// Decrypted values array
$decryptValues = $_POST["decrypted_values"];

// Prepare and bind statement
$stmt = $conn->prepare("INSERT INTO Donation_data (key_name, value) VALUES (?, ?)");

// Bind parameters
$stmt->bind_param("ss", $key, $value);

// Insert values into the database
foreach ($decryptValues as $data) {
    $information = explode('=', $data);
    $key = $information[0];
    $value = $information[1];
    $stmt->execute();
}

echo "Decrypted values saved successfully.";

// Close statement and database connection
$stmt->close();
$conn->close();
?>
