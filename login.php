<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quiz Beta | Login</title>
    <link rel="shortcut icon" href="images/quizbeta.ico">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

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
  <form class="form-signin" method="post" action="login">
    <h1 class="h2 mb-3 font-weight-normal">Online Quiz</h1>
    <h3 class="h5 mb-3 font-weight-normal">Please sign in</h3>

    <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>

    <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Take Test</button>
    <a href="resetpassword" class="fgpass">Reset your password ?</a>

  </form>

  <div class="container-fluid" style="height: 80px;"></div>
  <footer class="page-footer font-small text-muted" style="background-color: #f1f1f1; bottom:0;">
    <div class="footer-copyright text-center py-3">
      &copy; 2020 Copyright:
      <a href="about"> Quiz Beta</a>
      <br>
      Developed and Maintained by <a href="https://api.whatsapp.com/send?phone=+919080335279"> Meiyazhagan K</a> | <a href="https://api.whatsapp.com/send?phone=+918825972584"> Navin Balaji R K</a>
    </div>
  </footer>
<script type="text/javascript">
  function windowOpen() { 
    window.open("test","_blank");
  }
</script>
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
    $result=mysqli_query($conn_user,"SELECT * FROM users WHERE email='".$_POST["inputEmail"]."' and Password= '".$_POST["inputPassword"]."'");
    $count=mysqli_num_rows($result);
    if($count==0)
    {
      echo "<script type='text/javascript'> alert('Invalid username or password')</script>";
      echo'<script type="text/javascript">window.location="login"</script>';
    }
    else
    {
      $_SESSION['mail']=$_POST['inputEmail'];
      $x=mysqli_query($conn_user,"SELECT booleanvalue FROM users WHERE email='".$_POST["inputEmail"]."';");
      while ($row = $x->fetch_assoc()) 
      {
        if($row['booleanvalue']=='0')
        {
          $upquery=mysqli_query($conn_user,"UPDATE users SET booleanvalue = 1 WHERE email='".$_POST["inputEmail"]."';");
          echo '<script type="text/javascript">windowOpen();</script>';
          $_SESSION['lastlogin']=time();
        }
        else
        {
          echo '<script>alert("You have already taken the tests")</script>';
        }
      }
    }
  }
  mysqli_close($conn_user);
?>
</body>
</html>
