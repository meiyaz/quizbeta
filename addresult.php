<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quiz Beta | Add Result</title>
    <link rel="shortcut icon" href="images/quizbeta.ico">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link href="assets/css/signin.css" rel="stylesheet">
    <link href="assets/css/header.css" rel="stylesheet">

</head>
<body class="text-center">

<div class="header navbar navbar-expand-lg navbar-light">
    <a href="about"  class="navbar-brand logo float-left"> Quiz Beta</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarId">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarId">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="qb_admin_login" class="active nav-link">Back</a>
        </li>
      </ul>
    </div>
</div>

  <h2 style="margin-top:20px;">Admin</h2>


  <form class="container form" method="post" action="addresult">
    <label>Add Results</label>
    <input type="text" name="testname" class="form-control" placeholder="Test Name" style="width: 300px;">
    <div class="row p-2">
      <div class="col-lg-3">
        <textarea rows=5 name="overall" class="form-control" placeholder="Overall Top - 5" required autofocus>
        </textarea>
      </div>
      <div class="col-lg-3">
        <textarea rows=5 name="batch1" class="form-control" placeholder="Batch - 1 Top - 5" required autofocus></textarea>
      </div>
      <div class="col-lg-3">
        <textarea rows=5 name="batch2" class="form-control" placeholder="Batch - 2 Top - 5" required autofocus></textarea>
      </div>
    </div>
    <div class="row p-2">
      <div class="col-lg-3">
        <textarea rows=5 name="batch3" class="form-control" placeholder="Batch - 3 Top - 5" required autofocus></textarea>
      </div>
      <div class="col-lg-3">
        <textarea rows=5 name="batch4" class="form-control" placeholder="Batch - 4 Top - 5" required autofocus></textarea>
      </div>
      <div class="col-lg-3">
        <textarea rows=5 name="batch5" class="form-control" placeholder="Batch - 5 Top - 5" required autofocus></textarea>
      </div>
    </div>   
    <button class="btn btn-primary" name="updateresult" type="submit">Update Results</button>
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
</body>

<?php

//admin database
$servername_admin = "bpk2l4hvkbuqymruuzuk-mysql.services.clever-cloud.com";
$username_admin = "u8u9lvzuaw8f3rsd";
$password_admin = "O4CJ4y3aLTVTELSN3MSj";
$dbname_admin = "bpk2l4hvkbuqymruuzuk";
// Create connection
$conn_admin = mysqli_connect($servername_admin, $username_admin, $password_admin, $dbname_admin);

  if (!$conn_admin) 
  {
    die("Connection failed: " . mysqli_connect_error());
  }
  else
  {
      if(isset($_POST['updateresult']))
      {
        $testname=$_POST["testname"];
        $overall=$_POST["overall"];
        $batch1=$_POST["batch1"];
        $batch2=$_POST["batch2"];
        $batch3=$_POST["batch3"];
        $batch4=$_POST["batch4"];
        $batch5=$_POST["batch5"];
        mysqli_query($conn_admin,"UPDATE result SET testname='".$testname."',overall='".$overall."',batch1='".$batch1."',batch2='".$batch2."',batch3='".$batch3."',batch4='".$batch4."',batch5='".$batch5."' WHERE ID='new';");
      }
  }
?>

</html>