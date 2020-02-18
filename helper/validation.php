<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace helper;

trait Validation {

    use \helper\Helper_functions;

    /**
     * Validation Username
     * 
     * @author gbihev <gbichevv@gmail.com>
     * @param type $username
     * @return boolean
     */
    public function validation_username($username) {
        $username_trim = trim($username);
        if (empty($username_trim)) {
            $this->error .= 'Username field is required' . '<br />';
            return FALSE;
        }
        if (trim(strlen($username_trim)) < 4) {
            $this->error .= 'Your name should be at least 4 chars long' . '<br />';
            return FALSE;
        }
    }

    /**
     * Validation Email
     * 
     * @author gbihev <gbichevv@gmail.com>
     * @param type $email
     * @return boolean 
     */
    public function validation_email($email) {

        $email_trim = trim($email);
        $sanitize_email = trim(filter_var($email_trim, FILTER_SANITIZE_EMAIL));
        if (!(filter_var($sanitize_email, FILTER_VALIDATE_EMAIL))) {
            $this->error .= 'Please enter a valid email' . '<br />';
            return FALSE;
        }
        if (empty($email_trim)) {
            $this->error .= 'Email field is required' . '<br />';
            return FALSE;
        }
    }

    /**
     * Validation Password
     * 
     * @author gbihev <gbichevv@gmail.com>
     * @param type $password
     * @return boolean
     */
    public function validation_password($password) {
        $password_trim = trim($password);
        if (empty($password_trim)) {
            $this->error .= 'Password field is required' . '<br />';
            return FALSE;
        }
        if (strlen($password) < 6) {
            $this->error .= 'Your password should be at least 6 chars long' . '<br />';
            return FALSE;
        }
    }
    
    /**
     * Validation numeric POST
     * 
     * @author gbihev <gbichevv@gmail.com>
     * @param type $num
     * @return boolean
     */
    
    public function validation_numeric($num){
        $numeric_trim = trim($num);
        if(!(filter_var($numeric_trim, FILTER_SANITIZE_NUMBER_INT))){
            $this->error .= 'Please enter a valid numeric script' . '<br />';
            return FALSE;
        }
    }
    
    /**
     * Validation string from POST
     * 
     * @author gbihev <gbichevv@gmail.com>
     * @param type $string
     * @return boolean
     */
    
    public function validation_string($string){
        $string_trim = trim($string);
        if(!(filter_var($string_trim, FILTER_SANITIZE_STRING))){
            $this->error .= 'Please enter a valid text' . '<br />';
            return FALSE;
        }
    }

}
