<?php
    include 'database.php';
    
    function getUrl($memeType) {
        if($memeType=='old-class')
            $memeUrl = 'https://upload.wikimedia.org/wikipedia/commons/4/47/StateLibQld_1_100348.jpg';
        else if($memeType=='college-grad')
            $memeUrl = 'https://upload.wikimedia.org/wikipedia/commons/c/ca/LinusPaulingGraduation1922.jpg';
        else if($memeType=='thinking-ape')
            $memeUrl = 'https://upload.wikimedia.org/wikipedia/commons/f/ff/Deep_in_thought.jpg';
        else if($memeType=='coding')
            $memeUrl = 'https://upload.wikimedia.org/wikipedia/commons/b/b9/Typing_computer_screen_reflection.jpg';
        
        return $memeUrl;
    }
    
    function createMeme($line1, $line2, $memeType) {
        
        $dbConn = getDatabaseConnection(); 
    
        $sql = "INSERT INTO `all_memes` (`id`, `top_line`, `bot_line`, `meme_type`, `meme_url`, `create_date`) VALUES (NULL, '$line1', '$line2', '$memeType', '" . getUrl($memeType) . "', NOW());"; 
        $statement = $dbConn->prepare($sql); 
        $statement->execute(); 
        $last_id = $dbConn->lastInsertId();
        
        $sql = "SELECT * from all_memes WHERE id = $last_id"; 
        $statement = $dbConn->prepare($sql); 
        
        $statement->execute(); 
        $records = $statement->fetchAll(); 
        $newMeme = $records[0];
        return $newMeme;
        
    }
    
    function displayMemes() {
        $dbConn = getDatabaseConnection();
        
        $sql = "SELECT * from all_memes WHERE '1'";
        
        if(!empty($_POST['search-cat']))
            $sql .= 'AND meme_type = "' . $_POST['search-cat'] . '"';

        if(!empty($_POST['search']))
            $sql .= "AND (top_line LIKE '%{$_POST['search']}%' OR bot_line LIKE '%{$_POST['search']}%')";
            
        if(isset($_POST['sortBy'])) {
            if($_POST['sortBy'] == 'newest')
                $sql .= " ORDER BY `create_date` DESC";
            else
                $sql .= " ORDER BY `create_date` ASC";
        }
            
        
        
        $statement = $dbConn->prepare($sql); 
        $statement->execute(); 
        $records = $statement->fetchAll(); 
        
        foreach ($records as $record) {
             echo '<div id="meme-div" style="background-size: cover; margin: 10px;  display: inline-block; width: 250px; height: 250px; 
                        background-image:url(' .  $record['meme_url'] . ');">';
                 echo '<h2 id="line1" style="font-size: 22px; margin-top: 5px"">'. $record["top_line"] .'</h2>';
                 echo '<h2 id="line2" style="font-size: 22px; margin-bottom: 5px">'. $record["bot_line"] .'</h2>';
             echo '</div>';
        }
    } 
    
    if (isset($_POST['line1']) && isset($_POST['line2']))
        $memeObj = createMeme($_POST['line1'], $_POST['line2'], $_POST['meme-type']);


?>


<!DOCTYPE html>
<html>
  <head>
    <title>A Meme</title>
    <style>
      #meme-div{
      width: 450px;
      height: 450px;
      background-size: 100%;
      text-align: center;
      position: relative;
      }
      h2 {
        position: absolute;
        left: 0;
        right: 0;
        margin: 15px 0;
        padding: 0 5px;
        font-family: impact;
        color: white;
        text-shadow: 1px 1px black;
      }
      #line1 {
         top: 0;
       }
      #line2 {
         bottom: 0;
       }
    </style>
  </head>
  <body>
     <?php
        if($memeObj) {
            echo "<h1>Your Meme</h1>";
            echo '<div id="meme-div" style="background-size: cover; background-image:url(' . getUrl($_POST['meme-type']) . ');">';
                echo '<h2 id="line1">' . $_POST['line1'] . '</h2>';
                echo '<h2 id="line2">' . $_POST['line2'] . '</h2>';
            echo '</div>';
        }
     ?>
    <h1>All Memes</h1>
    <form method="post" action="meme.php">
        Search: <input type="text" name="search"></input>
        Meme type: <select name="search-cat">
            <option value=""></option>
            <option value="college-grad">Happy College Grad</option>
            <option value="thinking-ape">Deep Thought Monkey</option>
            <option value="coding">Learning to Code</option>
            <option value="old-class">Old Classroom</option>
        </select>
        <br>
        <input type="radio" name="sortBy" value="newest">Newest first
        <input type="radio" name="sortBy" value="oldest">Oldest first
        <br>
        <input type="submit"></input>

    </form>
    <?=displayMemes()?>
  </body>
</html>