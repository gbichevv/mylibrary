<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
echo 'Hello '.$_SESSION['user'].'<br> You have logged in successfully';
var_dump($_SESSION['user']);
if(isset($_SESSION['user']))
echo 'Hello '.$_SESSION['user'].'<br> You have logged in successfully'
?>
<a href="<?php session_destroy(); ?>">logOut</a>
