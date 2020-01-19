<?php
session_start();

require 'core/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user'])) {
        $users->showLoginUser($_POST);
    } else {
        echo 'You are currently logged in';
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!--<link rel="stylesheet" type="text/css" href="css/style.css" >-->
        <title>Добави новина</title>
    </head>
    <body>
        <div id="container">

            <form method="post" action="login.php">

                <h4>Email:</h4>
                <input type="text" name="email" value=""/><br />

                <h4>Парола:</h4>
                <input type="text" name="password" value=""/>
                <br><br>
                <input type="submit" name="register" value="LogIn"/>
            </form>
        </div>
    </body>
</html>
