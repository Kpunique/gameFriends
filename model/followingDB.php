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
        
         public static function deleteUser($gamerTag) {
        $db = Database::getDB();
        
        $query = 'DELETE FROM following '
                . 'where follower = :gamerTag'
                . 'OR following = :gamerTag';
        $statement = $db->prepare($query);
         $statement->bindValue(':gamerTag', $gamerTag);
        $statement->execute();
        $statement->closeCursor();
          
        }
        
    
}