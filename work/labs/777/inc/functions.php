<?php
 displayPoints($randomValue1, $randomValue2, $randomValue3);
        
        function displaySymbol($randVal) {
            
            switch($randVal) {
                case 0:
                    $symbol = "seven";
                    break;
                case 1:
                    $symbol = "cherry";
                    break;
                case 2:
                    $symbol = "lemon";
                    break;
            }
            
             echo "<img src= 'img/$symbol.png' alt=$symbol title='". ucfirst($symbol) ."' width='70' />";
        }
        
        function displayPoints($randomValue1, $randomValue2, $randomValue3) {
            echo "<div id='output'>";
            if($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
                switch($randomValue1) {
                    case 0: 
                        $totalpoints = 1000;
                        echo "<h1>Jackpot!</h1>";
                        break;
                    case 1:
                        $totalpoints = 500;
                        break;
                    case 2: 
                        $totalpoints = 250;  
                        break;
                }
                
                echo "<h2>You won $totalpoints points!</h2>";
            }
            else {
                echo "<h3>Try again!</h3>";
            }
            echo "</div>";
        }
        
        function play() {
            for($i=1; $i<4; $i++) {
                ${"randomValue" . $i} = rand(0,2);
                displaysymbol(${"randomValue" . $i});
            }
        }
?>