<?php
    include 'database.php';
    
    function getQuote() {
        $dbConn = getDatabaseConnection();
        $sql = "SELECT * FROM q_quotes ORDER BY RAND() LIMIT 1;"; 
        $statement = $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchAll();
        echo "<br>";
        echo "<h1>" . $records[0]['quote'] . "</h1>";
        echo "<p>-" . $records[0]['author'] . "</p>";
    }
    
        
    function storeToDatabase() {
        $dbConn = getDatabaseConnection();
        $sql = "INSERT INTO `q_quotes` (`quoteId`, `quote`, `author`, `num_likes`) VALUES 
                                       (NULL, '". $_POST['text'] ."', '". $_POST['author'] ."', '". rand(0,200) ."');"; 
        echo $sql;
        $statement = $dbConn->prepare($sql); 
        $statement->execute(); 
    }
?>