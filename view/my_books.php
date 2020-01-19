<?php
include '../core/books_router.php';
//$books->show_favorites($user_id);
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
    <body class="text-left">
        <header>
            <div class="text-right">
                <div class="col-12 text-right">
                    <p>User</p>
                    <a href="#" class="" type="submit">LogOut</a>
                </div>
            </div>
        </header>
        <div class="card">
            <h1 class="h3 mb-3 font-weight-normal">View Book</h1>
            <img src="../../assets/images/theStand.jpg" width="200">
            <h2>The Stand</h2>
            <p>1992</p>
            <p>Description</p>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Add Book</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </body>

</html>