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
    <title>hometry</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="assets/css/hometry.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="padding:-2px;margin:0px;margin-bottom:0px;">
            <div class="container" style="margin:0px;"><a class="navbar-brand align-items-start" href="hometry.php" style="font-family:Montserrat, sans-serif;color:rgb(255,255,255);float:left;">MCI DETECTOR</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation">
                        <a name="logout" class="nav-link" href="?logout" style="color:rgb(255,255,255);font-family:Montserrat, sans-serif;">Logout <?php echo($username);?></a>
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
    <div>
        <div class="container-fluid" style="padding-right:0px;padding-left:0px;width:1200;height:600px;margin:0px;">
            <div class="row" style="margin-right:0px;margin-left:0px;">
                <div  class="col-md-6" style="height:800px;width:600px;padding:-0px;min-height:1px;cursor:pointer;" onclick="window.location='../add/add.php';">
                    <h1 href="add.php" class="text-center text-sm-center text-md-center text-lg-center text-xl-center" style="margin:0px;margin-top:350px;font-family:Montserrat, sans-serif;">ADD PATIENT</h1>
                </div>
                <div  class="col-md-6 col-xl-6" style="padding-right:0px;min-height:0px;padding-left:0px;" onclick="; window.location='../search/search.php';">
                    <h1 href="search.php" class="text-center text-sm-center text-md-center text-lg-center text-xl-center"  style="margin-top:350px;font-family:Montserrat, sans-serif;">VIEW PATIENT</h1>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>

</html>