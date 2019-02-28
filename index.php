<?php
session_start();

$db = new mysqli("localhost", "root", "password");
if (!$db)
	{
		die ("Could not connect to the database: <br />". mysql_error());
	}
$db->select_db("authentication");


if(isset($_POST['login_btn'])){
    
    $username = $_POST['username'];
    $password_1 = $_POST['password_1'];
    $password = md5($password_1); 
    $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
    //$sql="SELECT * FROM users WHERE username='s' AND password='81dc9bdb52d04dc20036dbd8313ed055'";
    //echo($sql);
    $result = $db->query($sql);
    if($result->num_rows>0){
    $row  = mysqli_fetch_array($result);
   
     $_SESSION['username'] = $row['username'];
     header('location: hometry/hometry.php');
}
else{
				
				$_SESSION['login-error'] = '*invalid details';
				header('location:index.php?error=DETAIL_ERR');
 			}
   /*$stmt = mysqli_query($db,$sql);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo("err1");
        header("location:index.php?error=sqlerror");
        echo("Error at kne 17");
        exit();
    }
    else{
        //echo("err2");
        mysqli_stmt_bind_param($stmt,"ss", $username, $username);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        echo("result prints ... ");
        echo($result);
        echo("lol");
        if($row = mysqli_fetch_assoc($result)){
        
            /*if($password != $row['password'])
            {
                echo("err3");
                header("location:index.php?error=nouser");
                echo("Error at kne 28");
            }
            else if($password == $row['password']){
                session_start();
                echo("err4");
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                header("location:home.php");
               
            }
            else{
                echo("err5");
                header("location:index.php?error=randError");
            }
}*/
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background:#ffffff">
    <h1 class="text-center" style="margin-top:140px;font-family:Montserrat, sans-serif;color:gray">LOGIN</h1>
    <div class="login-dark" style="height:814px;">
        <form method="post" action="index.php" style="padding:0px;height:768px;font-family:Montserrat, sans-serif; color:gray;">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration" style="color:rgb(0,0,0);"><i class="icon ion-ios-locked-outline" style="color:rgb(137,135,135);"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username" style="height:60px;font-family:Montserrat, sans-serif; color:gray;"></div>
            <div class="form-group"><input class="form-control" type="password" name="password_1" placeholder="Password" style="height:60px;font-family:Montserrat, sans-serif; color:gray;"></div>
            <div class="form-group"><button class="btn btn-primary active btn-block" name="login_btn" type="submit" data-bs-hover-animate="flash" value="Login" style="margin:60px  -1px;background-color:rgb(158,158,158);font-family:Montserrat, sans-serif;color:white;">Log In</button></div>
            <a href="#" class="forgot" style="font-family:Montserrat, sans-serif;">Forgot your username or password?</a></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/untitled.js"></script>
</body>

</html>