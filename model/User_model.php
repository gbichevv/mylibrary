<?php

namespace model;

include_once '../core/autoload.php';

class User_model extends \core\Database {

    use \helper\Helper_functions, \helper\Validation {
        \helper\Helper_functions::encrypt_data insteadof \helper\Validation;
        \helper\Helper_functions::handle_errors insteadof \helper\Validation;
        \helper\Helper_functions::message_success  insteadof \helper\Validation;
    }

    public function __construct() {
        parent::__construct();
    }

    /* this method generates user hashing password
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */

    protected function generate_hash_pass($data = array()) {

        if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
            $salt = '$2y$11$' . substr(md5(uniqid(rand(), true), false), 0, 22);
            $pass = crypt($data['password'], $salt);
            $stmt = $this->db->prepare("INSERT INTO `library`.`users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `salt`, `regdate`) VALUES (default, ?, ?, ?, ?, ?, ?, NOW())");
            $stmt->bindValue(1, $data['firstname'], \PDO::PARAM_STR);
            $stmt->bindValue(2, $data['lastname'], \PDO::PARAM_STR);
            $stmt->bindValue(3, $data['username'], \PDO::PARAM_STR);
            $stmt->bindValue(4, $data['email'], \PDO::PARAM_STR);
            $stmt->bindValue(5, $pass, \PDO::PARAM_STR);
            $stmt->bindValue(6, $salt, \PDO::PARAM_STR);
            $stmt->execute();
            $affected_rows = $stmt->rowCount();

            if (!$affected_rows) {
                $this->error = 'Failed to insert data into database / table';
            } else {
                $this->msg = '<p>Data has been successfully saved!</p>'
                        . '<p>Please, <a href=login.php>login</a> to your cms applicatation</p>';
            }
        }
    }

    /* This method retrieves user details, such
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */

    protected function get_user_entires($data = array()) {
        $sql = "SELECT * FROM users where email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $data['email'], \PDO::PARAM_STR);
//        $stmt->bindParam(2, $data['password'], \PDO::PARAM_STR);
        $stmt->execute();


        $row = $stmt->fetch();
        if ($row['password'] == crypt($data['password'], $row['salt']) && $row['email'] == $data['email']) {
            $_SESSION['user'] = $row['username'];
        }
        if (!isset($_SESSION['user'])) {
            $this->error = "Invalid email or password. Please, try again.";
        }
    }

    /* This method get user data
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $username
     */

    protected function get_user($username) {

        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /* check if this email already exists inside db
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */

    protected function check_user_email($email) {
        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('1', $email, \PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row['email'] == $email) {
            $this->error = 'This email address is already taken';
        }
    }

}
