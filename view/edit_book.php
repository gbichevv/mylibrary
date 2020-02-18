<?php
include_once '../core/autoload.php';
$books = new \controler\Books;
$book_id = $_GET["book_id"];
if (isset($_POST['isbn'], $_POST['bookname'], $_POST['year'], $_POST['description'])) {

    $books->edit_book_data($book_id, $_POST['isbn'], $_POST['bookname'], $_POST['year'], $_POST['description']);
}
require_once 'header/header.php';?> 
    <body class="text-center">
        <?php foreach ($books->get_book($book_id) as $book): ?>
            <form class="form-signin col-lg-4 offset-lg-4" method="POST">
                <h1 class="h3 mb-3 font-weight-normal">Edit Book</h1>
                <input type="text" id="bookname" class="form-control mb-3" placeholder="Book Name" name="bookname" value="<?php echo $book['name']; ?>" required autofocus>
                <input type="text" id="isbn" class="form-control mb-3" placeholder="International Standard Book Number - ISBN" name="isbn" value="<?php echo $book['isbn']; ?>" required autofocus>
                <input type="text" id="year" class="form-control mb-3" placeholder="Year of Book" name="year" value="<?php echo $book['year']; ?>" required autofocus>
                <input type="text" id="description" class="form-control mb-3" placeholder="Description" name="description" value="<?php echo $book['description']; ?>" required autofocus>
                <div class="form-group text-left">
                    <label for="image">Add Book cover image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Edit Book</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
            </form>
        <?php endforeach; ?>
  <?php require_once 'footer/footer.php';