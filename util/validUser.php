<?php 
require_once('database.php');
require_once('usersDB.php'); 
$email = ''; 
$password = ''; 
if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) 
    {
    $email = $_SERVER['PHP_AUTH_USER'];
    $password= $_SERVER['PHP_AUTH_PW'];   
    }
    if (membersDB::is_valid_login($user_name, $password_)) {
        header('WWW-Authenticate: Basic realm="Admin"');
        header('HTTP/1.0 401 Unauthorized'); 
        include('unauthorized.php'); exit(); } 
        ?>

