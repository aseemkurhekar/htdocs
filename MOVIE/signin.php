<?php
	include('db_login.php');
	session_start();
	$connection = new mysqli($db_host, $db_username, $db_password);
	if (!$connection)
	{
		die ("Could not connect to the database: <br />". mysql_error());
	}
	$connection->select_db("book");

if(!$connection)
{
    
    echo'not connected to server';
    
}

$email=$_POST['email'];
$password=md5($_POST['pwd']);
$sql="SELECT * FROM register WHERE email = '$email' and password ='$password'";
$result = $connection->query($sql);
if($result->num_rows>0){
    $row  = mysqli_fetch_array($result);
    $_SESSION['email'] = $row['email'];
  $_SESSION['name'] = $row['first_name'];
 header('location: browse_movie.php');
}
else{
				
				$_SESSION['login-error'] = '*invalid details';
				header('location:index.php');
 			}

?> 