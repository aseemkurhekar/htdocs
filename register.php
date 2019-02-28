<?php

session_start();

$db = mysqli_connect("localhost", "root", "password", "authentication");

if(isset($_POST['register_btn'])){
    session_start();
   
    $username = $_POST['username'];
    $reg_id = $_POST['reg_id'];
    $password_1 =$_POST['password_1'];
    $password_2 = $_POST['password_2'];
    if (empty($username)) { echo( "Username is required"); }
    if (empty($reg_id)) { echo( "ID is required"); }
    if (empty($password_1)) { echo( "Password is required"); }

    if($password_1 == $password_2)
    {
        $password = md5($password_1);
        $sql = "INSERT INTO users (username,reg_id,password) VALUES('$username','$reg_id','$password')";
        mysqli_query($db,$sql);
        $_SESSION['message']="You are now logged in";
        $_SESSION['username']= $username;
        header("location:index.php");
    
    }
    else{
        $_SESSION['message']="The two passwords do not match";
       
    }

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="row register-form" style="background:#ffffff">
        <div class="col-md-8 offset-md-2">
            <form class="custom-form" method="post" action="register.php">
                <h1 style="font-family:Montserrat, sans-serif;width:301px;height:43px;padding:0px;margin:0px 10px 50px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Register new admin</h1>
                <div class="form-row form-group" style="background=#fff">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field" style="font-family:Montserrat, sans-serif;">Name </label></div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="username"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="text-input-field" style="font-family:Montserrat, sans-serif;">ID</label></div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="reg_id"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="pawssword-input-field" style="font-family:Montserrat, sans-serif;">Password </label></div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="password" name="password_1"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="repeat-pawssword-input-field" style="font-family:Montserrat, sans-serif;">Repeat Password </label></div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="password" name="password_2"></div>
                </div><button class="btn btn-light submit-button" name="register_btn" type="submit" value="Register" style="color:rgb(255,255,255);background-color:rgb(156,156,156);font-family:Montserrat, sans-serif;">Register</button></form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>