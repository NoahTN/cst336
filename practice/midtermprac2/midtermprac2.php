<?php
    include 'functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Reports</title>
    </head>
    <body>
        <?php
            getTownsBoundBy(50000, 80000);
            getOrderedTowns();
            getLeastPopulated();
            getByLetter("S");
            getRandom();
        ?>
    </body>
</html>