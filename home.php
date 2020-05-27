<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz Beta | Home</title>
    <link rel="shortcut icon" href="images/quizbeta.ico">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <link href="assets/css/header.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
          <a href="home" class="active nav-link">Home</a>
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
          <a href="login" class="nav-link">Login</a>
        </li>
      </ul>
    </div>
</div>

  <script>
    $(window).on('load',function(){
      $('#myModal').modal('show');
    });

  </script>
  <style type="text/css">
    .modal {
      background-color: rgba(0, 0, 0, 0.5);
    }
  </style>
  <div id="myModal" class="modal fade">
   <div class="modal-dialog">
      <div class="modal-content">
      
        <div class="modal-header" style="background-color: #fad390;">
          <h5 class="modal-title">Protect yourself and others from getting sick</h5>
          <span class="close" data-dismiss="modal">&times;</span>
         </div>
        <div class="modal-body" style="background-color: #fcf2bb;">
          <img src="images/covid.png" class="modal-content">
        </div>
        <div class="modal-footer" style="background-color: #fffbe3;">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
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
    $result = mysqli_query($conn_admin,"SELECT * FROM result WHERE ID='new';");
    $row = mysqli_fetch_assoc($result);
    $testname = $row["testname"];
    $testname=$row["testname"];
    $overall=$row["overall"];
    $batch1=$row["batch1"];
    $batch2=$row["batch2"];
    $batch3=$row["batch3"];
    $batch4=$row["batch4"];
    $batch5=$row["batch5"];
  }
?>
<h2 align="center" class="p-2">Congratulations</h2>
<style type="text/css">
  pre {
    /*color:white;*/
  }
  .card-text, .card {
    /*color:white;*/
  }
  .card-header {
    font-weight: bold;
    background: #FFA42E;
background: -webkit-linear-gradient(bottom right, #FFA42E, #F66241);
background: -moz-linear-gradient(bottom right, #FFA42E, #F66241);
background: linear-gradient(to top left, #FFA42E, #F66241);
  }
  .card-body {
    font-weight: bold;
   background: #E8E065;
background: -webkit-linear-gradient(bottom right, #E8E065, #F6C552);
background: -moz-linear-gradient(bottom right, #E8E065, #F6C552);
background: linear-gradient(to top left, #E8E065, #F6C552);
  }
  .overall {
    font-weight: bold;
    background: #F0FF44;
background: -webkit-linear-gradient(top right, #F0FF44, #F5AF24);
background: -moz-linear-gradient(top right, #F0FF44, #F5AF24);
background: linear-gradient(to bottom left, #F0FF44, #F5AF24);
  }
  pre, .card {
    font-family:"Comic Sans MS", cursive, sans-serif;
  }
</style>
<div class="container card-columns">
    <div class="card">
      <div class="card-header text-center">Overall Top-5</div>
      
      <div class="overall card-body">
        <p class="card-text">
          <pre><?php echo $overall; ?></pre>
        </p>
      </div>
    </div>
    <div class="card">
      <div class="card-header font-weight-bold text-center">Batch - 1 Top - 5</div>
      
      <div class="card-body">
        <p class="card-text">
          <pre><?php echo $batch1; ?></pre>
        </p>
      </div>
    </div>
    <div class="card">
      <div class="card-header font-weight-bold text-center">Batch - 2 Top - 5</div>
      
      <div class="card-body">
        <p class="card-text">
          <pre><?php echo $batch2; ?></pre>
        </p>
      </div>
    </div>
    <div class="card">
      <div class="card-header font-weight-bold text-center">Batch - 3 Top - 5</div>
      
      <div class="card-body">
        <p class="card-text">
          <pre><?php echo $batch3; ?></pre>
        </p>
      </div>
    </div>
    <div class="card">
      <div class="card-header font-weight-bold text-center">Batch - 4 Top - 5</div>
      
      <div class="card-body">
        <p class="card-text">
          <pre><?php echo $batch4; ?></pre>
        </p>
      </div>
    </div>
    <div class="card">
      <div class="card-header font-weight-bold text-center">Batch - 5 Top - 5</div>
      
      <div class="card-body">
        <p class="card-text">
          <pre><?php echo $batch5; ?></pre>
        </p>
      </div>
    </div>
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
</html>