<?php
    include "database.php";
    
    function getData() {
        $ret = array();
        $dbConn = getDatabaseConnection();
        $sql = "SELECT * FROM `pets` WHERE `name` = '" . $_GET['name'] . "'";
        $statement = $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchAll(); 
        
        $ret["age"] = 2018 - intval($records[0]['yob']);
        $ret["breed"] = $records[0]["breed"];
        $ret["desc"] = $records[0]["description"];
        $ret["img"] = "img/" . $records[0]["pictureURL"];
        
        return $ret;
           
    }
    
    echo json_encode(getData());
    
?>

