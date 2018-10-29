

<?php
    // connect to our mysql database server
    
    function getDatabaseConnection() {
        if($_SERVER['SERVER_NAME']=="ntn-336-noahtolentinonguyen.c9users.io") {
            $host = "localhost";
            $username = "noahtolentino";
            $password = "i am a Perfect 6";
            $dbname = "memes_v2"; 
        }
        else {
            $host = "us-cdbr-iron-east-01.cleardb.net";
            $username = "b00cd32a10cfc9";
            $password = "3f88949a";
            $dbname = "Memebase"; 
        }
        // Create connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        return $dbConn; 
    }
    

   
?>

