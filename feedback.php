<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz Beta | Feedbacks</title>
    <link rel="shortcut icon" href="images/quizbeta.ico">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link href="assets/css/feedback.css" rel="stylesheet">
    <link href="assets/css/header.css" rel="stylesheet">
</head>

<body>

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
          <a href="feedback" class="active nav-link">Feedbacks</a>
        </li>
        <li class="nav-item">
          <a href="login" class="nav-link">Login</a>
        </li>
      </ul>
    </div>
</div>
<br>
<h2 align="center">Leave a reply</h2>
<div class="container">
  <form action="feedback" method="post" class="form-group">
    <div class="form-group">
      <label>Your Name </label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Your name..">
    </div>

    <div class="form-group">
      <label for="email">E-mail Id </label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Your email..">
    </div>
    <div class="form-group">
      <label>Rate Your Experience : </label><br>
        <label class="radio-inline">
          <input type="radio" name="rat" value="1"> 1
        </label>
        <label class="radio-inline">
          <input type="radio" name="rat" value="2"> 2
        </label>
        <label class="radio-inline">
          <input type="radio" name="rat" value="3"> 3
        </label>
        <label class="radio-inline">
          <input type="radio" name="rat" value="4"> 4
        </label>
        <label class="radio-inline">
          <input type="radio" name="rat" value="5"> 5
        </label>
    </div>
    <div class="form-group">
      <label>Suggesstions / Feedbacks</label>
      <textarea id="exp" name="exp" class="form-control" placeholder="Share Your Experience.." style="height:125px"></textarea>
    </div>
    <div>
      <center>
        <input type="submit" class="btn btn-success" name="submit" value="Submit">
      </center>
    </div>
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
  
<?php 
$servername_fb = "bpk2l4hvkbuqymruuzuk-mysql.services.clever-cloud.com";
$username_fb = "u8u9lvzuaw8f3rsd";
$password_fb = "O4CJ4y3aLTVTELSN3MSj";
$dbname_fb = "bpk2l4hvkbuqymruuzuk";
// Create connection
$conn_fb = mysqli_connect($servername_fb, $username_fb, $password_fb, $dbname_fb);

  if (!$conn_fb)
  {
    die("Connection failed: " . mysqli_connect_error());
  }
   else
  {
    if(isset($_POST['submit']))
    {
        $name=$_POST["name"];
        $email=$_POST["email"];
        $rat=$_POST["rat"];
        $exp=$_POST["exp"];
        $fsql="INSERT INTO `feedbacks` (`Name`, `Email`, `Rating`, `Feedback`) VALUES ('$name', '$email', '$rat', '$exp');";
        if($conn_fb->query($fsql))
        {
          //echo "<script> alert('Successfully Saved Feedback'); </script>";
        }
        else
        {
            echo "<script> alert('Failed to save Feedback'); </script>";
        }
    }
  }
?>

</body>
</html>