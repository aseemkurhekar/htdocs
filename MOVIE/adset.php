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

$movie_id=$_POST['movie_id'];
$movie_name=$_POST['movie_name'];
$movie_cast=$_POST['movie_cast'];
$runtime=$_POST['runtime'];

$sql="UPDATE ace SET movie_name='$movie_name', movie_cast='$movie_cast',runtime='$runtime' WHERE movie_id='$movie_id'";
$connection->query($sql);
echo $movie_name;
echo $movie_cast;
header('location: index.php');

?>