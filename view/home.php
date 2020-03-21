<?php
include_once '../core/autoload.php';
$books = new \controler\Books;
$sessions = new \controler\Sessions;
//$books->add_favorites($book_id, $user_id);
require_once 'header/header.php';
?>

    <div class="container">
        <div class="row mt-5">
            <?php foreach ($books->list_books() as $book): ?>
                <div class="col-4 mt-3">
                    <div class="card text-center ">
                        <h1 class="h3 mb-3 font-weight-normal">View Book</h1>
                        <?php if ($book['images']): ?>
                            <div class="row">
                                <div class="col-lg-4 offset-lg-4">
                                    <img src="../assets/images/<?php echo $books->decrypt_data($book['images']); ?>"  class="text-center img-fluid">
                                </div>
                                <div class="col-lg-4"> </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user'])): ?>
                            <a href="view_book.php?book_id=<?php echo $book['id']; ?>"><h2><?php echo $book['name']; ?></h2></a>
                        <?php else: ?>
                            <h2><?php echo $book['name']; ?></h2>
                        <?php endif; ?>
                        <p><?php echo $book['year']; ?></p>
                        <p><?php echo $book['description']; ?></p>
                        <?php if (isset($_SESSION['user'])): ?>
                            <div class="col-lg-12 text-center">
                                <div class="col-lg-10 offset-lg-1">
                                    <a href="edit_book.php?book_id=<?php echo $book['id']; ?>" class="btn btn-lg btn-primary btn-block" type="submit">Edit Book</a>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="col-lg-4 offset-lg-4">
                                    <form action="" method="POST" >
                                        <button class="btn btn-lg" type="submit"><i class="fas fa-3x fa-heart text-danger"></i></button>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>


                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    <?php if (isset($_SESSION['user'])): ?>
        <div class="col-lg-12 text-center mt-3">
            <div class="col-lg-10 offset-lg-1">
                <a href="create_book.php" class="btn btn-lg btn-primary btn-block" type="submit">Add Book</a>
            </div>
        </div>
    <?php endif; ?>
    <?php
    require_once 'footer/footer.php';
    