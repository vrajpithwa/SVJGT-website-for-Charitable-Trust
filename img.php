<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Access form fields
    $amount = $_POST["field8"];
    $name = $_POST['field1'];
    $amount = "Rs." . $_POST['field8'] . "/-";
    $date = date('d/m/Y');
    $sr_no = 'INT' . rand(10000, 99999);
    $phone_no = $_POST['field12'];
    $city = $_POST['field4'];
    $donation = $_POST['field9'];
    $ap = $_POST['field7'];


    // Create image resource
    $image = imagecreatefromjpeg("assets/img/pahoch.jpg");

    
    // Allocate colors
    $color = imagecolorallocate($image, 0, 0, 0); // Black
    $Red = imagecolorallocate($image, 255, 0, 0); // Red
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);

    $x0 = 390; $y0 = 945; // sr no
    $x1 = 390; $y1 = 1035; // name
    $x2 = 1300; $y2 = 1470; // amount
    $x3 = 1130; $y3 = 925; // date
    $x4 = 340; $y4 = 1125; // phone no
    $x5 = 1130; $y5 = 1210; // city
    $x6 = 340; $y6 = 1470; // donation
    $x7 = 450; $y7 = 1870; // aa pa
    $x8 = 500; $y8 = 2000; // aa pa

    // Load font and set font size
    $font = 'assets/font/arialBold.ttf'; // specify the path to your TTF font file
    $fontsize = 35; // Font size

    // Add text to image
   
    imagettftext($image, $fontsize, 0, $x0, $y0, $Black, $font, $sr_no);
    imagettftext($image, $fontsize, 0, $x1, $y1, $Black, $font, $name);
    imagettftext($image, $fontsize, 0, $x2, $y2, $Red, $font, $amount);
    imagettftext($image, $fontsize, 0, $x3, $y3, $Black, $font, $date);
    imagettftext($image, $fontsize, 0, $x4, $y4, $Black, $font, $phone_no);
    imagettftext($image, $fontsize, 0, $x5, $y5, $Black, $font, $city);
    imagettftext($image, $fontsize, 0, $x6, $y6, $Black, $font, $donation);
    imagettftext($image, $fontsize, 0, $x7, $y7, $Black, $font, $ap);
    
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
