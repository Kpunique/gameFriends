<?php

require_once('database.php');
class followingDB {
    
    public static function addFollow($followID, $follower, $following) {
        $db = Database::getDB();

        $query = 'INSERT INTO following
                 (followID, follower, following)
              VALUES
                 (:followID, :follower, :following)';
        $statement = $db->prepare($query);
        $statement->bindValue(':followID', $followID);
        $statement->bindValue(':follower', $follower);
        $statement->bindValue(':following', $following);
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