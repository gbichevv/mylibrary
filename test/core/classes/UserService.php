<?php
 
trait UserService{
 
    // this method generates user hashing password
    private function _generateHashPass($data = array()) {
 
        if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
            $salt = '$2y$11$' . substr(md5(uniqid(rand(), true), false), 0, 22);
            $pass = crypt($data['password'], $salt);
            $stmt = $this->db->prepare("INSERT INTO `cms`.`users` (`userID`, `username`, `password`,`salt`, `email`, `regdate`) VALUES (default, ?, ?, ?, ?, NOW())");
            $stmt->bindValue(1, $data['username'], PDO::PARAM_STR);
            $stmt->bindValue(2, $pass, PDO::PARAM_STR);
            $stmt->bindValue(3, $salt, PDO::PARAM_STR);
            $stmt->bindValue(4, $data['email'], PDO::PARAM_STR);
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
   // this method retrieves user details, such  
    private function _getUserEntires($data = array()) {
 
        $sql = "select username, password, salt, email from `cms`.`users` where email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(2, $data['password'], PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['password'] == crypt($data['password'], $row['salt']) && $row['email'] == $data['email']) {
            $_SESSION['user'] = $row['username'];
        }
        if(!isset($_SESSION['user'])) {
           $this->error = "Invalid email or password. Please, try again."; 
        } 
    }
    
    // check if this email already exists inside db
    private function _checkUserByMail($email) {
        $sql = "select email from users where email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('1', $email, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['email'] == $email) {
            $this->error = 'This email address is already taken';
        }
    }
}