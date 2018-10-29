<!DOCTYPE html>
<html>
    <head>
        <title>CST 336 Midterm Create</title>
        <style>
            @import 'css/styles.css';
        </style>
    </head>
    
    <body>
        <h1>Create a new quote:</h1>
        
        <?php
            include 'functions.php';
            if(isset($_POST[posted])) {
                echo "<ul>";
                if(empty($_POST['text']))
                    echo "<li>Text must not be empty</li>";
                if(empty($_POST['author']))
                    echo "<li>Author must not be empty</li>";
                echo "</ul>";
                if(!empty($_POST['text']) && !empty($_POST['author'])) {
                    storeToDatabase();
                    header('Location: cst336_midterm.php');
                }
            }
        ?>
        
        <form action="create.php" method="POST">
            <label for="text">Text:</label>
            <input type="text" name="text" id = "text">
            <br><br>
            <label for="author">Author:</label>
            <input type="text" name="author" id = "author">
            <br><br>
            <input type="submit" name="posted">
        </form>
    </body>
</html>