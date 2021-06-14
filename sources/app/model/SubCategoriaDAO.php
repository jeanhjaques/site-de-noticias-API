<?php
include_once "SubCategoria.php";
include_once "Conexao.php";

class SubcategoriaDAO{
    public static function create(SubCategoria $subcategoria){
        $sql = "INSERT INTO subcategoria(nomesubcategoria, idcategoria) VALUES (?, ?)";

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $subcategoria->getNomesubcategoria());
        $stmt->bindValue(2, $subcategoria->getIdcategoria());

        $stmt->execute();
    }

    public static function read(){
        $sql = "SELECT * FROM subcategoria";

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->execute();

        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_CLASS, "SubCategoria");
            $obj = $stmt->fetchAll(); 
            return $obj;
        }
        else {
            return []; // retorna um array vazio caso não tenha nenhum item
        }
    }

    public static function update(SubCategoria $subcategoria){
        $sql = "UPDATE subcategoria SET nomesubcategoria = ?, idcategoria = ? WHERE idsubcategoria = ?";

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $subcategoria->getNomesubcategoria());
        $stmt->bindValue(2, $subcategoria->getIdcategoria());
        $stmt->bindValue(3, $subcategoria->getIdsubcategoria());

        $stmt->execute();
    }

    public static function delete($id){
        $sql = "DELETE FROM subcategoria WHERE idsubcategoria = ?";

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}