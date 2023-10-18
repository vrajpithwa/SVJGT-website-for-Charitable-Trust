<?php
session_start(); // Start a session

if (isset($_POST['submit'])) {
    // Retrieve form data and store it in session variables
    $_SESSION['name'] = $_POST['field1'];
    $_SESSION['amount'] = "Rs." . $_POST['field8'] . "/-";
    $_SESSION['date'] = date('d/m/Y');
    $_SESSION['sr_no'] = 'INT' . rand(10000, 99999);
    $_SESSION['phone_no'] = $_POST['field12'];
    $_SESSION['city'] = $_POST['field4'];
    $_SESSION['state'] = $_POST['field5'];

    // Load the image
    $sourceImage = imagecreatefromjpeg('./slip.jpg');

    // Define the text elements and their coordinates
    $x0 = 320; $y0 = 630; // sr no
    $x1 = 260; $y1 = 715; // name
    $x2 = 950; $y2 = 1570; // amount
    $x3 = 730; $y3 = 625; // date
    $x4 = 230; $y4 = 790; // phone no
    $x5 = 260; $y5 = 865; // city
    $fontFile = './arialBold.ttf'; // Replace with the path to your TrueType font file
    $fontSize = 30; // Specify your desired font size
    $color = imagecolorallocate($sourceImage, 0, 0, 0); // Black

    // Add the text elements to the image with custom font size and font file
    imagettftext($sourceImage, $fontSize, 0, $x0, $y0, $color, $fontFile, $_SESSION['sr_no']);
    imagettftext($sourceImage, $fontSize, 0, $x1, $y1, $color, $fontFile, $_SESSION['name']);
    imagettftext($sourceImage, $fontSize, 0, $x2, $y2, $color, $fontFile, $_SESSION['amount']);
    imagettftext($sourceImage, $fontSize, 0, $x3, $y3, $color, $fontFile, $_SESSION['date']);
    imagettftext($sourceImage, $fontSize, 0, $x4, $y4, $color, $fontFile, $_SESSION['phone_no']);
    imagettftext($sourceImage, $fontSize, 0, $x5, $y5, $color, $fontFile, $_SESSION['city']);

    // Set the Content-Type header to output the image
    header('Content-Type: image/jpeg');

    // Output the modified image
    imagejpeg($sourceImage);

    // Clean up to free up memory
    imagedestroy($sourceImage);
} else {
    // Handle the case when the form is not submitted
    echo "Form data not submitted. Please ensure the form was submitted.";
}
?>
