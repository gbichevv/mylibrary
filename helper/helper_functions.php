<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace helper;

trait Helper_functions {

    private $key = 'TwYBrxJa31';
    private $cipher = "AES-192-CBC";
    private $encryption_iv  = "1234567891011121";
    public $error = '';
    public $msg = '';

    
    /**
     * Encrypt function
     * @author Georgi Bichev <gbichevv@gmail.com>  
     * @param atring $data filename 
     */
    public function encrypt_data($data) {
        $key_string = $this->key;
        $cipher = $this->cipher;
        $iv = $this->encryption_iv;
        $cipher_string = openssl_encrypt($data, $cipher, $key_string, true, $iv);
        return $cipher_string;
    }
    /**
     * Decrypt function
     * @author Georgi Bichev <gbichevv@gmail.com>      
     */
    public function decrypt_data($data) {
        
        $key_string = $this->key;
        $cipher = $this->cipher;
        $iv = $this->encryption_iv;
        $cipher_string = openssl_decrypt($data, $cipher, $key_string, true, $iv);
        return $cipher_string;
    }
    
    
    /**
     * Handle errors
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */
    public function handle_errors($error) {
        echo $this->error;
        return FALSE;
    }

    /**
     * Message_success
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */
    public function message_success($msg) {
        echo $msg;
        return TRUE;
    }

}
