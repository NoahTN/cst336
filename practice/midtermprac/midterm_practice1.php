<?php include 'functions.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Winner Vacation Planner</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <header>Winter Vacation Planner!</header>
        <form action="midterm_practice1.php">
            <label for="month">Select month:</label>
            <select id="month" name="month">
                <option value="">Select</option>
                <option>November</option>
                <option>December</option>
                <option>January</option>
                <option>February</option>
            </select>
            
            <br><br>
            <label>Number of locations: </label>
            <input class="rad" type="radio" name ="locNum" value="3" id="3">
            <label for="3">Three</label>
            <input class="rad" type="radio" name ="locNum" value="4" id="4">
            <label for="4">Four</label>
            <input class="rad" type="radio" name ="locNum" value="5" id="5">
            <label for="5">Five</label>
            <br><br>
             
            <label for="country">Select country:</label>
            <select id="country" name="country">
                <option>USA</option>
                <option>Mexico</option>
                <option>France</option>
            </select>
            <br><br>
            
            <label>Visit locations in alphabetical order: </label>
            <input class="rad" type="radio" name ="order" value="ascend" id="ascend">
            <label for="descend">A-Z</label>
            <input class="rad" type="radio" name ="order" value="descend" id="descend">
            <label for="ascend">Z-A</label>
            <br><br>
            
            <input type="submit" name="submitted" value="Create Itinerary" />
        </form>
        <br><br>
        <?php
            if(isset($_GET['submitted'])) {
                if(!empty($_GET['month']) && !empty($_GET['locNum'])) {
                    
                    printItinerary();
                    setLocations();
                    assignDates();
                    createCalendar();
                    printStored();
                }
                if(empty($_GET['month']))
                    echo "<div class='bad'>You forgot the month!</div>";
                if(empty($_GET['locNum']))
                    echo "<div class='bad'>You forgot the number of locations!</div>";
            }
        ?>
    </body>
</html>