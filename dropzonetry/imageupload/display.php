<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>How to Upload Image</title>
</head>
<body style="background-color:#CCC">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 m-auto">
                <div class="card bg-light mt-5">
                    <div class="card-title">
                        <h3 class="text-center pt-3">Upload Image on MySQLi</h3>
                    </div>
                    <div class="card-body">

                     <?php 
                     require_once("connection.php");
                     if(isset($_GET['success']))
                     {

                     
                     $viewquery = "SELECT * FROM pat";
                     $result = mysqli_query($con,$viewquery);

                     while($row=mysqli_fetch_assoc($result))
                     {
                         $display=$row['image'];

                        echo '  <div class="card-body">
                                    <img src="img/'.$display.'" width="200" heigt="200" class="m-auto">;
                                </div>';                            
                     }
                    }
                    else
                    {
                        header("location: index.php");
                    }

                     
                     ?>

                   
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>