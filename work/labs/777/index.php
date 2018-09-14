<?php
include "inc/functions.php"
?>

<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body>
        <?php
        
        for($i=1; $i<4; $i++) {
            ${"randomValue" . $i} = rand(0,2);
            displaysymbol(${"randomValue" . $i});
        }
       
        
        ?>
    </body>
</html>