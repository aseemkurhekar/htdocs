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
echo $movie_id;
$movie_name=$_POST['movie_name'];
$movie_cast=$_POST['movie_cast'];
$runtime=$_POST['runtime'];
$movie_desc=$_POST['movie_desc'];
$movie_cover=$_POST['movie_cover'];
$movie_photo=$_post['movie_photo'];
$trailer=$_POST['trailer'];
$language=$_POST['language'];
$genre=$_POST['genre'];
$rating=$_POST['rating'];
$censor_rating=$_POST['censor_rating'];
$movie_photo_2=$_POST['movie_photo_2'];
$cast_name_1=$_POST['cast_name_1'];
$cast_photo_1=$_POST['cast_photo_1'];
$cast_name_2=$_POST['cast_name_2'];
$cast_photo_2=$_POST['cast_photo_2'];




$sql="UPDATE ace SET movie_name='$movie_name', movie_cast='$movie_cast',runtime='$runtime',movie_desc='$movie_desc',movie_cover ='$movie_cover',movie_photo='$movie_photo',trailer='$trailer',language='$language',genre='$genre',rating='$rating',censor_rating='$censor_rating',movie_photo_2='$movie_photo_2',cast_name_1='$cast_name_1',cast_photo_1='$cast_photo_1', cast_name_2='$cast_name_2',cast_photo_2='$cast_photo_2' WHERE movie_id='$movie_id'";
$connection->query($sql);

header('location: index.php');

?>