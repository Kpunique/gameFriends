<?php

require_once('database.php');
class usersDB {
    
        private static function arrayToMembers($results){
        $member = [];
        foreach ($results as $temp){
        $userID = $temp['userID'];    
        $firstName = $temp['firstName'];
        $lastName = $temp['lastName'];
        $userName = $temp['userName'];
        $gamerTag = $temp['gamerTag'];
        $user = new member($firstName, $lastName, $userName, $gamerTag, $userID,"");
        $member[$user->getUserName()] = $user;
    }
    return $member;
        
    }

    
      public static function addMember($member) {
        $db = Database::getDB();

        $firstName = $member->getFirstName();
        $lastName = $member->getLastName();
        $userName = $member->getUserName();
        $gamerTag = $member->getGamerTag();
        $password = $member->getPassword();
        $isAdmin = $member->getisAdmin();
       

        $query = 'INSERT INTO users
                 (firstName, lastName, userName, gamerTag, password, isAdmin)
              VALUES
                 (:firstName, :lastName, :userName, :gamerTag,:password, :isAdmin)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':userName', $userName);
        $statement->bindValue(':gamerTag', $gamerTag);
        $statement->bindValue(':password', $password);
         $statement->bindValue(':isAdmin', $isAdmin);
        $statement->execute();
        $statement->closeCursor();
    } 
    
    public static function addAdmin($member) {
        $db = Database::getDB();

        $firstName = $member->getFirstName();
        $lastName = $member->getLastName();
        $userName = $member->getUserName();
        $gamerTag = $member->getGamerTag();
        $password = $member->getPassword();
        $isAdmin = $member->getIsAdmin();

        $query = 'INSERT INTO users
                 (firstName, lastName, userName, gamerTag, password, isAdmin)
              VALUES
                 (:firstName, :lastName, :userName, :gamerTag,:password, isAdmin)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':userName', $userName);
        $statement->bindValue(':gamerTag', $gamerTag);
        $statement->bindValue(':password', $password);
        $statement->bindValue('isAdmin',  $isAdmin);
        $statement->execute();
        $statement->closeCursor();
    } 
    
   
   
    
   public static function is_valid_login($user_name, $password_) {
        $db = Database::getDB();
        $query = 'SELECT password FROM users WHERE userName = :userName';
        $statement=$db->prepare($query);
        $statement->bindValue(':userName',$user_name);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $hash = $row[0];
        return password_verify($password_, $hash);
    }
    
     public static function select_all()
    {
      $db = Database::getDB();
      
      $query = 'SELECT userID,firstName,lastName,userName,gamerTag FROM users';
      $statement = $db->prepare($query);
      $statement->execute();
      $results =  $statement->fetchAll();
    
      
      return self::arrayToMembers($results);
    }
    
      public static function get_current_userID($user_name) {
        $db = Database::getDB();

        $query = 'SELECT userID FROM users '
                . 'WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $user_name);
        $statement->execute();
        $data = $statement->fetch(); 
        $statement->closeCursor();
        $userData = $data[0];
        
        
        return $userData;
    }
        public static function get_current_adminStatus($user_name) {
        $db = Database::getDB();

        $query = 'SELECT isAdmin FROM users '
                . 'WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $user_name);
        $statement->execute();
        $data = $statement->fetch(); 
        $statement->closeCursor();
        $userData = $data[0];
        
        
        return $userData;
    }
}