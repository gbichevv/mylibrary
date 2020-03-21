
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Libraby</title>
        <!--style-->
        <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
        <header class="card-header">
            <div class="text-right">
                <div class="col-12 text-right">
                    <a href="home.php" >Home</a>
                    <?php
                    if (isset($_SESSION['user'])):
                        echo '<p>Hello ' . $_SESSION['user'] . '</p>';
                        ?>
                        <a href="create_book.php" class="btn btn-success" type="submit">Add Book</a>
                        <a href="logout.php" class="btn btn-primary" type="submit">LogOut</a>
                    <?php else: ?>
                        <a href="register.php" class="btn btn-primary" type="submit">Register</a>
                        <a href="login.php" class="btn btn-primary" type="submit">LogIn</a>
                    <?php endif; ?>

                </div>
            </div>
        </header>