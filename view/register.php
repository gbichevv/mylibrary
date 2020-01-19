<?php
session_start();

require '../core/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($users->check_post_data($_POST)) {

        if ($users->is_valid_form($_POST)) {

            if ($users->show_email_exist($_POST['email'])) {
                // call insert method
                $users->registration_user($_POST);
            }
        }
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
        <form class="form-signin col-lg-4 offset-lg-4" method="post" action="register.php">
            <h1 class="h3 mb-3 font-weight-normal">Register form</h1>
            <label for="FirstName" class="sr-only mb-3">First Name</label>
            <input type="text" id="firstname" class="form-control mb-3" placeholder="First Name" name="firstname" required autofocus>
            <label for="LastName" class="sr-only mb-3">Last Name</label>
            <input type="text" id="lastname" class="form-control mb-3" placeholder="Last Name" name="lastname" required autofocus>
            <label for="Username" class="sr-only mb-3">Username</label>
            <input type="text" id="username" class="form-control mb-3" placeholder="Username" name="username" required autofocus>
            <label for="Email" class="sr-only mb-3">Email</label>
            <input type="text" id="email" class="form-control mb-3" placeholder="Email" name="email" required autofocus>
            <label for="Password" class="sr-only mb-3">Password</label>
            <input type="password" id="password" class="form-control  mb-3" placeholder="Password" name="password" required>
            <label for="Password" class="sr-only mb-3">Confirm Password</label>
            <input type="password" id="password" class="form-control  mb-3" placeholder="Confirm Password" name="password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
        </form>
    </body>

</html>