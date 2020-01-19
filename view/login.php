<?php
session_start();

require '../core/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['email'])) {
        $users->show_login_user($_POST);
    } else {
        echo 'You are currently logged in';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Libraby</title>
        <!--style-->
        <link rel="stylesheet" href="../assets/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="../assets/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/styles.css">
        <!--script-->
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/my-js.js"></script>
    </head>
    <body class="text-center">
        <form class="form-signin col-lg-4 offset-lg-4" method="post" action="login.php">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="Email" class="sr-only mb-3">Email</label>
            <input type="text" id="email" class="form-control mb-3" placeholder="Email" name="email" required autofocus>
            <label for="Password" class="sr-only mb-3">Password</label>
            <input type="password" id="password" class="form-control  mb-3" placeholder="Password" name="password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
        </form>
    </body>

</html>