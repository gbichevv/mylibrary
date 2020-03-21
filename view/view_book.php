<?php
include_once '../core/autoload.php';
$books = new \controler\Books;
$book_id = $_GET["book_id"];
$book_comments = $books->show_comments($book_id);
require_once 'header/header.php';
?>

        <?php
        if (trim($book_id)):
            foreach ($books->get_book($book_id) as $book):
                ?>
                <div class="card text-center border-bottom border-success">
                    <h1 class="h3 mb-3 font-weight-normal">View Book</h1>
                    <?php if ($book['images']): ?>
                        <div class="row">
                            <div class="col-lg-4 offset-lg-4">
                                <img src="../assets/images/<?php echo $book['images']; ?>" width="300" class="text-center book-cover">
                            </div>
                            <div class="col-lg-4"> </div>
                        </div>
                    <?php endif; ?>
                    <h2><?php echo $book['name']; ?></h2>
                    <p><?php echo $book['year']; ?></p>
                    <p><?php echo $book['description']; ?></p>
                </div>

                <h2 class="h3 mb-3 mt-3 font-weight-normal text-center">Comments</h2>
                <?php
            endforeach;
        endif;
        foreach ($books->show_comments($book_id) as $book_comment):
            ?>
            <div class="text-center col-lg-6 offset-lg-3">
                <p><i class="fas fa-comments ml-3"></i><?php echo $book_comment['text']; ?></p>
            </div>
            <?php
        endforeach;
        if (isset($_POST['text'])) {
            $books->add_comment($book_id, $_POST['text']);
        }
        ?>
        <form action="" method="POST" class="text-center col-lg-6 offset-lg-3">
            <textarea class="form-control mb-3 mt-3" name="text"></textarea>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Add comment</button>
        </form>
<!--        <form action="<?php $books->delete_book($book_id) ?>" method="POST" class="col-lg-2 ">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Delete Book</button>
        </form>-->
<?php require_once 'footer/footer.php';
     