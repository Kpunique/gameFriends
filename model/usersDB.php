<?php

require_once('database.php');
class usersDB {
    
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
    
    
        public static function check_email($email_address) {
        $db = Database::getDB();
        
        $query = 'SELECT email_address FROM members '
                . 'where email_address = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email_address);
        $statement->execute();
        $email = $statement->fetch(); 
        $statement->closeCursor();
        
        if ($email[0] === $email_address) {
            return false;
        }else {
            return true;
        }
        
    }
    
    public static function check_username($username) {
        $db = Database::getDB();
        
        $query = 'SELECT username FROM users '
                . 'where username = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $username);
        $statement->execute();
        $new_username = $statement->fetch(); 
        $statement->closeCursor();
        
        if ($new_username[0] === $username) {
            return false;
        } else {
            return true;
        }

    }
    
        public static function check_password_($password_) {
        $db = Database::getDB();
        
        $query = 'SELECT password_ FROM users '
                . 'where password_ = :password_';
        $statement = $db->prepare($query);
        $statement->bindValue(':password_', $password_);
        $statement->execute();
        $new_password_ = $statement->fetch(); 
        $statement->closeCursor();
        
        if ($new_password_[0] === $password_) {
            return false;
        } else {
            return true;
        }

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
    
     public static function get_current_memberID($user_name) {
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
}