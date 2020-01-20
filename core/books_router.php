<?php
 
session_start([
    'cookie_lifetime' => 86400
]);
 
require '../controler/Books.php';
 
require 'credentails.php';
 
$books = new Books($db);

