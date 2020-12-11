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
        $userID = $temp['userID'];    
        $userName = $temp['userName'];
        $gamerTag = $temp['gamerTag'];
        $kills = $temp['kills'];
        $reader = new apex( $userName, $gamerTag, $userID, $kills);
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
      
      $query = 'SELECT userName,gamerTag,kills FROM apex';
      $statement = $db->prepare($query);
      $statement->execute();
      $results =  $statement->fetchAll();
    
      
      return self::arrayToApex($results);
    }

}