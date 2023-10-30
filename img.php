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
    $_SESSION['donation'] = $_POST['field9'];
    $_SESSION['ap'] = $_POST['field7'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Load the uploaded image
        $overlay_image = imagecreatefromjpeg($_FILES['image']['tmp_name']);

        // Adjust the size of the overlay image
        $newWidth = 800; // Adjust to your desired width
        $newHeight = 500; // Adjust to your desired height
        $resizedOverlay = imagescale($overlay_image, $newWidth, $newHeight);

        // Clean up the original overlay image
        imagedestroy($overlay_image);
    } else {
        echo "No valid image uploaded.";
        exit;
    }

    // Load the background image
    $sourceImage = imagecreatefromjpeg('./new_slip.jpg');   

    // Define the text elements and their coordinates
    $x0 = 390; $y0 = 945; // sr no
    $x1 = 390; $y1 = 1035; // name
    $x2 = 1300; $y2 = 1470; // amount
    $x3 = 1130; $y3 = 925; // date
    $x4 = 340; $y4 = 1125; // phone no
    $x5 = 1130; $y5 = 1210; // city
    $x6 = 340; $y6 = 1470; // donation
    $x7 = 450; $y7 = 1870; // aa pa
    $x8 = 500; $y8 = 2000; // aa pa

    $fontFile = './arialBold.ttf'; // Replace with the path to your TrueType font file
    $fontSize = 35; // Specify your desired font size
    $color = imagecolorallocate($sourceImage, 0, 0, 0); // Black
    $color1 = imagecolorallocate($sourceImage, 255, 0, 0); // Red

    // Add the text elements to the image with custom font size and font file
    imagettftext($sourceImage, $fontSize, 0, $x0, $y0, $color1, $fontFile, $_SESSION['sr_no']);
    imagettftext($sourceImage, $fontSize, 0, $x1, $y1, $color, $fontFile, $_SESSION['name']);
    imagettftext($sourceImage, $fontSize, 0, $x2, $y2, $color1, $fontFile, $_SESSION['amount']);
    imagettftext($sourceImage, $fontSize, 0, $x3, $y3, $color, $fontFile, $_SESSION['date']);
    imagettftext($sourceImage, $fontSize, 0, $x4, $y4, $color, $fontFile, $_SESSION['phone_no']);
    imagettftext($sourceImage, $fontSize, 0, $x5, $y5, $color, $fontFile, $_SESSION['city']);
    imagettftext($sourceImage, $fontSize, 0, $x6, $y6, $color, $fontFile, $_SESSION['donation']);
    imagettftext($sourceImage, $fontSize, 0, $x7, $y7, $color, $fontFile, $_SESSION['ap']);

    // Combine the background and resized overlay image at the specified location
    imagecopy($sourceImage, $resizedOverlay, $x8, $y8, 0, 0, $newWidth, $newHeight);

    // Set the Content-Type header to output the image
    header('Content-Type: image/jpeg');

    // Output the modified image
    imagejpeg($sourceImage);

    // Clean up to free up memory
    imagedestroy($sourceImage);
    imagedestroy($resizedOverlay);
} else {
    // Handle the case when the form is not submitted
    echo "Form data not submitted. Please ensure the form was submitted.";
}
?>
