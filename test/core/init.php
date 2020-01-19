<?php
 
session_start();
 
require 'classes/Users.php';
 
require 'classes/credentails.php';
 
$users = new Users($db);
