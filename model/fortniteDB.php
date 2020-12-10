<?php

require_once('database.php');
class fortniteDB {
    
      public static function addfortnite($fortnite) {
        $db = Database::getDB();

        $userID = $fortnite->getUserID();
        $userName = $fortnite->getUserName();
        $gamerTag = $fortnite->getGamerTag();
        $kills = $fortnite->getKills();
       

        $query = 'INSERT INTO fortnite
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
        
   public static function update_info($userName, $kills) {
        $db = Database::getDB();
        $query = 'UPDATE fortnite ' . 
                 'SET kills = :kills ' .
                 'WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $userName);
        $statement->bindValue(':kills', $kills);
        $statement->execute();
        $statement->closeCursor();
    }
  
   

}