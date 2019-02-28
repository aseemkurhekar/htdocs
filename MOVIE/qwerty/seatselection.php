<?php
$con= new mysqli('localhost', 'root', '', 'movie');
session_start();
$errors=array();

if(!$con)
{
    
    echo'not connected to server';
    
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="seats.css" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="seatjava.js"></script>
</head>

<body>
	



<form action="book.php" method="post">
        <table>
          
          
            <?php
            $result = $con->query("SELECT * FROM seats ");
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
              ?>
              <tr>
                <td><?php echo $row['seatname']; ?></td>
                <td><input type="checkbox" name="<?php echo $row['seatname']; ?>" id="<?php echo $row['seatname']; ?>" class="css-checkbox" /><label for="<?php echo $row['seatname']; ?>" class="css-label"></label></td>
              </tr>
              <?php
            }

            ?>
          </tbody>
        </table>
        <ul>
          <div class="submit">
            <button type="submit" >SUBMIT</button>
          </div>
        </ul>
        
      </form>
      
    </body>
</html>
