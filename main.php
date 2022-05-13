<?php 
session_start();
?>

<?php 
 
  if(!isset($_SESSION['email']) && !isset($_SESSION['password'])
     && empty($_SESSION['email']) && empty($_SESSION['password'])){

        header('location: index.php');
     }


?>


<script>


         function getText(){
             var message = document.getElementById('text').value;
             document.getElementById('text').value = "";

            xhr = new XMLHttpRequest();
            xhr.open('POST','sendToChat.php',true);
            xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
            xhr.send('chat='+message);
            xhr.onreadystatechange = function(){

               if(xhr.responseText){

               }
            }

         }


         function setText(){
           xhr = new XMLHttpRequest();
           xhr.open('POST','getChatText.php',true);
           xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
           xhr.send();
           xhr.onreadystatechange = function(){

            //display messages
            document.getElementById('chatarea').innerHTML = xhr.responseText;
            //scroll to last message
            document.getElementById('chatarea').scrollTop = document.getElementById('chatarea').scrollHeight;

           }
         }

         //keep calling setText function
         setInterval("setText()",2000);


         function getUsers(){

            xhr1 = new XMLHttpRequest();
            xhr1.open('POST','getUsers.php',true);
            xhr1.setRequestHeader('content-type','application/x-www-form-urlencoded');
            xhr1.send();
            xhr1.onreadystatechange = function(){

                 document.getElementById('loggedInUsers').innerHTML = xhr1.responseText;
            }

         }

         setInterval("getUsers()",3000);



</script>




<?php

include_once('config.php');

 if(isset($_GET['logout'])){
     $result = mysqli_query($conn, "UPDATE user SET user_status = '0'  WHERE user_email = '$_SESSION[email]'; ");

     session_destroy();
     header('location: index.php?loggedout_successfully');
 }

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>




<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <img src="https://thetius.com/wp-content/uploads/2019/11/chatbot-4071274_1920.jpg" style="width:75px; margin:10px; border-radius:10px" />
    <a class="navbar-brand" href="#">ChatApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="main.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
    
      </ul>
    </div>
  </div>
</nav>




<div id="chatbox" class="container">

  <h2 class="text-center">ChatApp</h2>

   
  <div class="media" style="background-color: whitesmoke; padding:10px; height:90px">
   <img src="https://thetius.com/wp-content/uploads/2019/11/chatbot-4071274_1920.jpg" class="rounded-circle" style="float:left; width:70px; height:70px"/>
   <div class="media-body">
      <h5 style="margin-left: 10px; margin-top:5px">Chat</h5>
   </div>
   <form method="get" class="mr-2" style="float: right;">
        <input type="submit" class="btn btn-danger" name="logout" value="logout"/>
   </form>
</div>



<div id="chatarea" class="container border overflow-auto" style="width: 75%; float:left; height:450px">

</div>

<div class="container border overflow-auto" style="margin: 10px; display:inline-block; width:20%">
   <p>chat participants</p>
   <div id="loggedInUsers"></div>
</div>


<div class="input-group" style="width: 75%; clear:both; margin-bottom:40px">
  <input type="text" id="text" class="form-control"/>
  <div class="input-group-append">
     <button id="sendBtn" class="btn btn-primary" type="button" onclick="getText()">Send</button>

  </div>
</div>




</div>











    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>