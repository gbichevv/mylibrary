<?php
include_once '../core/autoload.php';

if (isset($_POST['isbn'], $_POST['bookname'], $_POST['year'], $_POST['description'])) {
    $books = new \controler\Books;
    $books->add_book($_POST['isbn'], $_POST['bookname'], $_POST['year'], $_POST['description'], $_FILES['image']);
}
require_once 'header/header.php';?>
    <body class="text-center">
        <form action="" method="POST" class="col-lg-8 offset-lg-2"  enctype="multipart/form-data">
            <h1 class="h3 mb-3 font-weight-normal">Create Book</h1>
            <input type="text" id="bookname" class="form-control mb-3" placeholder="Book Name" name="bookname" required autofocus>
            <input type="text" id="isbn" class="form-control mb-3" placeholder="International Standard Book Number - ISBN" name="isbn" required autofocus>
            <input type="text" id="year" class="form-control mb-3" placeholder="Year of Book" name="year" required autofocus>
            <input type="text" id="description" class="form-control mb-3" placeholder="Description" name="description" required autofocus>
            <div class="form-group text-left">
                <label for="image">Add Book cover image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Edit Book</button>
           
        </form>
 <?php require_once 'footer/footer.php';