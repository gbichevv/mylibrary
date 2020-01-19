<?php
include '../core/books_router.php';
//$books->add_favorites($book_id, $user_id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Libraby</title>
        <!--style-->

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
                    <?php
                    session_start();
                    if (isset($_SESSION['user']))
                        echo '<p>Hello ' . $_SESSION['user'] . '<br> You have logged in successfully</p>'
                        ?>
                    <a href="<?php session_destroy(); ?>" class="" type="submit">LogOut</a>
                </div>
            </div>
        </header>
        <?php foreach ($books->list_books() as $book): ?>
            <div class="card text-center">
                <h1 class="h3 mb-3 font-weight-normal">View Book</h1>
                <img src="../assets/images/theStand.jpg" width="200" class="text-center">

                <a href="view_book.php?book_id=<?php echo $book['id']; ?>"><h2><?php echo $book['name']; ?></h2></a>
                <p><?php echo $book['year']; ?></p>
                <p><?php echo $book['description']; ?></p>
            </div>
            <div class="col-lg-12 text-center">
                <div class="col-lg-4 offset-lg-4">
                    <a href="edit_book.php?book_id=<?php echo $book['id']; ?>" class="btn btn-lg btn-primary btn-block" type="submit">Edit Book</a>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="col-lg-12 text-center">
            <div class="col-lg-4 offset-lg-4">
                <form action="" method="POST" >
                    <button class="btn btn-lg" type="submit"><i class="fas fa-3x fa-heart text-danger"></i></button>
                </form>
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <div class="col-lg-4 offset-lg-4">
                <a href="create_book.php" class="btn btn-lg btn-primary btn-block" type="submit">Add Book</a>
            </div>
        </div>

        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </body>

</html>