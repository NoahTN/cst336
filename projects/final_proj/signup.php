<?php
    include "db/database.php";
    $ret = array();
    $dbConn = getDatabaseConnection();
    
    // Check if username exists already
    // Also should check if username / password aren't empty
    $sql = "SELECT * FROM users WHERE username = '".$_GET["sentUsername"] ."'";
    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    $records = $statement->fetchAll();
    if(count($records) == 0) {
      $ret["success"] = true;
      $sql = "INSERT INTO users (userID, username, password) 
              VALUES (NULL, '". $_GET["sentUsername"] ."', '".sha1($_GET["sentPassword"])."')";
      
      $statement = $dbConn->prepare($sql); 
      $statement->execute(); 
    }
    echo json_encode($ret);  
        
    
?>