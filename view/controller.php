<?php
  session_start();
 require_once('../model/database.php');
 require_once('../model/usersDB.php');
 require_once ('../model/member.php');
 require_once('../model/apex.php');

 $action=filter_input(INPUT_POST,'action');
 if ($action==NULL){
    $action = filter_input(INPUT_GET, 'action');
    if($action == NULL){
        $action= 'profile';
    }
 }
 if (!isset($_SESSION)) 
 {
    $action = 'login';
 }

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
            include ('login.php'); 
            
        }
        else {  
        $member = new member($firstName, $lastName, $userName, $gamerTag, $hash, $isAdmin);
        usersDB::addMember($member);
    
        }
        break;
        
        case 'admin register':

        $firstName = filter_input(INPUT_POST, 'firstName');
        $lastName = filter_input(INPUT_POST, 'lastName');
        $userName = filter_input(INPUT_POST, 'userName');
        $gamerTag = filter_input(INPUT_POST, 'gamerTag');
        $password = filter_input(INPUT_POST, 'password');
        $isAdmin = 1;
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
            include ('adminRegister.php'); 
            
        }
        else {  
        $member = new member($firstName, $lastName, $userName, $gamerTag, $hash, $isAdmin);
        usersDB::addMember($member);
    
        }
        break;
        
     case 'login':
        $user_name = filter_input(INPUT_POST, 'user_name');
        $password_ = filter_input(INPUT_POST, 'password_');
              if (usersDB::is_valid_login($user_name, $password_))
        {
            $_SESSION['is_valid_login'] = true;
            $_SESSION['user_name'] = $user_name; 
            $userID = usersDB::get_current_userID($_SESSION['user_name']);
          
            //$memberBooks = booksDB::get_member_books($memberID);
            include('profile.php');
            
        } else{
            $errorMessageLogin= 'Your Username and Password do not match a member on this site. Please Register and Join Us';
            include('login.php');
        }
        break;
        
         case 'viewAll':
        
         $allMembers = usersDB::select_all();
         include ('viewAll.php');
          break;
    
     case 'updateApex':
         $user_name = ($_SESSION['user_name']);
         $userID = usersDB::get_current_userID($_SESSION['user_name']);
         $apexKills = filter_input(INPUT_POST, 'apexKills');
         $gamer_tag = filter_input(INPUT_POST, 'gamer_tag');
         $apex = new apex($userID, $user_name, $gamer_tag, $apexKills);
         include ('enterApexInfo.php');
        break;
    
     case 'updateFortnite':
        break;
    
     case 'profilePage':
        $_SESSION['user_name'] = $user_name;
        $userID = usersDB::get_current_userID($_SESSION['user_name']);
        break;
    
     case 'adminPage':
        $_SESSION['user_name'] = $user_name;
        
        break;
    case 'logout': 
        $_SESSION = array();
        include('view/login.php');
        break;
}



