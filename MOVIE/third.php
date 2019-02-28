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
<link rel="stylesheet" href="try1.css" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="try.js"></script>
</head>

<body>
<nav id="navigation">
    <article class="logo">
        <a href="#">
        <img src="logo.png" width="283.2" height="60"></a>
    </article>
</nav>
    
<section class="page">
    <div style="position: relative; left: 0; top: 0;">
        <img src="<?php echo $cov1 ;?>" class="daddyt1" width="100%" height="350">
        <img src="play.png" class="call_modal" width="150" height="150" style="cursor: pointer">
        <img src="<?php echo $pos1 ;?>" class="daddy" width="200" height="290">
    </div>
    <section class="selection">
        <div class="seat">
            Seat<br>
            <select class="select">
                <option value="none">None</option>
                <option value="sno1">1</option>
                <option value="sno2">2</option>
                <option value="sno3">3</option>
                <option value="sno4">4</option>
                <option value="sno5">5</option>
                <option value="sno6">6</option>
                <option value="sno7">7</option>
                <option value="sno8">8</option>
                <option value="sno9">9</option>
                <option value="sno10">10</option>
            </select>
        </div>
        <div class="cinema">
            Cinema<br>
            <select class="select">
                <option value="none">None</option>
                <option value="cinema1">Ace Cinemas 1</option>
                <option value="cinema2">Ace Cinemas 2</option>
            </select>
        </div>
        <div class="date">
            Select Date<br>
            <input type="date" class="datebox">
        </div>
        <div class="time">
            Time<br>
            <input type="button" value="9:00am" id="timebtn">
            <input type="button" value="12:00pm" id="timebtn">
            <input type="button" value="3:00pm" id="timebtn">
            <input type="button" value="6:00pm" id="timebtn">
            <input type="button" value="9:00pm" id="timebtn">
        </div>
        <a href="seatselection.php">
        <button type="submit" id="bookbtn">Book your Tickets</button></a>
    </section>
    <article class="moviedet">
        <h1 class="movietitle"><?php echo $m_name1 ; ?> </h1>
        <article class="details">
        <img src="clock.png" width="15" height="15"><font color="red">MINUTES :  <?php echo $r1; ?> </font><br>
                    <b>Language        </b>: <?php echo $l1; ?><br>
                    <b>Genre           </b>: <?php echo $g1; ?><br>
                    <b>Cast            </b>: <?php echo $m_cast1; ?><br>
                    <b>Ratings         </b>: <?php echo $rat1; ?>/10<img src="imdb.png" width="25" height="17"><br>
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