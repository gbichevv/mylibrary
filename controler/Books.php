<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controler;

include_once '../core/autoload.php';

class Books extends \model\Books_model {
    /*
     * Send data to Boook_model/create_book
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $isbn, $name, $year, $description, $file
     */

    public function add_book() {

        $this->validation_numeric($_POST['isbn']);
        $this->validation_string($_POST['bookname']);
        $this->validation_numeric($_POST['year']);
        $this->validation_string($_POST['description']);
        if ($this->error != '') {
            return $this->handle_errors($this->error);
        }
        $book_data = array(
            'isbn' => $_POST['isbn'],
            'name' => $_POST['bookname'],
            'year' => $_POST['year'],
            'description' => $_POST['description'],
            'images' => base64_encode($_FILES["image"]['name'])
        );

        $target_dir = "../assets/images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        } else {
//add in db if file is JPG, JPEG, PNG & GIF
            $this->create_book($book_data);
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    /*
     * List Books
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @return books array 
     */

    public function list_books() {
        return $this->get_all_books();
    }

    /*
     * Get Book from db
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $id on book
     */

    public function get_book($id) {
        return $this->get_select_book($id);
    }

    /*
     * Delete Book from db
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $id on book
     */

//    public function delete_book($id) {
//        return $this->delete_select_book($id);
////             return header('Location: home.php');
//        
//    }
    /*
     * add comment in db
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $id on book
     */

    public function add_comment($book_id, $text) {
        return $this->create_comment($book_id, $text);
    }

    /* show comment in db
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $id on book
     */

    public function show_comments($book_id) {
        return $this->show_all_comments($book_id);
    }

    /* add favorites books in db
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $book_id, $user_id
     */

//    public function add_favorites($book_id, $user_id) {
//        return $this->add_favorites_book($book_id, $user_id);
//    }
    /* show favorites books from db
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $book_id, $user_id
     */

    public function show_favorites($user_id) {
        return $this->show_favorites_book($book_id, $user_id);
    }

    /* Edit book from db
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $book_id, $isbn, $name, $year
     */

    public function edit_book_data($book_id, $isbn, $name, $year, $description) {
        return $this->edit_book($book_id, $isbn, $name, $year, $description);
    }

}

?>
