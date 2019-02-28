<?php
session_start();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/dropzone.css" />
    <script type="text/javascript" src="js/dropzone.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <style>
        .upload-div{
            padding:20px;
        }
        </style>
   <div class="dropzone">
        <div class="upload-div">
        <form action="upload.php" class="dropzone"></form>
        
	
        <button id="startUpload" onclick="function();">UPLOAD</button>
    </div>
    <div class="uploaded-files">
    <?php
            // Include the database configuration file
            require 'dbConfig.php';

            // Get files from the database
            $query = $db->query("SELECT * FROM pat ORDER BY id DESC");

            if($query->num_rows > 0){
                while($row = $query->fetch_assoc()){
                    $filePath = 'uploads/'.$row["file_name"];
                    $fileMime = mime_content_type($filePath);
?>
	<embed src="<?php echo $filePath; ?>" type="<?php echo $fileMime; ?>" width="350px" height="280px" />
<?php }
}else{ ?>
    <p>No file(s) found...</p>
<?php } ?>
    </div>
    </div>
</body>
</html>

<script>
//Disabling autoDiscover
Dropzone.autoDiscover = true;

$(function() {
    //Dropzone class
    var myDropzone = new Dropzone(".dropzone", {
		url: "upload.php",
		paramName: "file",
		maxFilesize: 2,
		maxFiles: 10,
		acceptedFiles: "image/*,application/pdf"
	});
});
</script>