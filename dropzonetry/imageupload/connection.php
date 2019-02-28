<?php 

    $con=mysqli_connect('localhost','root','password','authentication');
    if(!$con)
    {
        die('Connection Error'.mysqli_error());
    }

?>