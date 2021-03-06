<?php

class Connection{
    private static $conn;

    public static function getConn(){
        try{
            if(self::$conn == null){
                self::$conn = new PDO("mysql: host=localhost; dbname=vaga_dev;",'root','@@PsWORLD2099');
            }
            return self::$conn;
        }catch(PDOException $e){
            echo "Connection failed: ".$e->getMessage();
        }
    }
}