<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * var_dump function
 * @auth Georgi Bichev <gbichevv@gmail.com> 
 */
if (function_exists(dump)) {

    function dump($data) {
        echo '<pre>' . var_dump($data) . '</pre>';
    }

}