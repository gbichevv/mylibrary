<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../model/Books_model.php';

class Books {

    use Boods_model;

    private $db;
    public $error = '';
    public $msg = '';

    public function __construct($database) {
        $this->db = $database;
    }

    /*
     * Send data to Boook_model/create_book
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $isbn, $name, $year
     */

    public function add_book($isbn, $name, $year, $description) {
        $this->create_book($isbn, $name, $year, $description);
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
