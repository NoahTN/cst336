<?php
    include 'functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Quote Thing</title>
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <style>
            body {
                text-align: center;
                font-size: 2em;
            }
            #quotes{
                width:600px;
                margin:0 auto;
                text-align: left;
            }
        </style>
    </head>
    
    <body>
        <form>
            <div class="jumbotron">
                <h1>Famous Quote Finder</h1>
            </div>
            <label for="keyword">Enter Quote Keyword:</label>
            <input type="text" name="keyword" id = "keyword" value=<?=$_GET['keyword']?>>
            <br><br>
            <label for="category">Category:</label>
            <?php
                echoCategoryMenu();
            ?>
            <br><br>
            Order
            <br>
            <input class="rad" type="radio" name ="order" value="ascend" id="ascend" <?= ($_GET['order'] == "ascend" ? "checked='checked'" : "")?>>
            <label for="descend">A-Z</label>
            <br>
            <input class="rad" type="radio" name ="order" value="descend" id="descend" <?= ($_GET['order'] == "descend" ? "checked='checked'" : "")?>>
            <label for="ascend">Z-A</label>
            <br><br>
            <input type="submit" value="Display quotes!"/>
            <?php 
                displayQuotes();
            ?>
        </form>
    </body>
</html>