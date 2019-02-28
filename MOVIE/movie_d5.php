<?php
    include('db_login.php');
    session_start();
    $connection = new mysqli($db_host, $db_username, $db_password);
    if (!$connection)
    {
        die ("Could not connect to the database: <br />". mysql_error());
    }
 $connection->select_db("book");

$b_date=$_POST['b_date'];
$b_time=$_POST['b_time'];

$_SESSION['b_date']= $b_date;
$_SESSION['b_time'] = $b_time;
$m_name5=$_SESSION['m_name5'];
$email=$_SESSION['email'];

$fetch ="UPDATE register SET b_date = '$b_date',  b_time = '$b_time',movie_name='$m_name5' WHERE email = '$email' ";
$connection->query($fetch);
header('location: seatseat5.php');
 ?>