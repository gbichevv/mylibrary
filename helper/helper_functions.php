<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace helper;
trait Helper_functions {

    private $key = 'TwYBrxJa31';
    private $cipher = "aes128";  
    public $error = '';
    public $msg = '';

    /**
     * Encrypt function
     * @author Georgi Bichev <gbichevv@gmail.com>      
     */
    public function encrypt_data($data) {
        $key_string = $this->key;
        $cipher = openssl_cipher_iv_length($this->cipher);
        $iv = openssl_random_pseudo_bytes($cipher);
        return openssl_encrypt($data, $cipher, $key_string, $iv);
    }

    /**
     * Handle errors
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */
    public function handle_errors($error) {
        echo $this->error;
        return false;
    }

    /**
     * Message_success
     * @auth Georgi Bichev <gbichevv@gmail.com> 
     * @param $formvars
     */
    public function message_success($msg) {
        echo $msg;
        return true;
    }

}
