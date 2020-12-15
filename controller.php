<?php
  session_start();
 require_once('model/database.php');
 require_once('model/usersDB.php');
 require_once ('model/member.php');
 require_once('model/apex.php');
 require_once('model/apexDB.php');
 require_once('model/followingDB.php');
 require_once('model/following.php');

 $action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'nothing';
    }
}
 if (!isset($_SESSION)) 
 {
    $action = 'login';
 }

switch($action)
{
    case 'nothing':
        include ('view/login.php');
        break;
    
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
        include ('view/registrationConfirmation.php');
        }
        break;
        
         case 'adminRegister':

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
            include ('view/adminRegister.php'); 
            
        }
        else {  
        $member = new member($firstName, $lastName, $userName, $gamerTag, $hash, $isAdmin);
        usersDB::addMember($member);
        include ('view/registrationConfirmation.php');
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
          
           $memberFollowing = followingDB::getFollowing($user_name);
            include('view/profile.php');
            
        } else{
            $errorMessageLogin= 'Your Username and Password do not match a member on this site. Please Register and Join Us';
            include('view/login.php');
        }
        break;
        
    case 'addApex':
         $user_name = ($_SESSION['user_name']);
         $userID = usersDB::get_current_userID($user_name);
         $kills = filter_input(INPUT_POST, 'kills');
         $gamer_tag = usersDB::get_current_gamerTag($user_name);
         $apex = new apex($userID, $user_name, $gamer_tag, $kills);
         apexDB::addApex($apex);
         include ('view/apexConfirm.php');
        break;
        
     case 'viewAll':
        
         $allMembers = usersDB::select_all();
         include ('view/viewAll.php');
          break;
    
       
    case 'updateApex':
         $user_name = ($_SESSION['user_name']);
         $userID = usersDB::get_current_userID($_SESSION['user_name']);
         $kills = filter_input(INPUT_POST, 'kills');
         $gamer_tag = filter_input(INPUT_POST, 'gamer_tag');
         apexDB::update_info($user_name,$kills);
         include ('view/enterApexInfo.php');
        break;
    
     case 'profilePage':
       if (isset($_SESSION['user_name']))  {
        $user = usersDB::get_current_userID($_SESSION['user_name']);
        $user_name = ($_SESSION['user_name']);
        $memberFollowing = followingDB::getFollowing($user_name);
        include('view/profile.php');
        break;
      } else {
        include('view/login.php');
        break;
      }
      
     case 'find_friends':
       $user_name = ($_SESSION['user_name']);
        $userKills = apexDB::get_current_user_kills($user_name);
        //$apexGamers = apexDB::select_all();
        $apexGamers = apexDB::get_current_apex_users($userKills);
         include ('view/viewApexPlayers.php');
        break;
    
     case 'adminPage':
       $user_name = ($_SESSION['user_name']);
        $userID = usersDB::get_current_userID($_SESSION['user_name']);
        $adminStatus = usersDB::get_current_adminStatus($_SESSION['user_name']);
        if ($adminStatus == 1){
            include('view/adminPage.php');
        } else {
        include('view/notAdmin.php');}
        
        break;
       
    
        
    case 'visit_profile':
    
        $comment_error = '';
        $gamerTag = filter_input(INPUT_GET, 'gamerTag');
        
        $viewed_user = usersDB::get_current_user_data($gamerTag);
        
        //$comments = CommentDB::select_user_comments($viewed_user['username']);
          
        include('view/view_user.php');
        break;
        
    case 'follow':
        $follower = ($_SESSION['user_name']);
        $following = filter_input(INPUT_GET, 'userName');
     
        $follow = new following ($follower,$following);
    
        followingDB::addFollow($follow);
        break;
    
    case 'unfollow':
      $follower = ($_SESSION['user_name']);
      $following = filter_input(INPUT_GET, 'userName');
      
         $user_name = ($_SESSION['user_name']);
        $memberFollowing = followingDB::getFollowing($user_name);
        include('view/profile.php');
      break;
  
     case 'visit_profile':
    
        $comment_error = '';
        $user_name = filter_input(INPUT_GET, 'username');
        
        $viewed_user = usersDB::get_current_user_data($user_name);
        
        $comments = CommentDB::select_user_comments($viewed_user['username']);
          
        include('view/view_user.php');
        break;
        
      case 'comment':
        $IllegalCharacters = '/[<>:"\'\/\\\\|?*]/';
        
        $comment = filter_input(INPUT_POST, 'user_comment');
        $user_name = filter_input(INPUT_POST, 'viewed_user');
        $comment_error = '';
        
        if(preg_match($IllegalCharacters, $comment) === 1){
            $comment_error = 'Comment contains illegal special characters' ;
        }
        if(strlen($comment) > 300 || strlen($comment) <= 0) {
            $comment_error = 'Your comment must be between 1 and 300 characters';
        }
        
        // if an error message exists, go to the index page
        if ($comment_error !== '') {
            $viewed_user = membersDB::get_current_user_data($user_name);
            $comments = CommentDB::select_user_comments($viewed_user['username']);
            include('view/view_user.php');
            exit(); 
        } else {
            CommentDB::insert($_SESSION['user_name'], $user_name, $comment);
            $viewed_user = membersDB::get_current_user_data($user_name);
            $comments = CommentDB::select_user_comments($viewed_user['username']);
            include('view/view_user.php');
        }
        break;  
        
    case 'deleteUser':
        $user_name = filter_input(INPUT_GET, 'username');
        $delete_user_ID = usersDB::get_current_userID($user_name);
        usersDB::delete($delete_user_ID);
         $allMembers = usersDB::select_all();
         include ('view/viewAll.php');
        break;
        
    case 'logout': 
        $_SESSION = array();
        include('view/login.php');
        break;
}



