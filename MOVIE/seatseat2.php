<?php

	include('db_login.php');
    session_start();
    
    $connection = new mysqli($db_host, $db_username, $db_password);
    if (!$connection)
    {
        die ("Could not connect to the database: <br />". mysql_error());
    }
 $connection->select_db("book");

//header("Content-Type: application/json; charset=UTF-8");
//$register = json_decode($_POST["x"], false);
//$register->seat;
//$result ="INSERT INTO register values ('','','','','','','$vari')";
//mysqli_query($connection,$result);
$b_date=$_SESSION['b_date'];
$b_time=$_SESSION['b_time'];
$m_name2=$_SESSION['m_name2'];
$fetch="SELECT seat FROM register WHERE b_date='$b_date' AND b_time='$b_time' AND movie_name='$m_name2' ";
$result = $connection->query($fetch);
//$result1 = $connection->query($fetch1);
$outp=array();
$outp = $result->fetch_all(MYSQLI_ASSOC);
$outencode=json_encode($outp);
$test = array();
$fetch1="SELECT b_date,b_time FROM register ";
$result1 = $connection->query($fetch1);
$row=mysqli_fetch_assoc($result1);
//print("ARRAY");
//print_r(array_values($outp));
//echo('<br>');
$res1="";
/////TESTING STARTS HERE
foreach($outp as $key => $value)
{
  $test = $value;
  foreach($test as $key => $value)
  {
     $res=$value;

  }//end of inner for
   
$res.=',';
$res1.=$res;

}//end of for
//print_r("DEMO <br>");
$res2=$res1;
//print($res2);
/////TESTING ENDS HERE




//echo $outp[0];
//echo $outencode;
$delarr=(explode(',', $outencode));
//print $delarr[0];
$outdecode=json_decode($outencode);
//$seatlen=count($outp);
//$outencode=json_encode($outp);
//print $outencode;
//$outdecode=json_decode($outencode);
//print($outdecode);
//echo $outdecode[0]["seat"];
//echo $outdecode[1]["seat"];
//$outpp=json_encode($outp);
//print $outpp;
//$encode=json_encode($outp);
//print $encode;
//print json_decode($outp);
$email=$_SESSION['email'];
$fetch="SELECT * FROM ace WHERE movie_id = '2' ";
$resu = $connection->query($fetch);
$ro = mysqli_fetch_array($resu);
$_SESSION['m_name2'] = $ro['movie_name'];
$m_name2=$_SESSION['m_name2'];
//$sql="SELECT b_date FROM register WHERE email = '$email'";
//$result = $connection->query($sql);
//$row  = mysqli_fetch_array($result);
//$sql1="SELECT b_time FROM register WHERE email = '$email'";
//$result1 = $connection->query($sql1);
//$row1  = mysqli_fetch_array($result1);
//$_SESSION['b_date'] = $row['b_date'];

//$_SESSION['m_time1'] = $row1['b_time'];
//$m_time1=$_SESSION['m_time1'];

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="seatsel.css" type="text/css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript" src="jquery.js"></script> 
<script type="text/javascript" src="jquery.seat-charts.min.js"></script> 
<script type="text/javascript">
    
var price = 120; //price
var empty = [];
var temparr=[];

$(document).ready(function() {
    var $cart = $('#selected-seats'), //Sitting Area
    $counter = $('#counter'), //Votes
    $total = $('#total'); //Total money
    var sc = $('#seat-map').seatCharts({
        map: [  //Seating chart
            'aaaaaaaa__',
            'aaaaaaaa__',
            'aaaaaaaa__',
            'aaaaaaaa__',
            'aaaaaaaaaa',
            'aaaaaaaaaa',
            'aaaaaaaaaa',
            'aaaaaaaaaa',
            'aaaa__aaaa',
            'aaaa__aaaa',
            
        ],
        naming : {
            top : false,
            getLabel : function (character, row, column) {
                return column;
            }
        },
        legend : { //Definition legend
            node : $('#legend'),
            items : [
                [ 'a', 'available',   'Option' ],
                [ 'a', 'unavailable', 'Sold'],
                [ 'a', 'selected',   'Selected']
            ]                   
        },
        
        click: function () {//Click event 
            if (this.status() == 'available') { //optional seat
                $('<li>Row: '+(String.fromCharCode(this.settings.row+65))+' Seat: '+this.settings.label+'</li>')
                    .attr('id', 'cart-item-'+this.settings.id)
                    .data('seatId', this.settings.id)
                    .appendTo($cart);
                
                $counter.text(sc.find('selected').length+1);
                $total.text(recalculateTotal(sc)+price);
                
                var rowchar = (this.settings.row+1);
                var colseat = (this.settings.label);
                var finseat = ("'"+rowchar+'_'+colseat+"'");

                
                empty.push(finseat);
                
                //alert(empty);

                return 'selected';
                
            } else if (this.status() == 'selected') { //Checked
                    //Update Number
                    $counter.text(sc.find('selected').length-1);
                    //update totalnum
                    $total.text(recalculateTotal(sc)-price);
                        
                    //Delete reservation
                    $('#cart-item-'+this.settings.id).remove();
                    //optional
                    
                    var currele = (this.settings.id);
                    remove(empty, currele);
                    //alert(empty);
                
                    return 'available';
                
            } else if (this.status() == 'unavailable') { //sold
                return 'unavailable';
            } else {
                return this.style();
            }
        }
    });
    
    check(sc);
    
    
    //sc.get(['1_2','4_5',]).status('unavailable');
    
});

//sum total money
function recalculateTotal(sc) {
    var total = 0;
    sc.find('selected').each(function () {
        total += price;
    });
            
    return total;
}

function remove(array, element){
    var index=array.indexOf(element);
    
    array.splice(index, 1);
}

function showseat(){
	var arrlen=empty.length;
	var myarray=[];

	for(var i=0;i<arrlen;i++)
	{
		myarray.push(empty[i]);
	}
    //document.write(myarray);
    var unselstr="";
    var unselarr=[];
    var j=0;
	var strarray = myarray.toString();
    //document.write(strarray.length);
    
    //document.write(strarray);
	//document.write(strarray);
	$.post('seatsel.php',{register:strarray},function(data){
		$('#seatarray').html(data);
	});
}

function check(sc){
    var selseat = "<?php echo '['.$res2.']'; ?>";
    //alert(selseat);
      //  alert(selseat);
    //alert(selseat[4]);
    var splseat=selseat.split(",");
    //alert(ss[0]);
    //sc.get(['2_2','3_8',]).status('unavailable');


    sc.get([<?php echo $res2; ?>]).status('unavailable');
}

function myconfirm(){
    var cnf=confirm("Are you sure you want to book these seats?");
    if(cnf==true){document.getElementById("buy").disabled = false;}
}
   /* var sqlarr='<?php //echo $res2; ?>';
    var ticktock = [];
    sqlarr.split(",").map(function(arr,val){
        if(val!=""){
                  ticktock.push("'"+arr+"'")  
        }
    })
    ticktock.pop()
    document.write(ticktock);
    //var parstr=sqlarr.split(",");*/

	/*myJSON=JSON.stringify({seat:register});
	//alert(myJSON);
	document.write(myJSON);

	xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

    }
};
xmlhttp.open("POST", "seatbook.php", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + myJSON);
}

/*
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

    }
};
xmlhttp.open("POST", "url", true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.send("x=" + myJson);

header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
$obj->key;
*/
</script>
</head>
    
<body>
     <nav id="navigation">
    <article class="logo">
        <a href="browse_movie.php">
        <img src="logo.png" width="283.2" height="60"></a>
    </article>
</nav>
    <secion class="page">
        <div class="demo">
            <div id="seat-map">
                <div class="front">SCREEN</div>					
            </div>
            <div class="booking-details">
                <p>Movie: <span><?php echo $m_name2 ; ?> </span></p>
                <p>Date: <span><?php echo $b_date ; ?></span></p>
                <p>Time: <span><?php echo $b_time ; ?></span></p>
        
                <p>Seat: </p>
                <ul id="selected-seats"></ul>
                <p>Tickets: <span id="counter">0</span></p>
                <p>Total: <b>₹<span id="total">0</span></b></p>
                <button class="checkout-button" onclick="myconfirm()" id="cnf">CONFIRM</button>
                <a href="qr.php">
                <button class="checkout-button" onclick="showseat()" disabled>BUY</button></a>
                <div id="seatarray"></div>

                <div id="legend"></div>
            </div>
            <div style="clear:both"></div>
        </div>
    </secion>
</body>