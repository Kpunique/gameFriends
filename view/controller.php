<?php
  session_start();
 require_once('../model/database.php');
 require_once('../model/usersDB.php');
 require_once ('../model/member.php');
//broken
 $action=filter_input(INPUT_POST,'action');


switch($action)
{
    case 'register':

        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $userName = filter_input(INPUT_POST, 'userName');
        $gamerTag = filter_input(INPUT_POST, 'gamerTag');
        $password = filter_input(INPUT_POST, 'password');
        $isAdmin = 0;
        $passwordVerify = filter_input(INPUT_POST, 'passwordVerify');
        $passwordUpper = '/[A-Z]/';
        $passwordLower = '/[a-z]/';
        $passwordNumber = '/[0-9]/';
        if ($firstName == FALSE) {
            $errorMessageFirst = 'Must input a first name.';
        } else {
            $errorMessageFirst = '';
        }
        if ($lastName == FALSE) {
            $errorMessageLast = 'Must input a last name.';
        } else {
            $errorMessageLast = '';
        }
        //username validaiton
        if ($userName == FALSE) {
            $errorMessageUser = 'Must input a user name.';
        } else {
            $errorMessageUser = '';
        }
        
        //password validation
        if ($password == FALSE) {
            $errorMessagePassword = 'Must input a valid password.';
        } else if ($password != $passwordVerify) {
            $errorMessagePassword = 'Passwords do not match.';
        } else if (strlen($password) < 10) {
            $errorMessagePassword = 'Password must be at least 10 characters long';
        } else if (preg_match($passwordUpper, $password) == 0) {
            $errorMessagePassword = 'Password must include at least one UPPERCASE letter';
        }
        else if (preg_match($passwordNumber, $password) == 0) {
            $errorMessagePassword = 'Password must include at least one Number';
        }
        else if (preg_match($passwordLower, $password) == 0) {
            $errorMessagePassword = 'Password must include at least one LOWERCASE letter.';
        } else {
            $errorMessagePassword = '';
            $hash = password_hash($password, PASSWORD_BCRYPT);   
        }
        
        if ($errorMessageFirst != '' || $errorMessageLast !='' ||$errorMessageUser || 
         $errorMessagePassword != ''){ 
            include ('view/login.php'); 
            
        }
        else {  
        $member = new member($firstName, $lastName, $userName, $gamerTag, $hash, $isAdmin);
        usersDB::addMember($member);
    
        }
        break;
}



