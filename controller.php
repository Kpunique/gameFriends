<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
switch($action)
{
    case 'adminRegister':
        
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    
    $user_name = filter_input(INPUT_POST, 'username');
    $email_address = filter_input(INPUT_POST, 'email_address', FILTER_VALIDATE_EMAIL);
    $password_=filter_input(INPUT_POST, 'password_');
        
      break;
}
