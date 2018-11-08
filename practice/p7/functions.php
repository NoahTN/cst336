<?php
    include 'database.php';
  function echoCategoryMenu() {
        $dbConn = getDatabaseConnection();
        
        $sql = "SELECT DISTINCT category FROM p1_quotes";
    
        $statement = $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchAll(); 
        echo '<select id="category" name="category">';
        $string = "";
        if($_GET['category'] == "Select One")
            $string = " selected";
        echo "<option $string>Select One</option>";
        $string = "";
        foreach ($records as $record) {
            if($record['category'] == $_GET['category'])
                $string = " selected";
             echo "<option $string>" . $record['category'] . "</option>";
             $string = "";
        }
        echo '</select>';
  }

  function displayQuotes() {
        $dbConn = getDatabaseConnection();
       
        
        $sql = "SELECT * from p1_quotes WHERE ";
        if(!empty($_GET['category']))
            $sql .= 'quote LIKE "%' . $_GET['keyword'] . '%"';
        else
            $sql .= "1";
        
        if(!empty($_GET['category'])) {
            if($_GET['category'] != "Select One")
                $sql .= ' AND category = :category';
            $namedParameters[':category'] = $_GET['category'];
        }
        
        if($_GET['order'] == 'ascend')
            $sql .= " ORDER BY quote ASC";
        else if($_GET['order'] == 'descend')
            $sql .= " ORDER BY quote DESC";
      
        $statement = $dbConn->prepare($sql); 
        $statement->execute($namedParameters); 
        $records = $statement->fetchAll(); 
        
        foreach ($records as $record) {
             echo "<p>";
             echo $record['quote'] . " (<i>" . $record['author'] . "</i>)";
             echo "</p>";
        }
    } 
?>

