<?php
session_start();

$db = new mysqli("localhost", "root", "password");
if (!$db)
	{
		die ("Could not connect to the database: <br />". mysql_error());
	}
$db->select_db("authentication");
if(isset($_POST['search'])){
    $q = $_POST['q'];
    $qname = preg_replace("#[^0-9a-z]i#","", $q);
    //echo("NOT FOUND1");
    $query = mysqli_query($db,"SELECT * FROM users WHERE username LIKE '%$qname%'"); 
   // echo("NOT FOUND2");
//Replace table_name with your table name and `thing_to_search` with the column you want to search
    $count = mysqli_num_rows($query);
   // echo("NOT FOUND3");
	if($count == "0"){
        $output = '<h2>No result found!</h2>';
	}else{
		while($row = mysqli_fetch_array($query)){
		$s = $row['username']; // Replace column_to_display with the column you want the results from
                $output = '<h2>'.$s.'</h2><br>';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Search</title>
	</head>
	<body>
		<form method="POST" action="test.php">
			<input type="text" name="q" placeholder="query">
			<input type="submit" name="search" value="Search">
		</form>
        <?php echo ($output); ?>
	</body>
</html>