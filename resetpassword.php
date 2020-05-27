<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quiz Beta | Reset Password</title>
    <link rel="shortcut icon" href="images/quizbeta.ico">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link href="assets/css/signin.css" rel="stylesheet">
    <link href="assets/css/header.css" rel="stylesheet">
    
</head>
<body class="text-center">

<div class="header navbar navbar-expand-md navbar-light">
    <a href="about"  class="navbar-brand logo float-left"> Quiz Beta</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarId">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarId">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="home" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="about" class="nav-link">About Us</a>
        </li>
        <li class="nav-item">
          <a href="contact" class="nav-link">Support</a>
        </li>
        <li class="nav-item">
          <a href="feedback" class="nav-link">Feedbacks</a>
        </li>
        <li class="nav-item">
          <a href="login" class="nav-link active">Login</a>
        </li>
      </ul>
    </div>
</div>

  <br>
  <form class="form-signin" method="post" action="resetpassword">
    <h1 class="h2 mb-3 font-weight-normal">Online Quiz</h1>
    <h3 class="h5 mb-3 font-weight-normal">Reset my Password</h3>

    <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>

    <input type="password" name="oldPassword" class="form-control" placeholder="Current Password" required>

    <input type="password" name="newPassword" class="form-control" placeholder="New Password" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="sub()">Reset Now</button>

    <a href="login">Back to Login</a>

  </form>

  <div class="container-fluid" style="height: 80px;"></div>
  <footer class="page-footer fixed-bottom font-small text-muted" style="background-color: #f1f1f1; bottom:0;">
    <div class="footer-copyright text-center py-3">
      &copy; 2020 Copyright:
      <a href="about"> Quiz Beta</a>
      <br>
      Developed and Maintained by <a href="https://api.whatsapp.com/send?phone=+919080335279"> Meiyazhagan K</a> | <a href="https://api.whatsapp.com/send?phone=+918825972584"> Navin Balaji R K</a>
    </div>
  </footer>

<?php
  session_start();
//user database
$servername_user = "bp2j2iwxoj98wzzskw0r-mysql.services.clever-cloud.com";
$username_user = "uya0eqkiaev9uhkh";
$password_user = "Oa8sfT9jK5Q9CWol3sFV";
$dbname_user = "bp2j2iwxoj98wzzskw0r";
// Create connection
$conn_user = mysqli_connect($servername_user, $username_user, $password_user, $dbname_user);
  // Check connection
  if (!$conn_user) 
  {
    die("Connection failed: " . mysqli_connect_error());
  }
  if(count($_POST)>0)
  {
    $email=$_POST["inputEmail"];
    $oldpass=$_POST["oldPassword"];
    $newpass=$_POST["newPassword"];

    $result=mysqli_query($conn_user,"SELECT * FROM users WHERE email='".$email."' and Password= '".$oldpass."'");

    $count=mysqli_num_rows($result);

    if($count==0)
    {
      echo "<script type='text/javascript'> alert('Invalid Old Password')</script>";
    }
    else
    {
      mysqli_query($conn_user,"UPDATE users SET Password = '".$newpass."' WHERE email='".$email."';");
      header("location:login");
      echo "<script>alert('Password reset successful');</script>";
    }
  }
  mysqli_close($conn_user);
?>
</body>
</html>
