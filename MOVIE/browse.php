 <?php
$con= new mysqli('localhost', 'root', '', 'movie');
$errors=array();
if(!$con)
{
    
    echo'not connected to server';
    
} 

$fetch="SELECT * FROM ace WHERE movie_id = '1' ";
$result = $con->query($fetch);
$row  = mysqli_fetch_array($result);
$_SESSION['m_name'] = $row['movie_name'];
//header('location: third.php');
 header('location: browse_movie.php');
?>