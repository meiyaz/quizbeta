<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz Beta | View Feedbacks</title>
    <link rel="shortcut icon" href="images/quizbeta.ico">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

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
          <a href="qb_admin_login" class="active nav-link">Back</a>
        </li>
      </ul>
    </div>
</div>
<h2 align="center" class="p-4">View Feedbacks</h2>
<?php
$servername_fb = "bpk2l4hvkbuqymruuzuk-mysql.services.clever-cloud.com";
$username_fb = "u8u9lvzuaw8f3rsd";
$password_fb = "O4CJ4y3aLTVTELSN3MSj";
$dbname_fb = "bpk2l4hvkbuqymruuzuk";
// Create connection
$conn_fb = mysqli_connect($servername_fb, $username_fb, $password_fb, $dbname_fb);

      echo "<table align='center' class='text-center table table-bordered' style='width:85%;'>";
       $sql="SELECT * FROM feedbacks";
        echo "<tr><th class='head'>S.No</th><th class='head'>Name</th><th class='head'>E-mail</th><th class='head'>Rating</th><th class='head'>Feedback</th></tr>";
        $id=0;
        if($result=$conn_fb->query($sql))
        {
           if($result->num_rows)
            while($row=$result->fetch_object())
            {
                $id+=1;
                $name=$row->Name;
                $email=$row->Email;
                $rat=$row->Rating;
                $exp=$row->Feedback;

                echo "<tr>
                      <td class='data'>{$id}</td>
                      <td class='data'><b>{$name}<b></td>
                      <td class='data'>{$email}</td>
                      <td class='data'>{$rat}</td>
                      <td class='data'>{$exp}</td>
                    </tr>";
            }
          }
          else 
          {
              echo "<tr><td class='data'>No Feedbacks till now</td></tr>";
          }
        echo "</table>";
    
?>

</body>
</html>


