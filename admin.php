<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quiz Beta | ADMIN</title>
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
    <a href="about" class="navbar-brand logo float-left"> Quiz Beta</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarId">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarId">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="home" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="contact" class="nav-link">Support</a>
        </li>
      </ul>
    </div>
</div>

  <br>
  <form class="form-signin" method="post" action="admin">
    <h1 class="h2 mb-3 font-weight-normal">Admin Login</h1>
    <h3 class="h5 mb-3 font-weight-normal">Please sign in</h3>

    <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>

    <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

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

<?php
//admin database
$servername_admin = "bpk2l4hvkbuqymruuzuk-mysql.services.clever-cloud.com";
$username_admin = "u8u9lvzuaw8f3rsd";
$password_admin = "O4CJ4y3aLTVTELSN3MSj";
$dbname_admin = "bpk2l4hvkbuqymruuzuk";
// Create connection
$conn_admin = mysqli_connect($servername_admin, $username_admin, $password_admin, $dbname_admin);
  // Check connection
  if (!$conn_admin) 
  {
    die("Connection failed: " . mysqli_connect_error());
  }
  if(count($_POST)>0)
  {
    $result=mysqli_query($conn_admin,"SELECT * FROM adminlogin WHERE Email='".$_POST["inputEmail"]."' and Password= '".$_POST["inputPassword"]."'");
    $count=mysqli_num_rows($result);
    if($count==0)
    {
      echo "<script type='text/javascript'> alert('Invalid username or password')</script>";
      echo'<script type="text/javascript">window.location="admin.php"</script>';
    }
    else
    {
      $row=$result->fetch_object();
      $_SESSION['name']=$row->Name;
      $_SESSION['mail']=$_POST['inputEmail'];
      header("Location:qb_admin_login");
    }
  }
  mysqli_close($conn_admin);
?>
</body>
</html>
