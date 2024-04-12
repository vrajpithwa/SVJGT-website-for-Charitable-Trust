<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['text']) && isset($_POST['b64i'])) {
        // Get form data
        $text = $_POST['text'];
        $base64Image = $_POST['b64i'];

        // Connect to your MySQL database (replace DB_HOST, DB_USER, DB_PASS, and DB_NAME with your database credentials)
        $conn = new mysqli('DB_HOST', 'DB_USER', 'DB_PASS', 'DB_NAME');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert data into the database
        $sql = "INSERT INTO your_table_name (text, image) VALUES ('$text', '$base64Image')";

        if ($conn->query($sql) === TRUE) {
            echo "Image uploaded successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    } else {
        echo "Error: Required fields are missing.";
    }
} else {
    echo "Error: Form not submitted.";
}
?>
