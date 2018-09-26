<?php

include 'inc/charts.php';
$posters = array("ready_player_one","rampage","paddington_2","hereditary","alpha","black_panther","christopher_robin","coco","dunkirk","first_man");
$activePosters = array();
$highestPos = 0;
$highestVal = 0;

function movieReviews() {
    global $posters, $highestPos, $highestVal, $activePosters;
    
    for($i = 0; $i < 4; $i++) {
        $randVal = rand(0,count($posters)-1);
        $activePosters[$i] = ucwords(str_replace("_", " ", $posters[$randVal]));
        unset($posters[$randVal]);
        $posters = array_values($posters);
    }
    sort($activePosters);
    
    for($i = 0; $i < 4; $i++) {
        
        echo "<div class='poster'>";
        echo "<h2> $activePosters[$i] </h2>";
        $activePosters[$i] = strtolower(str_replace(" ", "_", $activePosters[$i]));
        echo "<img width='100' src='img/posters/$activePosters[$i].jpg'>";    
        echo "<br>";
        
        //NOTE: $totalReviews must be a random number between 100 and 300
        $totalReviews = rand(100, 300); 
        
        //NOTE: $ratings is an array of 1-star, 2-star, 3-star, and 4-star rating percentages
        //      The sum of rating percentages MUST be 100
    
    
        $people = 100;
        $ratings = array(0, 0, 0, 0);
        
        for($j = 3; $j >= 0; $j--) {
            if($j == 3 && strcmp($activePosters[$i], "ready_player_one") == 0) {
                $ratings[$j] = rand(76, 100);
                $people -= $ratings[$j];
            }else if($j == 0){
                $ratings[$j] = $people;
            }else {
                $ratings[$j] = rand(0, $people);
                $people -= $ratings[$j];
            }
        }
    
        //NOTE: displayRatings() displays the ratings bar chart and
        //      returns the overall average rating
       
        $overallRating = displayRatings($totalReviews,$ratings);
        if($overallRating > $highestVal) {
            $highestVal = $overallRating;
            $highestPos = $i;
        }
         echo "<br>";
        //NOTE: The number of stars should be the rounded value of $overallRating
        for ($j = 0; $j < round($overallRating); $j++) {
            echo "<img src='img/star.png' width='25'>";
        }
        echo "<br>Total reviews: $totalReviews";
        echo "</div>";
    }
}    

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Movie Reviews </title>
        <style type="text/css">
            body {
                background-image: url("img/bg.jpg");
                text-align:center;
                color: red;
            }
            #main {
                display:flex;
                justify-content: center;
            }
            .poster {
                padding: 0 10px;
            }
        </style>
    </head>
    <body>
       
       <h1> Movie Reviews </h1>
        <div id="main">
           <?php
             //NOTE: Add for loop to display 4 movie reviews
             
                movieReviews();
             
           ?>
       </div>
       <br/>
       <hr>
       <h1>Based on ratings you should watch:</h1>
       <?php
            echo "<div class='poster'>";
            $activePosters[$highestPos] = ucwords(str_replace("_", " ", $activePosters[$highestPos]));
            echo "<h2> $activePosters[$highestPos] </h2>";
            $activePosters[$highestPos] = strtolower(str_replace(" ", "_", $activePosters[$highestPos]));
            echo "<img width='100' src='img/posters/$activePosters[$highestPos].jpg'>";    
            echo "<br>";
       ?>
    </body>
</html>