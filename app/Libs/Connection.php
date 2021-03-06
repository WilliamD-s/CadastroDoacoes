<?php

class Connection{
    private static $conn;

    public static function getConn(){
        try{
            if(self::$conn == null){
                self::$conn = new PDO("mysql: host=seu_host; dbname=seu_db;",'seu_user','sua_senha');
            }
            return self::$conn;
        }catch(PDOException $e){
            echo "Connection failed: ".$e->getMessage();
        }
    }
}