<?php

require_once('database.php');
class followingDB {
    
    public static function addFollow( $follow) {
        $db = Database::getDB();
        $follower = $follow->getFollower();
        $following = $follow->getFollowing();
        
        $query = 'INSERT INTO following
                 ( follower, following)
              VALUES
                 ( :follower, :following)';
        $statement = $db->prepare($query);

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
    
    
   public static function getFollowing($user_name) {
        $db = Database::getDB();

        $query = 'SELECT following FROM following '
                . 'WHERE follower = :userName';
        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $user_name);
        $statement->execute();
      $results =  $statement->fetchAll();
      
      return $results;
    }
    

    public static function unfollow($follower, $following) {
        $db = Database::getDB();
        
        $query = 'DELETE FROM following '
                . 'where follower = :follower'
                . '&& following = :following';
        $statement = $db->prepare($query);
         $statement->bindValue(':follower', $follower);
         $statement->bindValue(':following', $following);
        $statement->execute();
        $statement->closeCursor();
          
        }
        
    
}