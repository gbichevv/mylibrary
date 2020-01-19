<?php
include '../core/books_router.php';
include '../core/upload.php';
if (isset($_POST['isbn'], $_POST['bookname'], $_POST['year'], $_POST['description'])) {
   
    $books->add_book($_POST['isbn'], $_POST['bookname'], $_POST['year'], $_POST['description']);
}
if(isset($_FILES['image'])){
    $fileupload = new upload();
    $fileupload->startupload();
    if($fileupload->uploadfile()){
        echo 'Fisierul a fost uploadat';
    }
}
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
    <body class="text-center">
        <form action="" method="POST" class="col-lg-8 offset-lg-2" enctype="multipart/form-data">
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
            <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
        </form>
    </body>

</html>