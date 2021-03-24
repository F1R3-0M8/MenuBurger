<?php

class Database{
    
    private static $dbHost = "localhost";
    private static $dbName = "balemqpk_database";
    private static $dbUser = "balemqpk_user";
    private static  $dbUserPassword = "Basededonne63";
    
    private static $connection = null;
    
    public static function connect(){
        
        try{
         self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName,self::$dbUser,self::$dbUserPassword);
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
        return self::$connection;
    }
    
    function disconnect(){
        self::$connection = null;
    }   
}

?>