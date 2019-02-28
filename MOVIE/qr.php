<?php
    include('db_login.php');
    session_start();
    $connection = new mysqli($db_host, $db_username, $db_password);
    if (!$connection)
    {
        die ("Could not connect to the database: <br />". mysql_error());
    }
 $connection->select_db("book");



$m_name1=$_SESSION['m_name1'];
$email=$_SESSION['email'];

$fetch ="SELECT * FROM register WHERE email = '$email' ";
$result = $connection->query($fetch);
$row  = mysqli_fetch_array($result);
$_SESSION['name'] = $row['first_name'];
$first_name=$_SESSION['name'];
$_SESSION['movie_name'] = $row['movie_name'];
$movie_name=$_SESSION['movie_name'];
$_SESSION['b_date'] = $row['b_date'];
$b_date=$_SESSION['b_date'];
$_SESSION['b_time'] = $row['b_time'];
$b_time=$_SESSION['b_time'];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="qrcode.js"></script>
<link rel="stylesheet" href="ticketpr.css" type="text/css">
<script src="pdf.js"></script>
</head>
<body>
	<nav id="navigation">
	    <article class="logo">
	        <a href="index.php">
	        <img src="logo.png" width="283.2" height="60"></a>
	    </article>
	</nav>

	<!-- 
	content of this area will be the content of your PDF file 
	-->
	<section class="container">
		<div id="HTMLtoPDF">
			<p id="cust">
				Dear <?php echo $first_name; ?>, <br>
				Your tickets have been booked. <br><br></p>

				<b>Movie Name </b>: <?php echo $movie_name; ?><br>
				<b>Date </b>: <?php echo $b_date; ?><br>
				<b>Time </b>: <?php echo $b_time; ?><br>
			
		</div>
		<input id="text" type="hidden" value="<?php echo $first_name; ?>" style="width:80%" /><br />
		<div id="qrcode" style="width:150px; height:150px; margin-top:15px;"></div>

		<a href="index.php" style="text-decoration: none; color:black;">
		<button id="prticket" onclick="myFunction()">Download Ticket</a></button>
		<article class="ins">
			<h1 id="insh">Instructions</h1>
				<p id="ins">
					<ol id="ins">
						<li>Make sure you reach 15 minutes prior to the start of the movie.</li>
						<li>Please carry printed ticket or mobile version of the ticket.</li>
						<li>Pay the amount at the Ticket Counter before collecting the ticket.</li>
						<li>Outside eatables, sharp objects, possession of weapons or drugs is not allowed.</li>
					</ol>
					<h1 id="enjoy">Enjoy your Movie! We hope to see you again!</h1>
				</p>
		</article>
	</section>
	

<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 150,
	height : 150
});

function makeCode () {		
	var elText = document.getElementById("text");
	
	qrcode.makeCode(elText.value);
}

makeCode();

$("#text").
	on("blur", function () {
		makeCode();
	}).
	on("keydown", function (e) {
		if (e.keyCode == 13) {
			makeCode();
		}
	});
</script>
</body>