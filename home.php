<?php

@include 'config.php';

session_start();

$user_id =  $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}

echo $_SESSION['user_name'];
echo $_SESSION['user_email'];

?>