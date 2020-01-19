<?php
include '../core/books_router.php';
$book_id = $_GET["book_id"];
$book_comments = $books->show_comments($book_id)
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
        <?php
        if (trim($book_id)):
        foreach ($books->get_book($book_id) as $book):
        ?>
        <div class="card">
            <h1 class="h3 mb-3 font-weight-normal">View Book</h1>
            <img src="../assets/images/theStand.jpg" width="200">
            <h2><?php echo $book['name']; ?></h2>
            <p><?php echo $book['year']; ?></p>
            <p><?php echo $book['description']; ?></p>
        </div>
        <?php
        endforeach;
        endif;
        foreach ($books->show_comments($book_id) as $book_comment):
        ?>
        <div class="card">
            <h2 class="h3 mb-3 font-weight-normal">Comments</h2>
            <p><?php echo $book_comment['text']; ?></p>
        </div>
        <?php
        endforeach;
        if(isset($_POST['text'])){
        $books->add_comment($book_id, $_POST['text']);
        }
        ?>
        <form action="" method="POST" class="col-lg-2 ">
            <textarea class="form-control mb-3" name="text"></textarea>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Add comment</button>
        </form>
<!--        <form action="<?php //$books->delete_book($book_id) ?>" method="POST" class="col-lg-2 ">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Delete Book</button>
        </form>-->
        
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </body>

</html>