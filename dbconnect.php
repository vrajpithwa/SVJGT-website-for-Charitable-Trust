<?php

$servername = "localhost"; // Change this to your MySQL server name if it's not localhost
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "SVDJGT"; // Change this to the name of your MySQL database

// Create connection
$db = new mysqli($servername, $username, $password, $database);
  
// Check connection  
if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
}

?>
