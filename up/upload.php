<?php
session_start();
if(isset($_POST['submit-btn']))
{
    echo("POSTED");
    $file = $_FILES['file'];
    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','pdf');

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