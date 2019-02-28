<?php
session_start();
if(isset($_POST['submit-btn']))
{
   
    $file = $_FILES['file'];
    echo($file);
    $fileName=$_FILES['file']['name'];
    echo($fileName);
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','pdf');
    echo("POSTED");
    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
           
                if($fileSize<100000){
                    $fileNameNew=uniqid('',true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    header("location:index.php?uploadsuccess");
                    
                }
                else{
                    echo("File size is too large!");
                }
        }
        else{
            echo("There was an error uploading file");
        }
    }
    else
    {
        echo("Cant upload this file type");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST" enctype="multipart/form-data"></form>
    <input type="file" name="file">
    <button type="submit" name="submit-btn">UPLOAD</button>
</body>
</html>