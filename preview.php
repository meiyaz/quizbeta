<?php
  $_SESSION['ctime']=time();
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
    $result = mysqli_query($conn_admin,"SELECT * FROM test WHERE ID='new';");
    $row = mysqli_fetch_assoc($result);

    $tname = $row["testname"];

    $limit=$row["timelimit"];
    $timearr = explode(":",$limit);
    $hrs = $timearr[0];
    $mins = $timearr[1];
    $secs= ($hrs*3600)+($mins*60);

    $ifr=$row["iframe"];
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Quiz Beta | Preview</title>
  <link rel="shortcut icon" href="images/quizbeta.ico">

  <?php echo "<meta http-equiv='refresh' content={$secs}>"; ?>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="assets/css/signup.css" rel="stylesheet">
  <link href="assets/css/header.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <script>
    function crnttime()
    {
      var state = history.state || {};
      var reloadCount = state.reloadCount || 0;
      if (performance.navigation.type === 1) 
      {
        state.reloadCount = ++reloadCount;
        history.replaceState(state, null, document.URL);
      }
      else if (reloadCount) 
      {
        delete state.reloadCount;
        reloadCount = 0;
        history.replaceState(state, null, document.URL);
      }
      if (reloadCount === 0) 
      {
        if (typeof(Storage) !== "undefined") 
        {
          sessionStorage.ms=Number(new Date().getTime()) 
        }
      }
      console.log(sessionStorage.ms)
      
      var dt = new Date().getTime()
      var countDownDate = parseInt(sessionStorage.ms) + ('<?php echo $secs; ?>'*1000);
      console.log(countDownDate)
      var x = setInterval(function()
      {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("timer").innerHTML = hours + "h " + minutes + "m " + seconds + "s ";

        if (distance < 0)
        {
          clearInterval(x);
          document.getElementById("timer").innerHTML = "EXPIRED";
        }
      }, 1000);
    }
  </script> 
  <style type="text/css">
    .disable-select {
    user-select: none;
   -webkit-user-select: none;
   -khtml-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
  }
  </style>
  <script type="text/javascript">
    document.addEventListener('contextmenu', event => event.preventDefault());
  </script>
  <script type="text/javascript">
    document.onkeydown = function (e) {
      var key = e.charCode || e.keyCode;
      if (key == 16 || key==17) { 
        //  nothing
      } else {
        e.preventDefault();
      }      
    }
</script>

</head>
<body class="text-center disable-select" onload="crnttime()" style="margin:0px;padding:0px;overflow:hidden;"> 

<div class="header navbar navbar-expand-md navbar-light">
    <a href="about"  class="navbar-brand logo float-left"> Quiz Beta</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarId">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarId">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="pull-right" id="timer" style="color:red;"></a>
        </li>
        <li class="nav-item">
          <a href="qb_admin_login" class="active nav-link">Back</a>
        </li>
      </ul>
    </div>
</div>
  <div class="text-success">
    Preview Test
  </div>
   
<style>
  html, body {
    height:100%;
    width:100%;
    overflow:hidden;
    }
  iframe {
    float:left;
    height:100%;
    width:100%;
  }
  .content {
     height:100%;
  }
</style>

  <div class="content">
    <iframe src="js::" id="iframe" scrolling="yes" frameborder="0"></iframe>
  </div>
  <script type="text/javascript">
    document.getElementById('iframe').src='<?php echo $ifr; ?>';
  </script>

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