<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Begin/resume session
session_start();

class Database {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "library";

    /*
     * Conection database
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     */

    public function connect_db() {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            echo "Problem with db query - " . $e->getMessage();
        }
    }

}
