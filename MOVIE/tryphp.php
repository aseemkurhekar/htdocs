<?php
include('db_login.php');
    session_start();
    
    $connection = new mysqli($db_host, $db_username, $db_password);
    if (!$connection)
    {
        die ("Could not connect to the database: <br />". mysql_error());
    }
 $connection->select_db("book");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="try.css" type="text/css">
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
                var finseat = (rowchar+'_'+colseat);
                
                empty.push(finseat);
                
                alert(empty);

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
                    alert(empty);
                
                    return 'available';
                
            } else if (this.status() == 'unavailable') { //sold
                return 'unavailable';
            } else {
                return this.style();
            }
        }
    });
    
    /*sc.get(['1_2', '4_4','4_5','6_6','6_7','8_5','8_6','8_7','8_8', '10_1', '10_2']).status('unavailable');*/
    
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
    <?php 
        $seat1="document.write(empty[0])"; 
        echo $seat1;
    ?>
}

</script>
</head>
    
<body>
    <secion class="page">
        <div class="demo">
            <div id="seat-map">
                <div class="front">SCREEN</div>                 
            </div>
            <div class="booking-details">
                <p>Movie: <span> Daddy</span></p>
                <p>Time: <span>October 4, 21:00</span></p>
                <p>Seat: </p>
                <ul id="selected-seats"></ul>
                <p>Tickets: <span id="counter">0</span></p>
                <p>Total: <b>₹<span id="total">0</span></b></p>

                <button class="checkout-button" onclick="showseat()">BUY</button>

                <div id="legend"></div>
            </div>
            <div style="clear:both"></div>
        </div>
    </secion>
</body>