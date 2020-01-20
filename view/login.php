<?php

require '../core/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['email'])) {
        $users->show_login_user($_POST);
    } else {
        echo 'You are currently logged in';
    }
}
require_once 'header/header.php'; ?>
    <body class="text-center">
        <form class="form-signin col-lg-4 offset-lg-4" method="post" action="login.php">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="Email" class="sr-only mb-3">Email</label>
            <input type="text" id="email" class="form-control mb-3" placeholder="Email" name="email" required autofocus>
            <label for="Password" class="sr-only mb-3">Password</label>
            <input type="password" id="password" class="form-control  mb-3" placeholder="Password" name="password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
   <?php require_once 'footer/footer.php';