<?php

require_once('database.php');
class usersDB {
    
        private static function arrayToMembers($results){
        $member = [];
        foreach ($results as $temp){
        $firstName = $temp['firstName'];
        $lastName = $temp['lastName'];
        $userName = $temp['userName'];
        $user = new member($firstName, $lastName, $userName, "", "","");
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
       

        $query = 'INSERT INTO users
                 (firstName, lastName, userName, gamerTag, password)
              VALUES
                 (:firstName, :lastName, :userName, :gamerTag,:password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':userName', $userName);
        $statement->bindValue(':gamerTag', $gamerTag);
        $statement->bindValue(':password', $password);
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
      
      $query = 'SELECT firstName,lastName,userName FROM users';
      $statement = $db->prepare($query);
      $statement->execute();
      $results =  $statement->fetchAll();
    
      
      return self::arrayToMembers($results);
    }
     
}