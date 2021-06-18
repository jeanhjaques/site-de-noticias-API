<?php
include_once "Categoria.php";
include_once "Conexao.php";

class CategoriaDAO{
    public static function create(Categoria $categoria){
        $sql = 'INSERT INTO categoria (nome) VALUES (?)';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $categoria->getNome());

        $stmt->execute();
    }
    public static function read(){
        $sql = 'SELECT * FROM categoria';

        $stmt = Conexao::getConnect()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Categoria");
            $obj = $stmt->fetchAll(); 
            return $obj;
        }
        else {
            return []; // retorna um array vazio caso não tenha nenhum item
        }
    }

    public static function update(Categoria $categoria){
        $sql = 'UPDATE categoria SET nome = ? WHERE idcategoria = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $categoria->getNome());
        $stmt->bindValue(2, $categoria->getIdcategoria());

        $stmt->execute();

    }
    public static function delete($id){
        $sql = 'DELETE FROM categoria WHERE idcategoria = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();
    }

    //extras
    public static function readById($id){
        $sql = 'SELECT * FROM categoria WHERE idcategoria = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $id);
        
        $stmt->execute();

        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Categoria");
            $obj = $stmt->fetchAll(); 
            return $obj;
        }
        else {
            return []; // retorna um array vazio caso não tenha nenhum item
        }
    }

}