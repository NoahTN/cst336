<?php
include 'database.php';
function createMeme($line1, $line2, $memeType) {
    // look up category id
    
    // construct the proper SQL INSERT statement
    $dbConn = getDatabaseConnection(); 
    $sql = "";
    $statement = $dbConn->prepare($sql); 
    $result = $statement->execute(); 
    
    if (!$result) {
      return null; 
    }
    
    $last_id = $dbConn->lastInsertId();
    
    // fetch the newly created object from database
    
    $sql = "SELECT * from all_memes WHERE id = $last_id"; 
    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    $newMeme = $records[0]; 
    
    return $newMeme; 
    
}
function displayMemes() {
    $dbConn = getDatabaseConnection(); 
    
    //$sql = "SELECT * from all_memes WHERE 1";
    $sql = "SELECT all_memes.id, all_memes.line1, all_memes.lin2, categories.meme_url
            FROM all_memes
            INNER JOIN categories
            ON all_memes.category_id = categories.category_id";
    
    if(isset($_POST['search'])) {
      // query the databse for any records that match this search
      $sql .= " AND (line1 LIKE '%{$_POST['search']}%' OR line2 LIKE '%{$_POST['search']}%')";
    } 
    
    if(isset($_POST['meme-type']) && !empty($_POST['meme-type'])) {
      $sql .= " AND meme_type = '{$_POST['meme-type']}'"; 
    }
    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    
    foreach ($records as $record) {
       $memeURL = $record['meme_url']; 
       echo  '<div class="meme-div" style="background-image:url('. $memeURL .')">'; 
       echo  '<h2 class="line1">' . $record["line1"] . '</h2>'; 
       echo  '<h2 class="line2">' . $record["line2"] . '</h2>'; 
       echo  '</div>'; 
    }
} 
if (isset($_POST['line1']) && isset($_POST['line2'])) {
  $memeObj = createMeme($_POST['line1'], $_POST['line2'], $_POST['meme-type']); 
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>A Meme</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <?php if ($memeObj) {  ?>
      <h1>Your Meme</h1>
      <!--The image needs to be rendered for each new meme
      so set the div's background-image property inline -->
      <div class="meme-div" style="background-image:url(<?= $memeObj['meme_url']; ?>)">
        <h2 class="line1"> <?=  $memeObj['line1'] ?> </h2>
        <h2 class="line2"> <?=  $memeObj['line2'] ?> </h2>
      </div>
    <?php } ?>
    
    <h1>All memes</h1>
    <form method="post" action="meme.php">
        Search:  <input type="text" name="search"></input> 
        Meme type: <select name="meme-type">
          <option value=""></option>
          <option value="college-grad">Happy College Grad</option>
          <option value="thinking-ape">Deep Thought Monkey</option>
          <option value="coding">Learning to Code</option>
          <option value="old-class">Old Classroom</option>
        </select> <br/>
        ORDER: 
        <input type="radio"  name="order" value="newest-first"> Newest first
        <input type="radio"  name="order" value="oldest-first"> Oldest first
        <br/>
        <input type="submit"></input>
    </form>
    <div class="memes-container">
      <?php displayMemes(); ?>
      <div style="clear:both"></div>
    </div>
    
  </body>
</html>