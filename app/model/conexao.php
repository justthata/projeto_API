<?php
namespace App\model;

class Conexao{
    private static $instancia;

    public static function getConexao(){
        if(!isset(self::$instancia)){
            self::$instancia = new \PDO("mysql:host=localhost;dbname=projeto_api","root","");
        }
        return self::$instancia;
    }
}