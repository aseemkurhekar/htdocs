<?php
    include('db_login.php');
    session_start();
    $connection = new mysqli($db_host, $db_username, $db_password);
    if (!$connection)
    {
        die ("Could not connect to the database: <br />". mysql_error());
    }
 $connection->select_db("book");
$name = $_SESSION['name'];
$fetch="SELECT * FROM ace WHERE movie_id = '1' ";
$result = $connection->query($fetch);
$row  = mysqli_fetch_array($result);
$_SESSION['m_name1'] = $row['movie_name'];
$m_name1=$_SESSION['m_name1'];
$_SESSION['m_cast1'] = $row['movie_cast'];
$m_cast1=$_SESSION['m_cast1'];
$_SESSION['r1'] = $row['runtime'];
$r1=$_SESSION['r1'];
$_SESSION['p1'] = $row['movie_photo'];
$p1=$_SESSION['p1'];
$_SESSION['l1']=$row['language'];
$l1=$_SESSION['l1'];
$_SESSION['g1']=$row['genre'];
$g1=$_SESSION['g1'];
$_SESSION['c_r1']=$row['censor_rating'];
$c_r1=$_SESSION['c_r1'];
$_SESSION['rat1']=$row['rating'];
$rat1=$_SESSION['rat1'];
$_SESSION['pos1']=$row['movie_photo_2'];
$pos1=$_SESSION['pos1'];
$_SESSION['cov1']=$row['movie_cover'];
$cov1=$_SESSION['cov1'];
$_SESSION['t1']=$row['trailer'];
$t1=$_SESSION['t1'];
$_SESSION['cname_1']=$row['cast_name_1'];
$cname_1=$_SESSION['cname_1'];
$_SESSION['cast1_photo_1']=$row['cast_photo_1'];
$cast1_photo_1=$_SESSION['cast1_photo_1'];
$_SESSION['cname_2']=$row['cast_name_2'];
$cname_2=$_SESSION['cname_2'];
$_SESSION['cast1_photo_2']=$row['cast_photo_2'];
$cast1_photo_2=$_SESSION['cast1_photo_2'];
$_SESSION['m_desc1']=$row['movie_desc'];
$m_desc1=$_SESSION['m_desc1'];
$_SESSION['r1'] = $row['runtime'];
$r1=$_SESSION['r1'];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="third.css" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="third.js"></script>
</head>

<body>
<nav id="navigation">
    <div id="welname">
    <b>WELCOME</b>, <?php echo $name; ?>!
    </div>
    <div class="logout-button">
          <a href="?logout" id="logref">Logout</a>
          <?php
          if(isset($_GET['logout'])) {
            session_unset();
            header("Location: index.php");
          }
          ?>
    </div>
    <article class="logo">
        <a href="browse_movie.php">
        <img src="logo.png" width="283.2" height="60"></a>
    </article>
</nav>
    
<section class="page">
    <div style="position: relative; left: 0; top: 0;">
        <img src="<?php echo $cov1 ;?>" class="daddyt1" width="100%" height="350">
        <img src="play.png" class="call_modal" width="150" height="150" style="cursor: pointer">
        <img src="<?php echo $pos1 ;?>" class="daddy" width="200" height="290">
    </div>
    <form action="movie_d1.php" method="post" >
    <section class="selection">
        <div class="date">
            Select Date<br>
            <input type="date" name="b_date" class="datebox" id="txtDate">
        </div>
        <div class="time">
            Time<br>
            <input type="radio" name="b_time" value="9:00am" id="timebtn">9:00 am<br>
            <input type="radio" name="b_time" value="12:00pm" id="timebtn">12:00 pm<br>
            <input type="radio" name="b_time" value="3:00pm" id="timebtn">3:00 pm<br>
            <input type="radio" name="b_time" value="6:00pm" id="timebtn">6:00 pm<br>
            <input type="radio" name="b_time" value="9:00pm" id="timebtn">9:00 pm<br>
        </div>
        <a href="seatseat1.php">
        <button type="submit" id="bookbtn" >Book your Tickets</button></a>
    </section>
    </form>
    <article class="moviedet">
        <h1 class="movietitle"><?php echo $m_name1 ; ?> </h1>
        <article class="details">
        <img src="clock.png" width="15" height="15" style="margin-right: 7px;"><font color="red">MINUTES :  <?php echo $r1; ?> </font><br>
                    <b>Language        </b>: <?php echo $l1; ?><br>
                    <b>Genre           </b>: <?php echo $g1; ?><br>
                    <b>Cast            </b>: <?php echo $m_cast1; ?><br>
                    <b>Ratings         </b>: <?php echo $rat1; ?>/10  <img src="imdb.png" width="25" height="17"><br>
                    <b>Censor Ratings  </b>: <?php echo $c_r1; ?>
        </article>
    </article>
    <article class="movdes">
        <h1 class="plot">The Plot</h1>
        <article class="pldet">
          <?php echo $m_desc1 ;?>
        </article>
        <article class="castlist">
        <h1 class="cast">Cast</h1>
        <article class="castpic"><img src="<?php echo $cast1_photo_1 ; ?>" width="160" height="160" style="border-radius: 90px;">
            <?php echo $cname_1 ; ?> 
        </article>
        <article class="castpic"><img src="<?php echo $cast1_photo_2 ; ?>" width="160" height="160" style="border-radius: 90px;"> <?php echo $cname_2 ; ?>
        </article>
        </article>
    </article>
</section>
<div class="modal">
<div class="modal_close close"></div>
<div class="modal_main">
<img src="i783wQYjrKQ.png" class="close" style="margin-top:13px;left:96%;position:fixed;">
    <iframe id="modalvid" width="100%" height="100%" src="<?php echo $t1 ;?>"></iframe> 
</div>
</div>
</body>
</html>