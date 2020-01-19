<?php
 
include 'UserService.php';
 
class Users {
 
    use UserService;
 
    private $db;
 
    public $error = '';
    
    public $msg = '';
 
    public function __construct($database) {
        $this->db = $database;
    }
 
    public function userRegistration($formvars) {
        // call _generateHash method 
        $this->_generateHashPass($formvars);
 
        // test if the data is inserted
        if ($this->error != '') {
            return $this->handleErrors($this->error);
        }
        return $this->messageSuccess($this->msg);
    }
 
    public function mungePostlData(&$formvars) {
 
        $required = array('username', 'password', 'email');
 
        foreach ($required as $field) {
            if (empty($formvars[$field])) {
                $this->error = 'Всички полета са задължителни.';
            }
        }
 
        // trim off excess whitespace
        $formvars['username'] = trim($formvars['username']);
        $formvars['password'] = trim($formvars['password']);
        $formvars['email'] = trim($formvars['email']);
 
        if ($this->error != '') {
            return $this->handleErrors($this->error);
        }
        // form passed the further validation
        return true;
    }
 
    public function isValidForm($formvars) {
 
        // assign the local variables username, password and email  
        // to post-data array
 
        $username = $formvars['username'];
 
        $password = $formvars['password'];
 
        $email = filter_var($formvars['email'], FILTER_SANITIZE_EMAIL);
 
        // test if "userName" is shorter than 4 chars
        if (strlen($username) < 4) {
            $this->error .= 'Your name should be at least 4 chars long' . '<br />';
        }
 
        // test if "password" is shorter than 6 chars
        if (strlen($password) < 6) {
            $this->error .= 'Your password should be at least 6 chars long' . '<br />';
        }
 
        // test if "email" is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error .= 'Please enter a valid email' . '<br />';
        }
 
        if ($this->error != '') {
            return $this->handleErrors($this->error);
        }
        return true;
    }
 
    public function showMailExist($data){
        // call _checkUserByMail method
        $this->_checkUserByMail($data);
       
        if ($this->error != '') {
            return $this->handleErrors($this->error);
        }
        return true; 
    }
 
    public function showLoginUser($formvars) {
        // call _getUserEntires method 
        $this->_getUserEntires($formvars);
 
        // test if the data is inserted
        if ($this->error != '') {
            return $this->handleErrors($this->error);
        }
        return header('Location: index.php');
    }
 
    public function handleErrors($error) {
        // handle error method
        echo $this->error;
        return false;
    }
 
    public function messageSuccess($msg) {
        echo $msg;
        return true;
    }
}