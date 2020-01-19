<?php

trait User_model {
    
    
    /* this method generates user hashing password
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */

    private function _generate_hash_pass($data = array()) {

        if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
            $hash = '$2y$11$' . substr(md5(uniqid(rand(), true), false), 0, 22);
            $pass = crypt($data['password'], $hash);
            $stmt = $this->db->prepare("INSERT INTO `library`.`users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `hash`, `regdate`) VALUES (default, ?, ?, ?, ?, ?, ?, NOW())");          
            $stmt->bindValue(1, $data['firstname'], PDO::PARAM_STR);
            $stmt->bindValue(2, $data['lastname'], PDO::PARAM_STR);
            $stmt->bindValue(3, $data['username'], PDO::PARAM_STR);
            $stmt->bindValue(4, $data['email'], PDO::PARAM_STR);
            $stmt->bindValue(5, $pass, PDO::PARAM_STR);
            $stmt->bindValue(6, $hash, PDO::PARAM_STR);
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

    private function _get_user_entires($data = array()) {

        $sql = "SELECT username, email, password, hash FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['password'], PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        var_dump($row['password'],crypt($data['password'], $row['hash']));
        if ($row['password'] == crypt($data['password'], $row['hash']) && $row['email'] == $data['email']) {
            $_SESSION['user'] = $row['username'];
        }
        if (!isset($_SESSION['user'])) {
            $this->error = "Invalid email or password. Please, try again.";
        }
    }

    /* check if this email already exists inside db
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */

    private function _check_user_email($email) {
        $sql = "SELECT email FROM users WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('1', $email, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['email'] == $email) {
            $this->error = 'This email address is already taken';
        }
    }

}