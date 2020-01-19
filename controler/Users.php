<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../model/User_model.php';

class Users {

    use User_model;

    private $db;
    public $error = '';
    public $msg = '';

    public function __construct($database) {
        $this->db = $database;
    }

    /*
     * Registration user
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */

    public function registration_user($formvars) {
        $this->_generate_hash_pass($formvars);

        if ($this->error != '') {
            return $this->handle_errors($this->error);
        }
        return $this->message_success($this->msg);
    }

    /*
     * This method check user post data / validation
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */
    public function check_post_data(&$formvars) {

        $required = array('username', 'password', 'email');

        foreach ($required as $field) {
            if (empty($formvars[$field])) {
                $this->error = 'Всички полета са задължителни.';
            }
        }

        $formvars['username'] = trim($formvars['username']);
        $formvars['password'] = trim($formvars['password']);
        $formvars['email'] = trim($formvars['email']);

        if ($this->error != '') {
            return $this->handle_errors($this->error);
        }
        return true;
    }

    /*
     * Check is valid form
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */

    public function is_valid_form($formvars) {


        $username = $formvars['username'];

        $password = $formvars['password'];

        $email = filter_var($formvars['email'], FILTER_SANITIZE_EMAIL);

        if (strlen($username) < 4) {
            $this->error .= 'Your name should be at least 4 chars long' . '<br />';
        }

        if (strlen($password) < 6) {
            $this->error .= 'Your password should be at least 6 chars long' . '<br />';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error .= 'Please enter a valid email' . '<br />';
        }

        if ($this->error != '') {
            return $this->handle_errors($this->error);
        }
        return true;
    }
    
    /*
     * Email validation
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */
    public function show_email_exist($data) {
        $this->_check_user_email($data);

        if ($this->error != '') {
            return $this->handle_errors($this->error);
        }
        return true;
    }

    /*
     * Show login user
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */
    public function show_login_user($formvars) {
        $this->_get_user_entires($formvars);

        if ($this->error != '') {
            return $this->handle_errors($this->error);
        }
        return header('Location: home.php');
    }
    /*
     * Handle errors
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */
    public function handle_errors($error) {
        echo $this->error;
        return false;
    }
    /*
     * Message_success
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */
    public function message_success($msg) {
        echo $msg;
        return true;
    }

}