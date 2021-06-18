<?php
include_once "Cargo.php";
include_once "Conexao.php";

class CargoDAO{
    public static function create(Cargo $cargo){
        $sql = 'INSERT INTO Cargo (nome, nivelacesso) VALUES(?, ?)';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $cargo->getNome());
        $stmt->bindValue(2, $cargo->getNivelacesso());

        $stmt->execute();
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

    public static function update(Cargo $cargo){
        $sql = 'UPDATE Cargo SET nome = ?, nivelAcesso = ? WHERE idcargo = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $cargo->getNome());
        $stmt->bindValue(2, $cargo->getNivelacesso());
        $stmt->bindValue(3, $cargo->getIdcargo());

        $stmt->execute();
    }

    public static function delete($id){
        $sql = 'DELETE FROM Cargo WHERE idcargo = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();
    }

    //extras
    public static function readById($id){
        $sql = 'SELECT * FROM Cargo WHERE idcargo = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $id);

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