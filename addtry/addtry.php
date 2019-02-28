<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="addtry.css">
    <title>Document</title>
</head>
<body>
<div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
  <div id="drag_upload_file">
    <p>Drop file here</p>
    <p>or</p>
    <p><input type="button" value="Select File" onclick="file_explorer();"></p>
    <input type="file" id="selectfile">
  </div>
</div>
</body>
</html>