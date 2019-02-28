<?php

	include('db_login.php');
    session_start();
    
    $connection = new mysqli($db_host, $db_username, $db_password);
    if (!$connection)
    {
        die ("Could not connect to the database: <br />". mysql_error());
    }
 $connection->select_db("book");

//header("Content-Type: application/json; charset=UTF-8");
//$register = json_decode($_POST["x"], false);
//$register->seat;
//$result ="INSERT INTO register values ('','','','','','','$vari')";
//mysqli_query($connection,$result);
$fetch="SELECT seat FROM register";
$result = $connection->query($fetch);
$outp=array();
$outp = $result->fetch_all(MYSQLI_ASSOC);
?>