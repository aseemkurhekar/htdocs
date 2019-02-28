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
//$t = "TEST";
$vari=$_POST['register'];
echo $vari;
echo ('<br>');
echo $email;
$result ="UPDATE register SET seat = \"$vari\" WHERE email = '$email'";

echo "post update";
mysqli_query($connection,$result);
//$outp = array();
//$outp = $result->fetch_all(MYSQLI_ASSOC);
?>

