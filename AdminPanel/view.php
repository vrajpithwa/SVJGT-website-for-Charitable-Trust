<?php
// Connect to your MySQL database (replace DB_HOST, DB_USER, DB_PASS, and DB_NAME with your database credentials)
$servername = "localhost"; // Change this to your MySQL server name if it's not localhost
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "SVDJGT"; // Change this to the name of your MySQL database

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
  
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, image FROM image";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output HTML content with multiple <img> tags for each image
    while ($row = $result->fetch_assoc()) {
        $imageId = $row['id'];
        $base64ImageData = $row['image'];

        // Generate the <img> tag with base64 data as src
        echo "<img src=\"data:image/jpeg;base64,$base64ImageData\" alt=\"Image $imageId\"><br>";
    }

    // Close the database connection
    $conn->close();
} else {
    $conn->close();
    echo "No images found.";
}
?>