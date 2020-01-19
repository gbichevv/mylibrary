<?php
session_start();
 echo 'Hello '.$_SESSION['user'].'<br> You have logged in successfully';
 var_dump($_SESSION['user']);
if(isset($_SESSION['user']))
echo 'Hello '.$_SESSION['user'].'<br> You have logged in successfully'
?>