<?php

session_start();

include_once('config.php');


$email = $_POST['email'];
$password = md5($_POST['password']); 

$result = mysqli_query($conn, "Select * from user where user_email= '$email' and user_password='$password' ");

while($row = mysqli_fetch_assoc($result)){
    $name = $row['user_name'];
}

if(mysqli_num_rows($result)>0){
            echo 'success';
            $_SESSION['email'] = $email;
            $_SESSION['password']= $password;
            $_SESSION['name'] = $name;


        //user is online then user_status should be 1
        $query = mysqli_query($conn,"Update user SET user_status = '1' where user_email ='$email'; ");


        header('location: main.php');

}else{

    echo 'failed to login';
    header('location: index.php?login_error=<span style="color:red">username or password incorrect</span>');
}


?>