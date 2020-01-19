<?php
 
session_start();
 
require '../controler/Users.php';
 
require 'credentails.php';
 
$users = new Users($db);
