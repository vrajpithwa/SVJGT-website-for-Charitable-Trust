<?php
include 'db.php';
if(isset($_POST['insert'])){
    
    $name  = clean($_POST['name']);
    $batch = clean($_POST['batch']);
    $email = clean($_POST['email']);
    $image_name = $_FILES['image']['name'];
    $image = $_FILES['image']['tmp_name'];
    $location = "../images/".$image_name;
    move_uploaded_file($image,$location);
    // echo "$name <br>$batch
    // echo $name.$batch.$email         
    $query = "INSERT INTO `student`(name,batch,email,image) VALUES ('".escape($name)."','".escape($batch)."','".escape($email)."','".escape($image_name)."') ";
    // $query = "INSERT INTO `student`(name,batch,email) VALUES ('".escape($name)."','".escape($batch)."','".escape($email)."') ";
    $result = mysqli_query($conn,$query);
    if($result){
        header('location:../index.php');
    }
}


?>