<?php
include_once "Cargo.php";
include_once "Conexao.php";

class CargoDAO{
    public static function create(Cargo $cargo){
        $sql = 'INSERT INTO Cargo (nome, nivelacesso) VALUES(?, ?)';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $cargo->getNome());
        $stmt->bindValue(2, $cargo->getNivelAcesso());

        $stmt->execute();

        return "sucess";
    }

    public static function read(){
        $sql = 'SELECT * FROM Cargo';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->execute();
        
        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Cargo");
            $obj = $stmt->fetchAll(); 
            return $obj;
        }
        else {
            return []; // retorna um array vazio caso não tenha nenhum item
        }
    }
}