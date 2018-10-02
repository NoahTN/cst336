<?php
    $cards = array();
    $kingCount = 0;
    $aceCount = 0;
    
     function setupCards() {
                global $cards;
                for($j = 1; $j <= 52; $j++) {
                    
                    if($j < 14) {
                        $cards[$j]["suit"] = "clubs";
                        $cards[$j]["value"] = $j;
                    }
                    else if($j < 27) {
                        $cards[$j]["suit"] = "diamonds";
                        $cards[$j]["value"] = $j-13;
                        
                    }
                    else if($j < 40) {
                        $cards[$j]["suit"] = "hearts";
                        $cards[$j]["value"] = $j-26;
                    }
                    else {
                        $cards[$j]["suit"] = "spades";
                        $cards[$j]["value"] = $j-39;
                    }
                    
                    $cards[$j]['used'] = 0;   
                }
                
                unset($cards[0]);
                $cards = array_values($cards);
              
    }
    
    function makeTable() {
        global $cards, $kingCount, $aceCount;
        $cardNums = array();
     
        for($i = 0; $i < $_GET['rows'] * $_GET['cols'];  $i++) {
             $randVal = rand(0, count($cards)-1);
          
             while($cards[$randVal]['suit'] == $_GET['category'] || $cards[$randVal]['used'] == 1) {
                $randVal = rand(0, count($cards)-1);
             }
            $cardNums[] = $randVal;
          
            $cards[$randVal]['used'] = 1;
        }
        sort($cardNums);
         
       
        echo "<table border='1'>";
        $pos = 0;
        for($i = 0; $i < $_GET["rows"]; $i++) {
            echo "<tr>";
            
            for($j = 0; $j < $_GET["cols"]; $j++) {
                
                $class = "";
                
                if($cards[$cardNums[$pos]]['value'] == 1) {
                    $aceCount++;
                    $class = "ace";
                }
                else if($cards[$cardNums[$pos]]['value'] == 13) {
                    $kingCount++;
                    $class = "king";
                }
          
   
            echo "<td class=$class><img src='cards/". $cards[$cardNums[$pos]]['suit'] ."/" . $cards[$cardNums[$pos]]['value'] .".png'></td>";
               $pos++;
               
            }
         
            echo "</tr>";
        }
        
        echo "</table>";
    }
    function getWinner() {
        global $aceCount, $kingCount;
        if ($aceCount > $kingCount) {
            echo "Aces Win!";
        }else if ($kingCount > $aceCount) {
            echo "Kings Win!";
        }else {
            echo "TIE - No winner.";
        }
    }
  
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Aces vs. Kings</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <header>Aces vs. Kings</header>
        <?php 
            echo "<br>";
            if($_GET['rows'] * $_GET['cols'] > 39) {
                echo "ERROR: the product of the number of rows and columns is greater than 39!";
            }
            else {
                setupCards();
                makeTable();
                echo "<br>";
                echo "Number of Aces: $aceCount";
                echo "<br>";
                echo "Number of Kings: $kingCount";
                echo "<br>";
                getWinner();
                echo "<br>";
            }
        ?>
        <form action="save.php">
             <br>
             <label for="rows">Number of Rows: </label> 
             <input type="text" name="rows" value="<?=$_GET['rows']?>"/>
             <br>
             <label for="cols">Number of Columns: </label> 
             <input type="text" name="cols" value="<?=$_GET['cols']?>"/>
             <br>
             <label for="category">Suit to omit: </label>
             <select name="category">
                <option value="clubs">Clubs</option>
                <option value="diamonds">Diamonds</option>
                <option value="hearts">Hearts</option>
                <option value="spades">Spades</option>
             </select>
             
             <input type="submit" value="Submit" />
        </form>
    </body>
</html>