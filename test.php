<?php
  session_start();
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

  if(isset($_SESSION['mail']))
  {
    if((time()-$_SESSION['lastlogin'])>=$secs)
    {
      header("location:logout");
    }
    else
    {
      $_SESSION['lastlogin']=time();
    }
  }
  else
  {
    header("location:logout");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Quiz Beta | Test</title>
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

  <script type="text/javascript">
    window.onload = function() {
  	 var res = confirm("Are you sure you want change page!");
  	 if(res==true)
  		return true;
  	 else
  		return false;
    }
  </script>
    
  <style>
    body.modal-open .container{
    	-webkit-filter: blur(2px);
    	-moz-filter: blur(2px);
    	-o-filter: blur(2px);
    	-ms-filter: blur(2px);
    	filter: blur(2px);
    }
  </style>

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
          window.location = 'logout';
          window.close();
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
        // enter key do nothing
      } else {
        e.preventDefault();
      }      
    }
</script>

</head>
<body class="text-center disable-select" onload="crnttime()" style="margin:0px;padding:0px;overflow:hidden;"> 

  <div class="header navbar navbar-expand-md navbar-light">
    <a href="#default"  class="navbar-brand logo float-left"> Quiz Beta</a>
    <a class="pull-right" id="timer" style="color:red;"></a>
  </div>

  <div class="text-success">
    Welcome <?php echo $_SESSION['mail']; ?>
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


<?php
  //user database
  $servername_user = "bp2j2iwxoj98wzzskw0r-mysql.services.clever-cloud.com";
  $username_user = "uya0eqkiaev9uhkh";
  $password_user = "Oa8sfT9jK5Q9CWol3sFV";
  $dbname_user = "bp2j2iwxoj98wzzskw0r";
  // Create connection
  $conn = mysqli_connect($servername_user, $username_user, $password_user, $dbname_user);
  // Check connection
  if (!$conn)
  {
      die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
      $prev=mysqli_query($conn,"SELECT nooflogin FROM users WHERE email='".$_SESSION['mail']."';");
      while ($row = $prev->fetch_assoc())
      {
          $next=$row['nooflogin']+1;
          $uquery=mysqli_query($conn,"UPDATE users SET nooflogin= '$next' WHERE email='".$_SESSION['mail']."';");
      }
    }
?>
</body>
</html>