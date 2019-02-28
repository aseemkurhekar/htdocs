<?php
session_start();

$db = new mysqli("localhost", "root", "password");
if (!$db)
	{
		die ("Could not connect to the database: <br />". mysql_error());
	}
$db->select_db("authentication");
if(isset($_POST['search'])){
    $q = $_POST['q'];
    $qname = preg_replace("#[^0-9a-z]i#","", $q);
    //echo("NOT FOUND1");
    $query = mysqli_query($db,"SELECT * FROM users WHERE username LIKE '%$qname%'"); 
   // echo("NOT FOUND2");
//Replace table_name with your table name and `thing_to_search` with the column you want to search
    $count = mysqli_num_rows($query);
   // echo("NOT FOUND3");
	if($count == "0"){
       // $output = '<h2>No result found!</h2>';
        echo '<script language="javascript">';
        echo 'alert("User id does not exist.")';
        echo '</script>';
	}else{
		while($row = mysqli_fetch_array($query)){
		$s = $row['username']; // Replace column_to_display with the column you want the results from
                $output = '<h2>'.$s.'</h2><br>';
                header('location: ../report/report.php');
			}
		}
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sear</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Search-Field-With-Icon.css">
    <link rel="stylesheet" href="assets/css/search.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="  background:#010101;padding-top:.75rem;padding-bottom:.75rem;color:white;border-radius:0;box-shadow:none;border:none;margin-bottom:0;">
            <div class="container"><a class="navbar-brand" href="../hometry/hometry.php" style="color:rgb(255,255,255);font-family:Montserrat, sans-serif;">MCI DETECTOR</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="?logout" style="color:white;font-family:Montserrat, sans-serif;">Logout <?php echo($username);?></a></li>
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
    <div class="search-container">
        <form  method="POST" action="search.php" style="margin-top:15px;">
        <input type="text" name="q" placeholder="ENTER PATIENT ID" autofocus="" autocomplete="off" class="search-input" style="font-family:Montserrat, sans-serif;height:81px;width:758px;margin-left:370px;font-size:37px;margin-top:30px;color:gray;">
        <input name="search" class="btn btn-light search-btn" type="submit"  value="SEARCH" style="height:81px;margin-top:-20px;font-family:Montserrat, sans-serif;"></button>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <?php echo ($output); ?>
</body>

</html>