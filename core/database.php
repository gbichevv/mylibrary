<?php

//define('DB_HOST', 'localhost');
//define('DB_USER', 'root');
//define('DB_PASS', '');
//define('DB_NAME', 'library');
//define('DB_CHARSET', 'UTF8');
//
//try {
//
//    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, array(
//        PDO::ATTR_EMULATE_PREPARES => false,
//        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//} catch (PDOException $e) {
//    echo 'ERROR: ' . $e->getMessage();
//}
/*
 * Class db conection
 * @auth Georgi Bichev <gbichevv@gmail.com> 
 */
namespace core;
abstract class Database {

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_name = 'library';
    private $db_charset = 'UTF8';

    protected function __construct(){
        try {
             $this->db = new \PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . ';charset=' . $this->db_charset, $this->db_user, $this->db_pass);
             $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

}
