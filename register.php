<?php

include_once('config.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = md5($_POST['pass1']);


$result = mysqli_query($conn,"INSERT INTO user (user_id,user_name,user_email,user_password,user_status)
  Values (NULL,'$name','$email','$password','0');");


if($result){
    header('location: index.php?registration_successful=<span style="color:green">you have registered successfully. please login to continue</span>');
}else{
    echo "failed to register";
}


?>