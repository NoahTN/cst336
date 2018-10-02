<!DOCTYPE html>
<html>
    <head>
        <title>Aces vs. Kings</title>
         <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <header>Aces vs. Kings</header>
        <form action="save.php">
             <label for="rows">Number of Rows: </label> 
             <input type="text" name="rows"/>
             <br>
             <label for="cols">Number of Columns: </label> 
             <input type="text" name="cols"/>
             <br>
             <label for="category">Suit to omit: </label>
             <select name="category">
                <option value="clubs">Clubs</option>
                <option value="diamonds">Diamonds</option>
                <option value="hearts">Hearts</option>
                <option value="spades">Spades</option>
             </select>
             
             <input type="submit" value="Submit" />
        </form>
        
        <?php
            
        ?>
    </body>
</html>