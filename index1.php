<?php
session_start(); // Start a session

if (isset($_POST['submit'])) {
    // Retrieve form data and store it in session variables
    $_SESSION['name'] = $_POST['field1'];
    // Other session variables...

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Load the uploaded image
        $sourceImage = imagecreatefromjpeg($_FILES['image']['tmp_name']);
    } else {
        echo "No valid image uploaded.";
        exit;
    }

    // Load the background image
    $backgroundImage = imagecreatefromjpeg('./new_slip.jpg');

    // Specify the coordinates to place the uploaded image
    $xCoord = 100; // Adjust as needed
    $yCoord = 200; // Adjust as needed

    // Combine the background and uploaded image at the specified coordinates
    imagecopy($backgroundImage, $sourceImage, $xCoord, $yCoord, 0, 0, imagesx($sourceImage), imagesy($sourceImage));

    // Set the Content-Type header to output the image
    header('Content-Type: image/jpeg');

    // Output the modified image directly to the browser
    imagejpeg($backgroundImage);

    // Clean up to free up memory
    imagedestroy($sourceImage);
    imagedestroy($backgroundImage);
} else {
    // Handle the case when the form is not submitted
    echo "Form data not submitted. Please ensure the form was submitted.";
}
?>
