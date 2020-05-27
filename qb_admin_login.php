<?php 
  session_start();
  if($_SESSION["name"])
  {
  }
  else
  {

    echo "<script>alert('Please login first');</script>";
    header("Location:admin");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quiz Beta | ADMIN</title>
    <link rel="shortcut icon" href="images/quizbeta.ico">

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
          <a href="admin" class="active nav-link">ADMIN</a>
        </li>
        <li class="nav-item">
          <a href="home" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="signup" class="nav-link">Sign Up</a>
        </li>
        <li class="nav-item">
          <a href="login" class="nav-link">Sign In</a>
        </li>
        <li class="nav-item">
          <a href="viewfeedbacks" class="nav-link">View Feedbacks</a>
        </li>
        <li class="nav-item">
          <a href="addresult" class="nav-link">Add Result</a>
        </li>
        <li class="nav-item">
          <a href="presentees" class="nav-link">Presentees</a>
        </li>
        <li class="nav-item">
          <a href="absentees" class="nav-link">Absentees</a>
        </li>
        <li class="nav-item">
          <a href="preview" class="nav-link">Preview</a>
        </li>
        <li class="nav-item">
          <a href="logoutadmin.php" class="nav-link bg-danger font-weight-bold">Logout</a>
        </li>
      </ul>
    </div>
</div>
  <h2 style="margin-top:20px;" class="font-weight-bold"> 
    Admin : <?php echo $_SESSION["name"]; ?> 
  </h2>

  <div class="row">

    <form class="form-signin p-3" method="post" action="qb_admin_login">
        <label>Permitting Attempts</label> 
        <input type="email" name="emailatmpt" class="form-control" placeholder="Email address" required autofocus>
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Permit</button>
    </form>

    <form class="form-signin p-3" method="post" action="qb_admin_login">
        <label>Adding Quizzes</label>
        <input type="text" name="testname" class="form-control" placeholder="Test Name" required autofocus>
        <textarea name="link" class="form-control" placeholder="Form Link (Avoid Shortened Link)" required autofocus></textarea>
        <input type="time" name="time" class="form-control" placeholder="Time" required autofocus>
      <button class="btn btn-lg btn-primary btn-block" name="submittest" type="submit">Assign Quiz</button>
    </form>

    <form class="form-signin p-3" method="post" action="qb_admin_login">
        <label>Change Password</label> 
        <input type="email" name="emailchpass" class="form-control" placeholder="Email address" required autofocus>
        <input type="text" name="chpass" class="form-control" placeholder="New Password" required autofocus>
      <button class="btn btn-lg btn-primary btn-block" name="submitchpass" type="submit" >Change</button>
    </form>
   </div>

  <div class="container-fluid" style="height: 80px;"></div>
  <footer class="page-footer font-small text-muted" style="background-color: #f1f1f1; bottom:0;">
    <div class="footer-copyright text-center py-3">
      &copy; 2020 Copyright:
      <a href="about"> Quiz Beta</a>
      <br>
      Developed and Maintained by <a href="https://api.whatsapp.com/send?phone=+919080335279"> Meiyazhagan K</a> | <a href="https://api.whatsapp.com/send?phone=+918825972584"> Navin Balaji R K</a>
    </div>
  </footer>
</body>

<?php

//user database
$servername_user = "bp2j2iwxoj98wzzskw0r-mysql.services.clever-cloud.com";
$username_user = "uya0eqkiaev9uhkh";
$password_user = "Oa8sfT9jK5Q9CWol3sFV";
$dbname_user = "bp2j2iwxoj98wzzskw0r";
// Create connection
$conn_user = mysqli_connect($servername_user, $username_user, $password_user, $dbname_user);

//admin database
$servername_admin = "bpk2l4hvkbuqymruuzuk-mysql.services.clever-cloud.com";
$username_admin = "u8u9lvzuaw8f3rsd";
$password_admin = "O4CJ4y3aLTVTELSN3MSj";
$dbname_admin = "bpk2l4hvkbuqymruuzuk";
// Create connection
$conn_admin = mysqli_connect($servername_admin, $username_admin, $password_admin, $dbname_admin);

// Check connection
if (!$conn_user) {
    die("Connection failed: " . mysqli_connect_error());
    }
    else{

    	if(isset($_POST['submit']))
    	{
			mysqli_query($conn_user,"UPDATE users SET booleanvalue = 0 WHERE email='".$_POST["emailatmpt"]."';");
		  }
      else if(isset($_POST['submitchpass']))
      {
      mysqli_query($conn_user,"UPDATE users SET password = '".$_POST["chpass"]."' WHERE email='".$_POST["emailchpass"]."';");
      }
	}

  if (!$conn_admin) 
  {
    die("Connection failed: " . mysqli_connect_error());
  }
  else
  {
      if(isset($_POST['submittest']))
      {
        $testname=$_POST["testname"];
        $iframe=$_POST["link"];
        $time=$_POST["time"];
        mysqli_query($conn_admin,"UPDATE test SET testname='".$testname."',iframe='".$iframe."',timelimit ='".$time."' WHERE ID='new';");
        mysqli_query($conn_user,"UPDATE users SET booleanvalue='0'");
      }
  }
?>
</html>