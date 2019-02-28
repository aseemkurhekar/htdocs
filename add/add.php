<?php
session_start();
$db = new mysqli("localhost", "root", "password");
if (!$db)
	{
		die ("Could not connect to the database: <br />". mysql_error());
	}
$db->select_db("authentication");

$username=$_POST['username'];
$username=$_SESSION['username'];
$id=$_POST['fname'];
/*if(isset($_POST['upload']))
{
//$file = addslashes(file_get_contents($_FILES["upload1"]["tmp_name"])); 
  $image = $_FILES["upload1"]["type"];
  $id = $_POST['fname'];
//$sql="INSERT INTO patient(mri) VALUES ('$file')";
  $sql="INSERT INTO patient(id) VALUES ('$id')";
    //$sql="SELECT * FROM users WHERE username='s' AND password='81dc9bdb52d04dc20036dbd8313ed055'";
    //echo($sql);
  $result = $db->query($sql);

} */
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo '<script language="javascript">';
        echo 'alert("File is an image - " . $check["mime"] . ".")';
        echo '</script>';
        $uploadOk = 1;
    } else {
        echo '<script language="javascript">';
        echo 'alert("File is not an image.")';
        echo '</script>';
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo '<script language="javascript">';
    echo 'alert("File already exists.")';
    echo '</script>';
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo '<script language="javascript">';
    echo 'alert("Sorry, your file is too large.")';
    echo '</script>';
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo '<script language="javascript">';
    echo 'alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")';
    echo '</script>';
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo '<script language="javascript">';
    echo 'alert("Sorry, your file was not uploaded.")';
    echo '</script>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $sql="INSERT INTO patient(id) VALUES ('$id')";
        $result = $db->query($sql);
        echo '<script language="javascript">';
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        echo 'alert("Your file was uploaded successfully.")';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Sorry, there was an error uploading your file.")';
        echo '</script>';
    }

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addd</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="assets/css/Drag--Drop-Upload-Form-1.css">
    <link rel="stylesheet" href="assets/css/Drag--Drop-Upload-Form.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/upload.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="C:\Bitnami\apache2\htdocs\report\assets\js\html2pdf.bundle.min.js"></script>
</head>

<body>
  <div>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="padding:-2px;margin:0px;margin-bottom:0px;background:black;">
            <div class="container" style="margin:0px;"><a class="navbar-brand align-items-start" href="../hometry/hometry.php" style="font-family:Montserrat, sans-serif;color:rgb(255,255,255);float:left;">MCI DETECTOR</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation">
                        <a name="logout" class="nav-link" href="?logout" style="color:rgb(255,255,255);font-family:Montserrat, sans-serif;float:right;">Logout <?php echo($username);?></a>
                         </li>
                    </ul>
                    <?php
                    if(isset($_GET['logout'])) {
                        session_unset();
                        header("Location: ../index.php");
                      }
                      ?>
            </div>
    </div>
    </nav>
  </div>
  <div>
    <form action="add.php" name="myForm" method="post" style="font-family:Montserrat;margin-left:20%;margin-top:10%;height:100px" enctype="multipart/form-data">
      <input type="text" name="fname" id="fname" placeholder="ENTER PATIENT ID" style=" font-family: Montserrat, sans-serif;height: 55px;width: 758px;font-size: 40px;margin-top: 0%; color: gray;text-align: center;">
      <input name="upload" id="register" type="button" value="REGISTER" style="border:none;height:55px;margin-top:0px;font-family:Montserrat, sans-serif;background:rgb(158,158,158);position:absolute;">                 
  </div>
  <div class="wrapper" style="margin-left:2.4%;height:30%;">
  <div id="upload" style="visibility:hidden;margin-top:20%;">
    <input type="file" name="fileToUpload" id="fileToUpload" />
    <i class="fa fa-arrow-up"></i>
   
      </div>
  <div>
  <input id="upload1"  type="submit" value="Upload Image" name="submit"  style="visibility:hidden; border:none;height:55px;background-color:rgb(158,158,158);font-family:Montserrat, sans-serif;color:white;    margin-left: -130%;
    margin-top: -50%;">
  </div> 
</form>
</div>
</body>
<script>
   $(document).ready(function(){
      $("#register").click(function(){
        var x = document.getElementById("fname").value;
        if(x == "")
          alert("Please enter Patient ID.");
        else if(isNaN(x))
        {
            alert("Enter valid Patient ID.");
            document.getElementById("fname").value = "";
        }
        else
        {
            $('#upload').css("visibility","visible");
            $('#upload').addClass("file-upload");
        }
      });
   });
</script>  
<script>
    $(document).ready(function(){
      $("#fileToUpload").click(function(){
            $('#upload1').css("visibility","visible");
            $('#upload').addClass("file-upload");
      });
   });
</script>
</html>
