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




$fetch="SELECT * FROM ace WHERE movie_id = '2' ";
$result = $connection->query($fetch);
$row  = mysqli_fetch_array($result);
$_SESSION['m_name2'] = $row['movie_name'];
$m_name2=$_SESSION['m_name2'];
$_SESSION['m_cast2'] = $row['movie_cast'];
$m_cast2=$_SESSION['m_cast2'];
$_SESSION['r2'] = $row['runtime'];
$r2=$_SESSION['r2'];
$_SESSION['p2'] = $row['movie_photo'];
$p2=$_SESSION['p2'];
$_SESSION['l2']=$row['language'];
$l2=$_SESSION['l2'];
$_SESSION['g2']=$row['genre'];
$g2=$_SESSION['g2'];
$_SESSION['c_r2']=$row['censor_rating'];
$c_r2=$_SESSION['c_r2'];
$_SESSION['rat2']=$row['rating'];
$rat2=$_SESSION['rat2'];



$fetch="SELECT * FROM ace WHERE movie_id = '3' ";
$result = $connection->query($fetch);
$row  = mysqli_fetch_array($result);
$_SESSION['m_name3'] = $row['movie_name'];
$m_name3=$_SESSION['m_name3'];
$_SESSION['m_cast3'] = $row['movie_cast'];
$m_cast3=$_SESSION['m_cast3'];
$_SESSION['r3'] = $row['runtime'];
$r3=$_SESSION['r3'];
$_SESSION['p3'] = $row['movie_photo'];
$p3=$_SESSION['p3'];
$_SESSION['l3']=$row['language'];
$l3=$_SESSION['l3'];
$_SESSION['g3']=$row['genre'];
$g3=$_SESSION['g3'];
$_SESSION['c_r3']=$row['censor_rating'];
$c_r3=$_SESSION['c_r3'];
$_SESSION['rat3']=$row['rating'];
$rat3=$_SESSION['rat3'];



$fetch="SELECT * FROM ace WHERE movie_id = '4' ";
$result = $connection->query($fetch);
$row  = mysqli_fetch_array($result);
$_SESSION['m_name4'] = $row['movie_name'];
$m_name4=$_SESSION['m_name4'];
$_SESSION['m_cast4'] = $row['movie_cast'];
$m_cast4=$_SESSION['m_cast4'];
$_SESSION['r4'] = $row['runtime'];
$r4=$_SESSION['r4'];
$_SESSION['p4'] = $row['movie_photo'];
$p4=$_SESSION['p4'];
$_SESSION['l4']=$row['language'];
$l4=$_SESSION['l4'];
$_SESSION['g4']=$row['genre'];
$g4=$_SESSION['g4'];
$_SESSION['c_r4']=$row['censor_rating'];
$c_r4=$_SESSION['c_r4'];
$_SESSION['rat4']=$row['rating'];
$rat4=$_SESSION['rat4'];


$fetch="SELECT * FROM ace WHERE movie_id = '5' ";
$result = $connection->query($fetch);
$row  = mysqli_fetch_array($result);
$_SESSION['m_name5'] = $row['movie_name'];
$m_name5=$_SESSION['m_name5'];
$_SESSION['m_cast5'] = $row['movie_cast'];
$m_cast5=$_SESSION['m_cast5'];
$_SESSION['r5'] = $row['runtime'];
$r5=$_SESSION['r5'];
$_SESSION['p5'] = $row['movie_photo'];
$p5=$_SESSION['p5'];
$_SESSION['l5']=$row['language'];
$l5=$_SESSION['l5'];
$_SESSION['g5']=$row['genre'];
$g5=$_SESSION['g5'];
$_SESSION['c_r5']=$row['censor_rating'];
$c_r5=$_SESSION['c_r5'];
$_SESSION['rat5']=$row['rating'];
$rat5=$_SESSION['rat5'];


$fetch="SELECT * FROM ace WHERE movie_id = '6' ";
$result = $connection->query($fetch);
$row  = mysqli_fetch_array($result);
$_SESSION['m_name6'] = $row['movie_name'];
$m_name6=$_SESSION['m_name6'];
$_SESSION['m_cast6'] = $row['movie_cast'];
$m_cast6=$_SESSION['m_cast6'];
$_SESSION['r6'] = $row['runtime'];
$r6=$_SESSION['r6'];
$_SESSION['p6'] = $row['movie_photo'];
$p6=$_SESSION['p6'];
$_SESSION['l6']=$row['language'];
$l6=$_SESSION['l6'];
$_SESSION['g6']=$row['genre'];
$g6=$_SESSION['g6'];
$_SESSION['c_r6']=$row['censor_rating'];
$c_r6=$_SESSION['c_r6'];
$_SESSION['rat6']=$row['rating'];
$rat6=$_SESSION['rat6'];
 ?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="moviesbr.css" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="javascript.js"></script>
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
    <section class="movielist">
        <article class="mov">
            <article class="movdescript">
                  <h1 class="movtitle"><?php echo $m_name1; ?></h1>
                    <a href="third1.php">
                        <button class="book">BOOK NOW</button>
                    </a>
                <article class="movdetails">
                    <img src="clock.png" width="15" height="15" style="margin-right: 5px;"><font color="red">MINUTES :  <?php echo $r1; ?> </font><br>
                    <b>Language        </b>: <?php echo $l1; ?><br>
                    <b>Genre           </b>: <?php echo $g1; ?><br>
                    <b>Cast            </b>: <?php echo $m_cast1; ?><br>
                    <b>Ratings         </b>: <?php echo $rat1; ?>/10<br>
                    <b>Censor Ratings  </b>: <?php echo $c_r1; ?>
                </article>
            </article>
            <img src="<?php echo $p1; ?>" width="373.8" height="210">
        </article>
        <div class="space"></div>
        <article class="mov">
            <article class="movdescript">
                <p class="movtitle"><?php echo $m_name2; ?></p>
                 <a href="third2.php">
                        <button class="book">BOOK NOW</button>
                    </a>
                <article class="movdetails">
                    <img src="clock.png" width="15" height="15" style="margin-right: 5px;"><font color="red">MINUTES :  <?php echo $r2; ?></font><br>
                    <b>Language        </b>: <?php echo $l2; ?><br>
                    <b>Genre           </b>: <?php echo $g2; ?><br>
                    <b>Cast            </b>: <?php echo $m_cast2; ?><br>
                    <b>Ratings         </b>: <?php echo $rat2; ?>/10<br>
                    <b>Censor Ratings  </b>: <?php echo $c_r2; ?>
                </article>
            </article>
            <img src="<?php echo $p2; ?>" width="373.8" height="210">
        </article>
        <div class="space"></div>
        <article class="mov">
            <article class="movdescript">
                <p class="movtitle"><?php echo $m_name3; ?></p>
                <a href="third3.php">
                        <button class="book">BOOK NOW</button>
                    </a>
                <article class="movdetails">
                    <img src="clock.png" width="15" height="15" style="margin-right: 5px;"><font color="red">MINUTES :  <?php echo $r3; ?></font><br>
                    <b>Language        </b>: <?php echo $l3; ?><br>
                    <b>Genre           </b>: <?php echo $g3; ?><br>
                    <b>Cast            </b>: <?php echo $m_cast3; ?><br>
                    <b>Ratings         </b>: <?php echo $rat3; ?>/10<br>
                    <b>Censor Ratings  </b>: <?php echo $c_r3; ?>
                </article>
            </article>
            <img src="<?php echo $p3; ?>" width="373.8" height="210">
        </article>
        <div class="space"></div>
        <article class="mov">
            <article class="movdescript">
                <p class="movtitle"><?php echo $m_name4; ?></p>
                    <a href="third4.php">
                        <button class="book">BOOK NOW</button>
                    </a>                <article class="movdetails">
                    <img src="clock.png" width="15" height="15" style="margin-right: 5px;"><font color="red">MINUTES :  <?php echo $r4; ?></font><br>
                    <b>Language        </b>: <?php echo $l4; ?><br>
                    <b>Genre           </b>: <?php echo $g4; ?><br>
                    <b>Cast            </b>: <?php echo $m_cast4; ?><br>
                    <b>Ratings         </b>: <?php echo $rat4; ?>/10<br>
                    <b>Censor Ratings  </b>: <?php echo $c_r4; ?>
                </article>
            </article>
            <img src="<?php echo $p4; ?>" width="373.8" height="210">
        </article>
        <div class="space"></div>
        <article class="mov">
            <article class="movdescript">
                <p class="movtitle"><?php echo $m_name5; ?></p>
                    <a href="third5.php">
                        <button class="book">BOOK NOW</button>
                    </a>                 <article class="movdetails">
                    <img src="clock.png" width="15" height="15" style="margin-right: 5px;"><font color="red"> MINUTES :  <?php echo $r5; ?></font><br>
                    <b>Language        </b>: <?php echo $l5; ?><br>
                    <b>Genre           </b>: <?php echo $g5; ?><br>
                    <b>Cast            </b>: <?php echo $m_cast5; ?><br>
                    <b>Ratings         </b>: <?php echo $rat5; ?>/10<br>
                    <b>Censor Ratings  </b>: <?php echo $c_r5; ?>
                </article>
            </article>
            <img src="<?php echo $p5; ?>" width="373.8" height="210">
        </article>
        <div class="space"></div>
        <article class="mov">
            <article class="movdescript">
                <p class="movtitle"><?php echo $m_name6; ?></p>
                    <a href="third6.php">
                        <button class="book">BOOK NOW</button>
                    </a>                 <article class="movdetails">
                    <img src="clock.png" width="15" height="15" style="margin-right: 5px;"><font color="red"> MINUTES :  <?php echo $r6; ?></font><br>
                    <b>Language        </b>: <?php echo $l6; ?><br>
                    <b>Genre           </b>: <?php echo $g6; ?><br>
                    <b>Cast            </b>: <?php echo $m_cast6; ?><br>
                    <b>Ratings         </b>: <?php echo $rat6; ?>/10<br>
                    <b>Censor Ratings  </b>: <?php echo $c_r6; ?>
                </article>
            </article>
            <img src="<?php echo $p6; ?>" width="373.8" height="210">
        </article>
        <div class="space"></div>
    </section>
</section>
</body>
</html>