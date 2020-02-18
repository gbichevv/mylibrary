<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace controler;
include_once '../core/autoload.php';

class Users extends \model\User_model{
    
   

    /*
     * Registration user
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */

    public function registration_user($formvars) {
        $this->generate_hash_pass($formvars);

        if ($this->error != '') {
            return $this->handle_errors($this->error);
        }
        return $this->message_success($this->msg);
    }

  

    /*
     * Check is valid form
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */

    public function is_valid_form($formvars) {

        
     
        $this->validation_email($formvars['email']);
        $this->validation_password($formvars['password']);
        $this->validation_username($formvars['username']);


        if ($this->error != '') {
            return $this->handle_errors($this->error);
        }
        return TRUE;
    }
    
    /*
     * Email validation
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */
    public function show_email_exist($data) {
        $this->check_user_email($data);

        if ($this->error != '') {
            return $this->handle_errors($this->error);
        }
        return TRUE;
    }

    /*
     * Show login user
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */
    public function show_login_user($formvars) {
        $this->get_user_entires($formvars);

        if ($this->error != '') {
            return $this->handle_errors($this->error);
        }
        return header('Location: home.php');
    }
    /*
     * Show user data
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */
    public function show_user($username) {
        $this->get_user($username);
    }
  

}
