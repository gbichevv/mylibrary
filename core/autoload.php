<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Session start
 * @author gbichev <gbichevv@gmail.com>
 */
session_start([
    'cookie_lifetime' => 86400,
]);

/**
 * Autoload function
 * @author gbichev <gbichevv@gmail.com>
 * @param $class namespace param 
 */
spl_autoload_register(function ($class) {
    $arr[] = $class;
    if (strpos($class, 'core')) {
        $full_path = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        require_once __DIR__ . DIRECTORY_SEPARATOR . $full_path;
    }
    $full_path = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    require_once __DIR__ . DIRECTORY_SEPARATOR . "../" . $full_path;
})
?>