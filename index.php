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






<form class="container" method="post" action="register.php" id="registration_form" style="display: none;">

    <h1>Registration</h1>

    <?php if(isset($_GET['registration_successful'])){?>
      <?php echo $_GET['registration_successful']; ?>
      <?php } ?>

    <div class="mb-3">
       <label class="form-label">Name</label>
       <input type="text" name="name" class="form-control" placeholder="Name" required/>
    </div>

    <div class="mb-3">
       <label class="form-label">Email Address</label>
       <input type="email" name="email" class="form-control" placeholder="email" required/>
    </div>



    <div class="mb-3">
       <label class="form-label">Password</label>
       <input type="password" name="pass1" id="pass1" class="form-control" placeholder="Password" required/>
    </div>



    <div class="mb-3">
       <label class="form-label">Confirm Password</label>
       <input type="password" name="pass2" id="pass2" class="form-control" placeholder="Confirm password" required/>
    </div>


    <div class="mb-3">
      <div id="cnfrmpass"></div>
    </div>



    <div class="mb-3">
       <button type="submit" name="sbt"  class="btn btn-primary mb-3">Submit</button>
       <button onclick="document.getElementById('registration_form').style.display ='none'; 
        document.getElementById('login_form').style.display = '';  "      class="btn btn-primary mb-3">Login</button>
       
    </div>



</form>





<form class="container" method="post" action="login.php" id="login_form" >

    <h1>Login</h1>

    <?php if(isset($_GET['login_error'])){ ?>
      <?php echo $_GET['login_error']; ?>
      <?php } ?>

    
    <div class="mb-3">
       <label class="form-label">Email Address</label>
       <input type="email" name="email" class="form-control" placeholder="email" required/>
    </div>



    <div class="mb-3">
       <label class="form-label">Password</label>
       <input type="password" name="password" id="password" class="form-control" placeholder="Password" required/>
    </div>





    <div class="mb-3">
       <button type="submit" name="loginbtn"  class="btn btn-primary mb-3">Login</button>
       <button  onclick="document.getElementById('login_form').style.display ='none'; 
        document.getElementById('registration_form').style.display = '';  "  
         class="btn btn-primary mb-3">Register</button>
       
    </div>



</form>






    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>