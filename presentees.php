<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz Beta | Presentees</title>
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
<div class="container">
  <h2 align="center" class="p-4">View Participants</h2>

  <!--button align="right" onclick="exportToExcel('tblexportData', 'Absentees')" class="btn btn-success float-right">Download</button-->
</div>
  
<div class="container-fluid">
<?php
//user database
$servername_user = "bp2j2iwxoj98wzzskw0r-mysql.services.clever-cloud.com";
$username_user = "uya0eqkiaev9uhkh";
$password_user = "Oa8sfT9jK5Q9CWol3sFV";
$dbname_user = "bp2j2iwxoj98wzzskw0r";
// Create connection
$conn_user = mysqli_connect($servername_user, $username_user, $password_user, $dbname_user);
      echo "<table align='center' id='tblexportData' class='text-center table table-bordered' style='width:85%;'>";
       $sql="SELECT * FROM users WHERE booleanvalue=1 and Batch>0 ORDER BY Batch;";
        echo "<tr><th class='head'>S.No</th><th class='head'>Batch</th><th class='head'>Name</th><th class='head'>Attempts</th><th class='head'>College</th><th class='head'>Department</th></tr>";
        $id=0;
        if($result=$conn_user->query($sql))
        {
           if($result->num_rows)
            while($row=$result->fetch_object())
            {
                $id+=1;
                $batch=$row->Batch;
                $name=$row->Name;
                $attempts=$row->nooflogin;
                $clg=$row->College;
                $dept=$row->Department;

                echo "<tr>
                      <td class='data'>{$id}</td>
                      <td class='data'>{$batch}</td>
                      <td class='data'><b>{$name}<b></td>
                      <td class='data'>{$attempts}</td>
                      <td class='data'>{$clg}</td>
                      <td class='data'>{$dept}</td>
                    </tr>";
            }
          }
          else 
          {
              echo "<tr><td colspan='6' class='data'>No Data's are r colspan=ecorded</td></tr>";
          }
        echo "</table>";
    
?>
</div>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.3.13/css/tableexport.css" />
<script type="text/javascript" src="assets/js/Blob.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.1/xlsx.core.min.js"></script>
<script type="text/javascript" src="assets/js/FileSaver.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.3.13/js/tableexport.js"></script>
<script type="text/javascript">
  var date = new Date();
  var fname = "Participants" + "_" + date.getDate() + "_"+ (date.getMonth()+1);
    $(function () {
        var tables = $("#tblexportData").tableExport({
            bootstrap: false,
            headings: true,
            footers: true,
            formats: ["xlsx", "xls", "csv"],
            fileName: fname,
            position: "top",
            ignoreRows: null,
            ignoreCols: null,
            ignoreCSS: ".tableexport-ignore",
            emptyCSS: ".tableexport-empty",
            trimWhitespace: true
        });
    });
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


