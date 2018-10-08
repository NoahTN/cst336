<!DOCTYPE html>
<html>
    <head>
        <title>Flyer Generator</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    
    <body>
        <header> Flyer Generator</header>
        <form action="save.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" id = "name" placeholder="Enter name here"/><br>
            <br>
            
            <label for="address">Make a statement:</label><br>
            <textarea id="address" name="addresstext"></textarea><br>
            <br>
            
            <label for="picselect">Select an avatar:</label><br>
            <select id="picselect" name="picture">
                <option>Dog</option>
                <option>Cat</option>
                <option>Frog</option>
                <option>Otter</option>
            </select>
            <br>
            
            <fieldset class = "bgbox">
                <legend>Pick a background color</legend>
                <input class="rad" type="radio" name ="bgcolor" value="blue" id="blue" checked="checked">
                <label for="blue">Blue</label><br>
                <input class="rad" type="radio" name ="bgcolor" value="red" id="red">
                <label for="red">Red</label><br>
                <input class="rad" type="radio" name ="bgcolor" value="green" id="green">
                <label for="green">Green</label><br>
                <input class="rad" type="radio" name ="bgcolor" value="yellow" id="yellow">
                <label for="yellow">Yellow</label><br>
            </fieldset>
           <br>
           
           <fieldset>
                <legend>Extra Modifiers:</legend>
                <input id="grayscale" type="checkbox" name="grayscale">
                <label for="grayscale">Make Grayscale</label><br>
                <input id="cutedog" type="checkbox" name="cutedog">
                <label for="cutedog">Add Cute Dog</label><br>
                <input id="snoop" type="checkbox" name="snoop">
                <label for="snoop">Add Snoop Dogg</label><br>
            </fieldset>
            <br>
            
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>