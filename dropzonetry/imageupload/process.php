<?php
    session_start();
    require_once("connection.php");
    if(isset($_POST['upload']))
    {
        $Image = $_FILES['pictures']['name'];
        $Type = $_FILES['pictures']['type'];
        $Temp = $_FILES['pictures']['tmp_name'];
        $size = $_FILES['pictures']['size'];
        $id=$_POST['id'];
        
        $ImageExt = explode('.',$Image);
        $ImgCorrectExt = strtolower(end($ImageExt));
        $Allow = array('jpg','jpeg','png');
        $target = "img/".$Image;
        $sql = "INSERT INTO pat (pat_id) VALUES('$id')";
        mysqli_query($con,$sql);
        if(in_array($ImgCorrectExt,$Allow))
        {
            if($size<10000000 && $id!=NULL)
            {
                $query = "INSERT INTO pat (file_name) values ('$Image')";
                mysqli_query($con,$query);
                move_uploaded_file($Temp,$target);
                echo ' You have Successfully Uploaded Image on Database';
                header("location: ../../report/report.php?success");
            }
            else
            {
                echo 'File size Too Large';
            }
        }
        else
        {
            echo ' You Cannot upload image'; 
        }

    }
    else
    {
        header("location:index.php");
    }
?>