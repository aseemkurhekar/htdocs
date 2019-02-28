<?php
$con= new mysqli('localhost', 'root', '', 'movie');
session_start();
$errors=array();

if(!$con)
{
    
    echo'not connected to server';
    
}
$sql= "SELECT * from seats";
$result=$con->query($sql);
while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){
	if ($_POST[$row['seatname']]== "on") {
		$seatname = $row['seatname'];
				$sql = "UPDATE seats SET book = 1 WHERE seatname = '$seatname'";
				$con->query($sql);
# code...
	}
}


?>