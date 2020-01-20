<?php
include '../core/books_router.php';
//$books->add_favorites($book_id, $user_id);
require_once 'header/header.php'; ?>
    <body class="text-left">
        <header>
            <div class="text-right">
                <div class="col-12 text-right">
                    <?php
                    if (isset($_SESSION['user'])):
                        echo '<p>Hello ' . $_SESSION['user'] . '</p>';
                        ?>
                        <a href="<?php session_destroy(); ?>" class="" type="submit">LogOut</a>
                    <?php else: ?>
                        <a href="register.php" class="" type="submit">Register</a>
                        <a href="login.php" class="" type="submit">LogIn</a>
                    <?php endif; ?>

                </div>
            </div>
        </header>
        <?php foreach ($books->list_books() as $book): ?>
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
                <?php if (isset($_SESSION['user'])): ?>
                <a href="view_book.php?book_id=<?php echo $book['id']; ?>"><h2><?php echo $book['name']; ?></h2></a>
                <?php else: ?>
                <h2><?php echo $book['name']; ?></h2>
                <?php endif; ?>
                <p><?php echo $book['year']; ?></p>
                <p><?php echo $book['description']; ?></p>
                <?php if (isset($_SESSION['user'])): ?>
                <div class="col-lg-12 text-center">
                    <div class="col-lg-4 offset-lg-4">
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
        <?php endforeach; ?>
        <?php if (isset($_SESSION['user'])): ?>
        <div class="col-lg-12 text-center">
            <div class="col-lg-4 offset-lg-4">
                <a href="create_book.php" class="btn btn-lg btn-primary btn-block" type="submit">Add Book</a>
            </div>
        </div>
        <?php endif; ?>
<?php require_once 'footer/footer.php';