<?php

class DB{
    public static function conectar(){
        try{
            $pdo = new pdo('mysql: host=localhost; dbname=shopping; charset=utf8','root','');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }
}

?>