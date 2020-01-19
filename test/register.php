<?php
session_start();

require 'core/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($users->mungePostlData($_POST)) {

        if ($users->isValidForm($_POST)) {

            if ($users->showMailExist($_POST['email'])) {
                // call insert method
                $users->userRegistration($_POST);
            }
        }
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

            <form method="post" action="register.php">
                <h4>Потребителско име:</h4>
                <input type="text" name="username" value="" >
                <h4>Парола:</h4>
                <input type="text" name="password" value=""/>
                <h4>Email:</h4>
                <input type="text" name="email" value=""/>
                <br><br>
                <input type="submit" name="register" value="Регистрация" />
            </form>
        </div>
    </body>
</html>