<!DOCTYPE html>
<html>

<head>
    <title> RPS </title>
    <style type="text/css">
        body {
            background-color: black;
            color: white;
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            text-align: center;
            margin: 0 70px;
        }

        .matchWinner {
            background-color: yellow;
            margin: 0 70px;
        }

        #finalWinner {
            margin: 0 auto;
            width: 500px;
            text-align: center;
        }
        
        hr {
            width:33%;
        }        
    </style>
    
    <?php
 
        function play() {
            $onePoints = 0;
            $twoPoints = 0;
           for($i=1; $i<4; $i++) {
                $randVal1 = rand(0,2);
                $randVal2 = rand(0,2);
                if(displayMatch($randVal1, $randVal2, $onePoints, $twoPoints)==1)
                    $onePoints++;
                else
                    $twoPoints++;
            }
            
            if($onePoints > $twoPoints)
                $winner = 1;
            else
                $winner = 2;
            
            echo "<div id='finalWinner'>";
                echo "<h1>The winner is Player $winner</h1>";
            echo "</div>";
        }
        
        function displayMatch($randVal1, $randVal2, $onePoints, $twoPoints) {
            echo "<div class='row'>";
            /* Scissors One*/
            if($randVal1 == 0 && $randVal2 == 1) {
                $one = "scissors";
                $two = "rock";
                $winStat1 = "";
                $winStat2 = ", matchWinner";
                $twoPoint++;
            }
            if($randVal1 == 0 && $randVal2 == 2) {
               $two = "paper";
               $one = "scissors";
               $winStat2 = "";
               $winStat1 = ", matchWinner";
               $onePoint++;
            }
            /* Rock One */
            if($randVal1 == 2 && $randVal2 == 1) {
                $two = "rock";
                $one = "paper";
                $winStat1 = "";
                $winStat2 = ", matchWinner";
                $twoPoint++;
                
            }
            if($randVal1 == 2 && $randVal2 == 0) {
                $two = "scissors";
                $one = "paper";
                $winStat1 = "";
                $winStat2 = ", matchWinner";
                $twoPoint++;
            }
            /* Paper One*/
            if($randVal1 == 1 && $randVal2 == 2) {
                $two = "paper";
                $one = "rock";
                $winStat2 = ", matchWinner";
                $winStat1 = "";
                $twoPoint++;
            }
            if($randVal1 == 1 && $randVal2 == 0) {
                $two = "scissors";
                $one = "rock";
                $winStat2 = "";
                $winStat1 = ", matchWinner";
                $onePoint++;
            }
            if($randVal1 == $randVal2) {
                if(rand(0,1) == 0) {
                    $two = "scissors";
                    $one = "rock";
                    $winStat2 = "";
                    $winStat1 = ", matchWinner";
                    $onePoint++;
                }
                
                else {
                    $two = "paper";
                $one = "rock";
                $winStat2 = ", matchWinner";
                $winStat1 = "";
                $twoPoint++;
                }
            }
            
                 echo "<div class='col$winStat1'><img src='img/$one.png' alt='$one' width='150'></div>";
                 echo "<div class='col$winStat2'><img src='img/$two.png' alt='$two' width='150'></div>";
            echo "</div>";
            echo "<hr>";
            if($onePoint == 1)
                return 1;
            else
                return 2;
        }
    ?>
    
</head>

<body>

    <h1> Rock, Paper, Scissors </h1>

    <div class="row">
        <div class="col">
            <h2>Player 1</h2>
        </div>
        <div class="col">
            <h2>Player 2</h2>
        </div>
    </div>
    <?php
        play();
    ?>
    Images source: https://www.kisspng.com/png-rockpaperscissors-game-money-4410819/
</body>

</html>
