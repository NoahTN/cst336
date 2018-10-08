<!DOCTYPE html>
<html>
    <head>
        <title>Sessions Practice</title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <div>
            Guess the number (between 1 and 100)
            <br><br>
            <form action = "index.php" method="POST">
              
                <label for="guess">Your guess:</label>
                <input type="text" name="guess" id = "guess"/>
                <input type="submit" value = "Submit">
                <br><br>
                <?php 
                    session_start();
                    
                    if(isset($_POST["destroy"])) {
                        session_destroy();
                        session_start(); 
                    }
                        
                    if(!isset($_SESSION['num'])) {
                        $_SESSION['num'] = rand(1, 100);
                    }
                    
                    if(!empty($_POST['guess']))  {
                        if(intval($_POST['guess']) == $_SESSION['num']) {
                            echo "<div class='win'>HOORAY</div>";
                            echo "<br><br>";
                        }
                        else if(intval($_POST['guess']) < $_SESSION['num']) {
                            echo "<div class='low'>TOO LOW</div>";
                            echo "<br><br>";
                        }
                        else {
                            echo "<div class='high'>TOO HIGH</div>";
                            echo "<br><br>";
                        }
                        $_SESSION['prev'][] = $_POST['guess'];
                    }
                    $attempts = 0;
                    echo "Previous guesses: ";
                    for($i = 0; $i < count($_SESSION['prev']); $i++) {
                        $attempts++;
                        echo $_SESSION['prev'][$i];
                        if($i < count($_SESSION['prev'])-1)
                            echo ", ";
                    }
                    echo "<br><br>";
                    echo "Number of attempts: $attempts";
                    echo "<br><br>";
                ?>
                <input type="Submit" name="destroy" value="Start Over">
            </form>
           
            
        </div>
         
    </body>
</html>