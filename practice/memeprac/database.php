

<?php

    include '../../../hype.php';
    // connect to our mysql database server
    
    function getDatabaseConnection() {
        $host = "localhost";
        $username = "noahtolentino";
        $password = "i am a Perfect 6";
        $dbname = "Memebase"; 
        
        // Create connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        return $dbConn; 
    }
    

   
?>

