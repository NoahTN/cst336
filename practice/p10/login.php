<?php
    if(($_POST['username']=="user_1" || $_POST['username']=="user_2") && $_POST['password']=="secret") {
        session_start();
        $_SESSION['username'] = $_POST['username'];
        if($_POST['username']=="user_1")
            $_SESSION['userId'] = 0;
        else
            $_SESSION['userId'] = 1;
        header('Location: quiz.php');
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body style="text-align: center">
        <h1>Login</h1>
        <h2>Credentials required before submiting form.</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" name="submit" value="Login">
        </form>
    </body>
</html>