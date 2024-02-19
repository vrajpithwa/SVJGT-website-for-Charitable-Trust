<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Access form fields
    $amount = "Rs." . $_POST['field8'] . "/-";
   


    // Create image resource
    $image = imagecreatefromjpeg("assets/img/new_slip.jpg");

    
    // Allocate colors
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);

    $x2 = 1300; $y2 = 1470; // amount
   
    // Load font and set font size
    $font = 'arialBold.ttf'; // specify the path to your TTF font file
    $fontsize = 25; // Font size

    // Add text to image
    imagettftext($image, $fontsize, 0, $x2, $y2, $black, $font, $amount);
   // Upload and display image
    // Upload and display image
if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $img_tmp = $_FILES['image']['tmp_name'];
    
    // Get image information
    $img_info = getimagesize($img_tmp);
    $img_mime = $img_info['mime'];

    // Create image resource based on MIME type
    switch ($img_mime) {
        case 'image/jpeg':
        case 'image/jpg':
            $uploaded_img = imagecreatefromjpeg($img_tmp);
            break;
        case 'image/png':
            $uploaded_img = imagecreatefrompng($img_tmp);
            break;
        // Add cases for other formats as needed
        default:
            // Handle unsupported image formats
            break;
    }

    if ($uploaded_img) {
        // Get the dimensions of uploaded image
        $img_width = 800;
        $img_height = 500;

        // Coordinates to place the uploaded image
        $upload_x = 500; // Specify the X coordinate
        $upload_y = 2000; // Specify the Y coordinate
        $newWidth = 800; // Adjust to your desired width
        $newHeight = 500; // Adjust to your desired height

        $resizedOverlay = imagescale($uploaded_img, $newWidth, $newHeight);    
        // Copy the uploaded image onto the main image
        imagecopyresampled($image, $resizedOverlay, $upload_x, $upload_y, 0, 0, $newWidth, $newHeight, $newWidth, $newHeight);
    } else {
        echo"Failed to create image resource";
        // Failed to create image resource
        // Handle the error accordingly
    }
}


    // Output image
    header("Content-type: image/jpeg");
    imagejpeg($image);

    // Free up memory
    imagedestroy($image);
}
?>
