<?php
     
    $servername = "68.178.148.7";
    $username = "shreevachchhrajdadajivdaya";
    $password = "Ketan@16976";
    $dbname = "SVDJGT";
    
    // Create connection
    $conn = mysqli_connect($servername,$username,$password,$dbname);//mysqli|false{};
    // echo $conn;
    $db=mysqli_select_db($conn,$dbname);
    // Check connection
    if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
    }  
?>