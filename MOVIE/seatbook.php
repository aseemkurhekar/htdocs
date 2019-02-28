<?php
include('db_login.php');
    session_start();
    
    $connection = new mysqli($db_host, $db_username, $db_password);
    if (!$connection)
    {
        die ("Could not connect to the database: <br />". mysql_error());
    }
 $connection->select_db("book");
$email=$_SESSION['email'];
//header("Content-Type: application/json; charset=UTF-8");
//$register = json_decode($_POST["x"], false);
//$register->seat;

$vari=$_POST['register'];
$result ="UPDATE register SET seat = '$vari' WHERE email = '$email'";
mysqli_query($connection,$result);
//$outp = array();
//$outp = $result->fetch_all(MYSQLI_ASSOC);
?>

