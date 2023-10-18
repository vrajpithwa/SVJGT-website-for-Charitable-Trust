<?php
    if (isset($_POST['submit']))
    {
        include("./dbconnect.php");
        
        // Sanitize user inputs
        $f1 = mysqli_real_escape_string($conn, $_POST['field1']);
        $f2 = mysqli_real_escape_string($conn, $_POST['field2']);
        $f3 = mysqli_real_escape_string($conn, $_POST['field3']);
        $f4 = mysqli_real_escape_string($conn, $_POST['field4']);
        $f5 = mysqli_real_escape_string($conn, $_POST['field5']);
        $f6 = mysqli_real_escape_string($conn, $_POST['field6']);
        $f7 = mysqli_real_escape_string($conn, $_POST['field7']);
        $date = date("d-m-Y");

        // Handle image upload
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check file size
        if ($_FILES["image"]["size"] > 2000000)  {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $photo = basename($_FILES["image"]["name"]);
                // $sql = "INSERT INTO form_data(amount, name, aadhar_no, pan_no, date, photo) VALUES('$f1','$f2','$f3','$f4','$date','$photo')";
$sql = "INSERT INTO `Donation`( `fname`, `lname`, `address`, `city`, `state`, `zip`, `aadhar_pan`, `date`, `image`) VALUES ('$f1','$f2','$f3','$f4','$f5','$f6','$f7','$date','$photo')";
                if ($conn->query($sql) === TRUE) {
                    echo "Data inserted successfully";
                } else {
                    echo "Error inserting data: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body{
            background-color: #FFFBDB;
        }
        div {
            text-align: center;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }
        @media (max-width: 767px) {
            .my-element {
                width: 100%;
                float: none;
            }
        }
        
    </style>
    <div>
        
        <!--<img src = "./submit.png">-->
        <form>
            <h1>મહિતી અપવા બાદલ આપનો ખુબ ખુબ આભાર નીચે ના બટન પર ક્લિક કરી ને તમે દાન કરી શકો છો</h1>
            <script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_Lc3m2JdT5HNB4b" async> </script> </form>
    </div>
    
</body>
</html>