<?php
    include('db_login.php');
    session_start();
    $connection = new mysqli($db_host, $db_username, $db_password);
    if (!$connection)
    {
        die ("Could not connect to the database: <br />". mysql_error());
    }
 $connection->select_db("book");

$first_name=$_POST['fname'];
$last_name=$_POST['lname'];
$email=$_POST['email'];
$birth_date=$_POST['bday'];
$password=$_POST['pass'];
$confirm_password=$_POST['cpass'];
$errors=array();
$_SESSION['first_name']= $first_name;
$_SESSION['email'] = $email;
echo $first_name;
/*if(isset($_POST['Create'])){
/*$first_name=mysql_real_escape_string($_POST['fname']);
$last_name=mysql_real_escape_string($_POST['lname']);
$email=mysql_real_escape_string($_POST['email']);
$birth_date=mysql_real_escape_string($_POST['bday']);
$password=mysql_real_escape_string($_POST['pass']);
$confirm_password=mysql_real_escape_string($_POST['cpass']);*/

//}
//echo $first_name;
if($password != $confirm_password){
array_push($errors,"Passwords dont match");
}
if(count($errors)==0){
$pass=md5($password);
$pass1=md5($confirm_password);
$sql="insert into register(first_name, last_name, email, birth_date, password) values('$first_name', '$last_name','$email','$birth_date','$pass')";
$connection->query($sql);
//	x$_SESSION['email']=$email;
$_SESSION['success']="You are logged in successfully!";
header('location: index.php');

}
else
{
	$_SESSION['create-error'] = '*Account not created';
	header('location: index.php');

}

//header("refresh:10; url=index4.html");
/*if(count($errors)==0){
$pass=md5($password);
$query="SELECT * FROM user WHERE email='$email' AND password='$password'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)==1){

}*/
//header('location: index4.php');
//}

?> 