<?php 
include "database.php";
    function getScores(){
        $dbConn = getDatabaseConnection();
        $sql = "SELECT COUNT(*) , sum(score) FROM p10_scores WHERE userId='".$_SESSION['userId'] ."'";
        $statement = $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchAll(); 
        
        $arr = array();
        $arr ["times"] = $records[0]["COUNT(*)"];
        $arr ["average"] = intval($records[0]['sum(score)']) / intval($records[0]["COUNT(*)"]);
        return $arr;
    }
    function submitScore(){
        session_start();
        $dbConn = getDatabaseConnection();
        $sql = "INSERT INTO `p10_scores` (`id`, `userId`, `score`) VALUES 
                                         ('null' ,'" . $_SESSION['userId'] . "', '" . $_POST["score"] . "')";
        $statement = $dbConn->prepare($sql); 
        $statement->execute(); 
        
    }
    submitScore();
    echo json_encode(getScores());
?>