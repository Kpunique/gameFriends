<?php

require_once('database.php');
class apexDB {
    public static function addApex($apex) {
        $db = Database::getDB();

        $userID = $apex->getUserID();
        $userName = $apex->getUserName();
        $gamerTag = $apex->getGamerTag();
        $kills = $apex->getKills();
       

        $query = 'INSERT INTO apex
                 (userID, userName, gamerTag, kills)
              VALUES
                 (:userID, :userName, :gamerTag, :kills)';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->bindValue(':userName', $userName);
        $statement->bindValue(':gamerTag', $gamerTag);
        $statement->bindValue(':kills', $kills);
        $statement->execute();
        $statement->closeCursor();
    }
    
    private static function arrayToApex($results){
        $apex = [];
        foreach ($results as $temp){    
        $userName = $temp['userName'];
        $gamerTag = $temp['gamerTag'];
        $kills = $temp['kills'];
        $reader = new apex( $userName, $gamerTag, $kills, "","");
        $apex [$reader->getUserName()] = $reader;
    }
    return $apex;
        
    }
    
   public static function update_info($userName, $kills) {
        $db = Database::getDB();
        $query = 'UPDATE apex ' . 
                 'SET kills = :kills ' .
                 'WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $userName);
        $statement->bindValue(':kills', $kills);
        $statement->execute();
        $statement->closeCursor();
    }
    
     public static function select_all()
    {
      $db = Database::getDB();
      
      $query = 'SELECT * FROM apex';
      $statement = $db->prepare($query);
      $statement->execute();
      $results =  $statement->fetchAll();
    
      
      return self::arrayToApex($results);
    }
    
     public static function get_current_user_kills($user_name) {
        $db = Database::getDB();

        $query = 'SELECT kills FROM apex '
                . 'WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $user_name);
        $statement->execute();
        $data = $statement->fetch(); 
        $statement->closeCursor();
        
        
        return $data;
    }
    
    
     public static function get_current_apex_users($userKills) {
        $db = Database::getDB();

        $query = 'SELECT * FROM apex '
                . 'WHERE kills <= :userKills + 100';
        $statement = $db->prepare($query);
        $statement->bindValue(':userKills', $userKills);
        $statement->execute();
        $results =  $statement->fetchAll();
    
      
      return self::arrayToApex($results);
    }
    
     public static function get_current_user_data($userName) {
        $db = Database::getDB();

        $query = 'SELECT firstName, lastName, gamerTag FROM users '
                . 'WHERE userName = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $data = $statement->fetch(); 
        $statement->closeCursor();
        
        
        return $data;
    }

}