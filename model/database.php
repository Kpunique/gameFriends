<?php
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=gameFriends';
    private static $username_ = 'root';
    private static $password_ = '';
    private static $db;
    
    private function __construct() {}
    
    public static function getDB () {
        if (!isset(self::$db)) {
            try{
                self::$db = new PDO(self::$dsn,
                                    self::$username_,
                                    self::$password_);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                $error_message = $e->getMessage();
                include('errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}

