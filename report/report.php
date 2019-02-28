<?php
session_start();
$db = new mysqli("localhost", "root", "password");
if (!$db)
	{
		die ("Could not connect to the database: <br />". mysql_error());
	}
$db->select_db("authentication");

$username=$_POST['username'];
$username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rep</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="assets/js/html2pdf.bundle.min.js"></script>
    <script>
    function download(){
        html2pdf(document.body);
    }
    </script>
</head>

<body>
<div>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="padding:-2px;margin:0px;margin-bottom:0px;background:black;">
            <div class="container" style="margin:0px;"><a class="navbar-brand align-items-start" href="../hometry/hometry.php" style="font-family:Montserrat, sans-serif;color:rgb(255,255,255);float:left;">MCI DETECTOR</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation">
                        <a name="logout" class="nav-link" href="?logout" style="color:rgb(255,255,255);font-family:Montserrat, sans-serif;float:right;">Logout <?php echo($username);?></a>
                         </li>
                    </ul>
                    <?php
                    if(isset($_GET['logout'])) {
                        session_unset();
                        header("Location: ../index.php");
                      }
                      ?>
            </div>
    </div>
    </nav>
  </div>
    <h1 class="text-center" style="margin-top:60px;font-family:Montserrat, sans-serif;font-size:44px;margin-bottom:0px;"><strong>REPORT</strong></h1>
    <h2 class="text-center" style="font-size:36px;margin-top:60px;margin-left:0px;width:100%;font-family:Montserrat, sans-serif;margin-bottom:5%;">DR : JOHN DOE</h2>
    <h1 class="text-center" style="margin-bottom:60px;margin-top:38px;color:#9f9f9f;">DESCRIPTION</h1>
    <h3 class="text-center" style="font-size:36px;color:#8f8f8f;font-family:Montserrat, sans-serif;width:100%;margin-left:0%;padding-left:10%;padding-right:10%;">PATIENT ID : 1234 HAS BEEN DIAGANOSED WITH MCI WITH CLASSIFIER ACCURACY OF 96%. IMMIDIATE CARE IS ADVISED.</h3>
    <button class="btn btn-primary btn-lg" type="button" style="background:rgb(158,158,158);font-family:Montserrat, sans-serif;margin-left:40%;margin-top:10%;margin-bottom:5%;" onclick="download()">DOWNLOAD REPORT</button>
    <script
        src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>