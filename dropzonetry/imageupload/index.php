<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="C:\Bitnami\apache2\htdocs\report\assets\css\styles.css">
    <link rel="stylesheet" href="Navigation-Clean.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
</head>
<body style="background-color:#fff">
<div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background-color:rgb(0,0,0);color:rgb(255,255,255);width:100%">
            <div class="container"><a class="navbar-brand" href="#" style="text-decoration:none;color:white;float:left;font-family:Montserrat, sans-serif;background-color:#000000;">MCI DETECTOR</a>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="text-decoration:none;color:white;font-family:Montserrat, sans-serif;float:right">Logout</a></li>
                    </ul>
                    <?php
                    if(isset($_GET['logout'])) {
                        session_unset();
                        header("Location: ../../index.php");
                      }
                      ?>
            </div>
    </div>
    </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto">
                <div class="card bg-light mt-5">
                    <div class="card-title">
                      
                    </div>
    
                    <div class="card-body" style="text-align:center;height:400px">

                       <form action="process.php" method="POST" enctype="multipart/form-data" style="margin-top:155px;font-family:Montserrat, sans-serif;">
                            <label class="btn btn-success" style="margin-bottom:50px;margin-left:50px;">
                               <br/>
                            <br/>  
                            <input type="text" name="id" style="font-family:Montserrat, sans-serif;margin-top:20px;text-align:center;" placeholder="PATIENT ID"/>
                            <br/>
                            <br/>
                            <input type="file" name="pictures" style="font-family:Montserrat, sans-serif;margin-top:20px;margin-left:80px;" >
                            </label><br>
                            <button class="btn btn-primary" name="upload" style="margin-top:55px" style="font-family:Montserrat, sans-serif;">Upload Now</button>
                       </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>