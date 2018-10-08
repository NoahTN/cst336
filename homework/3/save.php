<!DOCTYPE html>
<html>
    <head>
        <title>Bookmark Generator</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    
    <body>
        
        <div class="flyer <?=$_POST['bgcolor']?> <?= (!empty($_POST['grayscale']) ? "grayscale" : "")?> ">
            <img src="img/<?=$_POST['picture']?>.png" alt="<?=$_POST['picture']?>" width=200px height=200px/>
            <h1><?=$_POST['name']?></h1>
            <p><?= !empty($_POST["addresstext"]) ? '"' . $_POST["addresstext"] . '"': "" ?></p>
            <?php 
                if(!empty($_POST['cutedog']))
                    echo "<img src='img/cute dog.png' alt='Cute Dog' height= 150px style='border: none'/>";
                echo "<br>";
                if(!empty($_POST['snoop']))
                    echo "<img src='img/snoop.gif' alt='Snoop Dogg' height= 150px style='border: none'/>";
            ?>
        </div>
        
        <form action="save.php" method="POST" style="margin-top: 50px; margin-left: 50px">
            <label for="name">Name:</label>
            <input type="text" name="name" id = "name" placeholder="Enter name here" value="<?=$_POST['name']?>" required><br>
            <br>
            
            <label for="address">Make a statement:</label><br>
            <textarea id="address" name="addresstext" required><?=$_POST["addresstext"]?></textarea><br>
            <br>
            
            <label for="picselect">Select an avatar:</label><br>
            <select id="picselect" name="picture">
                <option <?= ($_POST['picture'] == "Dog" ? "selected='selected'" : "")?>>Dog</option>
                <option <?= ($_POST['picture'] == "Cat" ? "selected='selected'" : "")?>>Cat</option>
                <option <?= ($_POST['picture'] == "Frog" ? "selected='selected'" : "")?>>Frog</option>
                <option <?= ($_POST['picture'] == "Otter" ? "selected='selected'" : "")?>>Otter</option>
            </select>
            <br>
            
            <fieldset class = "bgbox">
                <legend>Pick a background color</legend>
                <input class="rad" type="radio" name ="bgcolor" value="blue" id="blue" <?= ($_POST['bgcolor'] == "blue" ? "checked='checked'" : "")?>>
                <label for="blue">Blue</label><br>
                <input class="rad" type="radio" name ="bgcolor" value="red" id="red" <?= ($_POST['bgcolor'] == "red" ? "checked='checked'" : "")?>>
                <label for="red">Red</label><br>
                <input class="rad" type="radio" name ="bgcolor" value="green" id="green" <?= ($_POST['bgcolor'] == "green" ? "checked='checked'" : "")?>>
                <label for="green">Green</label><br>
                <input class="rad" type="radio" name ="bgcolor" value="yellow" id="yellow" <?= ($_POST['bgcolor'] == "yellow" ? "checked='checked'" : "")?>>
                <label for="yellow">Yellow</label><br>
            </fieldset>
           <br>
           
           <fieldset>
                <legend>Extra Modifiers:</legend>
                <input id="grayscale" type="checkbox" name="grayscale" <?= (!empty($_POST['grayscale']) ? "checked='checked'" : "")?>>
                <label for="grayscale">Make Grayscale</label><br>
                <input id="cutedog" type="checkbox" name="cutedog" <?= (!empty($_POST['cutedog']) ? "checked='checked'" : "")?>>
                <label for="cutedog">Add Cute Dog</label><br>
                <input id="snoop" type="checkbox" name="snoop" <?= (!empty($_POST['snoop']) ? "checked='checked'" : "")?>>
                <label for="snoop">Add Snoop Dogg</label><br>
            </fieldset>
            <br>
            
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>