<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quiz Beta | Sign Up</title>
    <link rel="shortcut icon" href="images/quizbeta.ico">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link href="assets/css/signup.css" rel="stylesheet">
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
          <a href="support" class="nav-link">Support</a>
        </li>
        <li class="nav-item">
          <a href="feedback" class="nav-link">Feedbacks</a>
        </li>
        <li class="nav-item">
          <a href="login" class="active nav-link">Sign Up</a>
        </li>
      </ul>
    </div>
</div>
	<div class="signup-form">
    <form action="signup" method="post">
		<h2>Register</h2>
		<p class="hint-text">Create your account</p>
      <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Name" required="required" autofocus>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" name="Email" placeholder="E-mail" required="required">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
      </div>
      <div class="form-group">
        <input type="number" class="form-control" name="batch" placeholder="Batch No" required="required">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="college" placeholder="College" required="required">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="Department" placeholder="Department" required="required">
      </div>
		  <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Register Now">
      </div>
    </form>
	<div class="text-center">Already have an account? <a href="login">Sign in</a></div>
</div>
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
//user database
$servername_user = "bp2j2iwxoj98wzzskw0r-mysql.services.clever-cloud.com";
$username_user = "uya0eqkiaev9uhkh";
$password_user = "Oa8sfT9jK5Q9CWol3sFV";
$dbname_user = "bp2j2iwxoj98wzzskw0r";
// Create connection
$conn_user = mysqli_connect($servername_user, $username_user, $password_user, $dbname_user);

  if (!$conn_user)
  {
    die("Connection failed: " . mysqli_connect_error());
  }
   else
  {
    if(isset($_POST['submit']))
    {
      $name=$_POST['name'];
      $email=$_POST['Email'];
      $pass=$_POST['password'];
      $batch=$_POST['batch'];
      $clg=$_POST['college'];
      $dept=$_POST['dept'];
      $sql = "INSERT INTO `users` (`Name`, `email`, `password`, `nooflogin`, `booleanvalue`, `Batch`, `College`, `Department`) VALUES ('$name', '$email', '$pass', 0, 0, '$batch', '$clg', '$dept');";
      if (mysqli_query($conn_user, $sql)) {
           echo "<script> alert('User Registration succesful')</script>";
           echo"<script>window.location='login'</script>";
      }
      else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn_user);
      }
    }
  }
mysqli_close($conn_user);
?>

</body>
</html>                            