<?php
//classe responsável pela configuração da conexão com o banco de dados
error_reporting(E_ALL);
class Conexao{
    private static $instance;

    public static function getConnect(){
        if(!isset(self::$instance)){
            self::$instance = new \PDO('pgsql:host=localhost;port=5432;dbname=noticias;', 'postgres', '201619060485');
        }
        return self::$instance;
    }
}