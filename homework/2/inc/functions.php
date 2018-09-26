<?php
    $names = array("Dr. Circle", "Master Triangle", "President Octagon", "Professor Box", 
                    "Chef Hexagon", "Officer Rectangle", "Sheriff Diamond", "Jimbo");
    $winners = array(0, 0, 0, 0, 0, 0, 0, 0);
    shuffle($names);
    
    function makeMatch() {
        global $names, $winners;
        setWinners();
        $count = 0;
        if(count($names) > 4)
            $matchName = "SEMI FINALS";
        else if(count($names) > 2)
            $matchName = "FINALS";
        else if(count($names) > 1)
            $matchName = "GRAND FINALS";
        else
            $matchName = "THE WINNER";
            
        echo "<div class='matchName'>";
        echo $matchName;
        echo "</div>";
        echo "<div class='match'>";
        for($i = 0; $i < count($names); $i++) { 
                $toRotate = "";
                $winClass = " loser";
                $outcome = "Lost...";
                $extraClass = " lost";
                $count++;
                
                if($winners[$i]==1) {
                    $winClass = "";
                    $outcome = "Won!";
                    $extraClass = " victor";
                }
                    
                if($count == 1)
                    echo "<div class='fight'>";
                else
                    $toRotate = "style= 'transform: rotateY(-180deg)'";
                    
                echo "<div class='fighter$winClass'>";
                        echo "<img src='img/" . $names[$i] . ".png'" . " width=105px height=140px $toRotate alt='$names[$i]'/>";
                        echo "<br>";
                        echo "<p class='fighterName'>$names[$i]</p>";
                        echo "<span class='outcome$extraClass'>$outcome</span>";
                echo "</div>";
                
                if($count == 1 && count($names)>1) {
                    echo "<div class='versus' style='display: inline-block'>";
                    echo "<img src='img/vs.png' alt='versus' width=50px height=100px />";
                    echo "</div>";
                }
                else if($count == 2) {
                    $count = 0;
                    echo "</div>";
                }
               
            
        }
        
        cleanUp();
        echo "</div>";
        
    }
    
    function setWinners() {
        global $names, $winners;
        
        for($i = 0; $i < count($names); $i++) {
            if(count($names) == 1 || $i == 1 || $i == 3 || $i == 5 || $i == 7) {
                 if(rand(0,1)==0 || count($names)==1)
                    $winners[$i] = 1;
                 else
                    $winners[$i-1] = 1;
            }
        }
  
    }
    
    function cleanUp() {
        global $winners, $names;
        
        for($i = 0; $i < count($names); $i++) {
            if($winners[$i] == 0) {
                $names[$i] = null;
                $winners[$i] = null;
            }
            else
                $winners[$i] = 0;
        }
        $names = array_values(array_filter($names, 'strlen'));
        $winners = array_values(array_filter($winners, 'strlen'));
    }
    
    
    function start() {
        echo "<header>Shape Royale</header>";
        for($i = 0; $i < 4; $i++) {
                
            makeMatch();
            echo "<br>";
        }
     
        
    }
?>