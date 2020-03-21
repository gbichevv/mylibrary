<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace model;

include_once '../core/autoload.php';

class Books_model extends \core\Database {

    public function __construct() {
        parent::__construct();
    }

    /*
     * Create book to database
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $book_data
     */

    protected function create_book($book_data) {
        $sql = "INSERT INTO books(isbn, name, year, description, images) VALUES(:isbn, :name, :year, :description, :images)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($book_data);
    }

    /*
     * Get from db all books
     * @auth Georgi Bichev <gbichevv@gmail.com>      
     */

    protected function get_all_books() {
        $sql = "SELECT * FROM books ORDER BY timestamp DESC";
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAll();
        foreach ($result as $value) {
            return $value;
        }
    }

    /*
     * Get from db book
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $id     
     */

    protected function get_select_book($id) {
        $sql = "SELECT * FROM books WHERE id=$id";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    /*
     * Delete from db book
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $id     
     */

    protected function delete_select_book($id) {
        $sql = "DELETE FROM books WHERE id=$id";
        $stmt = $this->db->query($sql);
        return $stmt;
    }

    /*
     * Create comment for book to database
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $book_id, $text
     */

    protected function create_comment($book_id, $text) {
        $sql = "INSERT INTO comments(book_id, text) VALUES(:book_id, :text)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array('book_id' => $book_id, 'text' => $text));
    }

    /*
     * Show all comments of book 
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $book_id
     */

    protected function show_all_comments($book_id) {
        $sql = "SELECT * FROM comments WHERE book_id=$book_id";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    /*
     * add favorites books in db
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $book_id, $user_id
     */

    protected function add_favorites_book($book_id, $user_id) {
        $sql = "SELECT c.twat_id, c.comment_text, c.comment_date, u.user_pic, u.user_name FROM user_books AS us_b JOIN users AS user ON user.id = us_b.user_id WHERE c.twat_id = ?";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    /*
     * Show favorites books from db
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $book_id, $user_id
     */

    protected function show_favorites_book($user_id) {
        $sql = "SELECT * FROM user_books LEFT JOIN books ON  WHERE user_id=$user_id";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    /*
     * Edit book from db
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $book_id
     */

    protected function edit_book($book_id, $isbn, $name, $year, $description) {
        $sql = "UPDATE books SET isbn=:isbn, name=:name, year=:year, description=:description WHERE id=$book_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$isbn, $name, $year, $description]);
        return $stmt;
    }

}
