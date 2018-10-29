<?php
  include 'database.php';
  $dbConn = getDatabaseConnection(); 
  $sql = "SELECT * FROM all_memes ORDER BY RAND() LIMIT 1;"; 
  $statement = $dbConn->prepare($sql); 
  $statement->execute(); 
  $records = $statement->fetchAll(); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Welcome</title>
    <style>
      @import "css/styles.css";
    </style>
  </head>
  <body>
    <h1>Meme Generator</h1>
    <?php
        foreach ($records as $record) {
          echo '<div id="meme-div" style="background-size: cover; margin: 10px;  display: inline-block; width: 250px; height: 250px; 
                  background-image:url(' .  $record['meme_url'] . ');">';
          echo '<h2 id="line1" style="font-size: 22px; margin-top: 5px"">'. $record["top_line"] .'</h2>';
          echo '<h2 id="line2" style="font-size: 22px; margin-bottom: 5px">'. $record["bot_line"] .'</h2>';
          echo '</div>';
    }
    ?>
    <h3>Welcome to my Meme Generator!</h3>
    
    <form method="post" action="meme.php">
        Line 1: <input type="text" name="line1"></input> <br/>
        Line 2: <input type="text" name="line2"></input> <br/>
        Meme Type:
        <select name="meme-type">
          <option value="college-grad">Happy College Grad</option>
          <option value="thinking-ape">Deep Thought Monkey</option>
          <option value="coding">Learning to Code</option>
          <option value="old-class">Old Classroom</option>
        </select>
        <input type="submit"></input>
    </form>
    <a href="meme.php">View all memes</a>
  </body>
</html>