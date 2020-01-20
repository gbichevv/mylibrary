<?php
 
session_start([
    'cookie_lifetime' => 86400
]);
 
require '../controler/Users.php';
 
require 'credentails.php';
 
$users = new Users($db);
