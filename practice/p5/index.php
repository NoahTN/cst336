<?php
    session_start();
    $passwords = array();
    function makePasswords() {
        global $passwords;
        $digCount = 0;
        for($i = 0; $i < intval($_POST['passNum']); $i++) {
            $password = "";
            $digCount = 0;
            for($j = 0; $j < intval($_POST['passLen']); $j++) {
                $randVal = rand(0, 1);
                $randChar = "";
                if(!empty($_POST['incDigits']) && $randVal == 1 && $digCount < 3 && $j != 0) {
                    $randChar = chr(rand(48, 57));
                    $digCount++;
                }else {
                    $randChar = chr(rand(69, 90));
                }
                $password = $password.$randChar;
            }
            $passwords[] = $password;
            $_SESSION['passes'][] = $password;
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Custom Password generator</title>
        <style>@import url("css/styles.css");</style>
    </head>
    
    <body>
        <div class= "body">
            <header>Custom Password Generator</header>
            <br>
            <form action="index.php" method="POST">
                <label for="passNum">How many passwords?</label>
                <input type="number" name="passNum" id = "numPass" required>
                (No more than 8)<br>
                <h2>Password Length</h2>
                <input class="rad" type="radio" name ="passLen" value="6" id="passLen" required>
                <label for="passLen">6 Characters</label>
                <input class="rad" type="radio" name ="passLen" value="8" id="passLen">
                <label for="passLen">8 Characters</label>
                <input class="rad" type="radio" name ="passLen" value="10" id="passLen">
                <label for="passLen">10 Characters</label>
                <br><br>
                <input type="checkbox" name="incDigits" id="incDigits">
                <label for="incDigits">Include digits (up to 3 digits will be part of the password)</label>
                <br><br>
                <input type="submit" value="Create Passwords!">
            </form>
            <br>
            <div class ="pass">
            <?php
                if(isset($_POST)){
                    if(intval($_POST["passNum"]) > 8 || intval($_POST["passNum"]) <= 0)
                        echo "Invalid number of generated passwords! You complete fool!";
                    else {
                        makePasswords();
                        sort($passwords);
                        for($i = 0 ; $i < count($passwords); $i++) {
                           echo $passwords[$i];
                           echo "<br>";
                        }
                    }
                }
            
            ?>
            </div>
            <form action="history.php" method="POST">
                <br>
                <input type="submit" value="Display Password History">
            </form>
        </div>
    </body>
</html>