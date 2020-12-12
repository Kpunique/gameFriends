<?php

require_once('database.php');
class followingDB {
    public static function addFollow($following) {
        $db = Database::getDB();

        $userID = $following->getUserID();
        $userName = $following->getUserName();
        $followUserName = $following>getFollowUserName();
       
       

        $query = 'INSERT INTO following
                 (userID, userName, followUserName)
              VALUES
                 (:userID, :userName, :followUserName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->bindValue(':userName', $userName);
        $statement->bindValue(':followUserName', $followUserName);
        $statement->execute();
        $statement->closeCursor();
    }
    
    private static function arrayToFollowing($results){
        $following = [];
        foreach ($results as $temp){    
        $followUserName = $temp['followUserName'];
        $reader = new following( "", "", $followUserName);
        $following [$reader->getUserName()] = $reader;
    }
    return following;
        
    }
    
    
     public static function select_all()
    {
      $db = Database::getDB();
      
      $query = 'SELECT followUserName FROM following';
      $statement = $db->prepare($query);
      $statement->execute();
      $results =  $statement->fetchAll();
    
      
      return self::arrayToFollowing($results);
    }

}