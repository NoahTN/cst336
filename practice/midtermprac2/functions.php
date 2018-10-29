<?php
    include 'database.php';
    
    function getTownsBoundBy($min, $max) {
        $dbConn = getDatabaseConnection(); 
        $sql = "SELECT * from mp_town WHERE population >= '$min' AND population <= '$max'";
        $statement = $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchAll();
        foreach($records as $record) {
            echo $record['town_name'] . ' - ' . $record['population'];
            echo "<br>";
        }
        echo "<br>";
    }
    
    function getOrderedTowns() {
        $dbConn = getDatabaseConnection(); 
        $sql = "SELECT * FROM mp_town ORDER BY population DESC";
        $statement = $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchAll();
        echo "<table>";
         foreach($records as $record) {
             echo "<tr>";
            echo "<td>". $record['town_name'] ."</td>". "<td>". $record['population'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br>";
    }
    
    function getLeastPopulated() {
        $dbConn = getDatabaseConnection(); 
        $sql = "SELECT * FROM mp_town ORDER BY population ASC LIMIT 3";
        $statement = $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchAll();
         foreach($records as $record) {
            echo $record['town_name'] . ' - ' . $record['population'];
            echo "<br>";
        }
        echo "<br>";
    }
    
    function getByLetter($letter) {
        $dbConn = getDatabaseConnection(); 
        $sql = "SELECT * FROM mp_county WHERE county_name LIKE 'S%'";
        $statement = $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchAll();
         foreach($records as $record) {
                echo $record['county_name'];
                echo "<br>";
            
        }
        echo "<br>";
    }
    
    function getRandom() {
        $dbConn = getDatabaseConnection(); 
        $sql = "SELECT * FROM mp_town ORDER BY RAND() LIMIT 1;"; 
        $statement = $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchAll();
        echo "<br>";
        echo $records[0]['town_name'];
    }

?>