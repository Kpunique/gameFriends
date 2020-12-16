<?php
require_once('database.php');
class CommentDB {
    
    public static function select_user_comments($user_wall)
    {
      $db = Database::getDB();
      
      $query = 'SELECT poster, comment, date FROM comments '
              . 'WHERE user_wall = :user_wall '
              . 'ORDER BY date';
      $statement = $db->prepare($query);
      $statement->bindValue(':user_wall', $user_wall);
      $statement->execute();
      $results =  $statement->fetchAll();
      
      return $results;
    }
    
    public static function insert($poster, $user_wall, $comment) {
        $db = Database::getDB();
        
        
        $query = 'INSERT INTO comments
                (poster, user_wall, comment)
            VALUES
                (:poster, :user_wall, :comment)';
        $statement = $db->prepare($query);
        $statement->bindValue(':poster', $poster);
        $statement->bindValue(':user_wall', $user_wall);
        $statement->bindValue(':comment', $comment);
        $statement->execute();
        $statement->closeCursor();
        
    }
    
}