<?php

include_once '../core/autoload.php';

if ($_SESSION) {
    $users->show_user($_SESSION);
}
require_once 'header/header.php'; ?>
    <body class="text-center">
        <form class="form-signin col-lg-4 offset-lg-4" method="post" action="register.php">
            <h1 class="h3 mb-3 font-weight-normal">Edit user</h1>
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
        </form>
  <?php require_once 'footer/footer.php';