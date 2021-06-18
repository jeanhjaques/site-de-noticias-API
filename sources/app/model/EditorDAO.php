<?php 
include_once "Editor.php";
include_once "EditorDAO.php";
include_once 'Conexao.php';

class EditorDAO{
    public static function create(Editor $editor){
        $sql = 'INSERT INTO Editor (nome, login, senha, idcargo) VALUES(?, ? , ? , ?)';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $editor->getNome());
        $stmt->bindValue(2, $editor->getLogin());
        $stmt->bindValue(3, $editor->getSenha());
        $stmt->bindValue(4, $editor->getIdcargo());

        $stmt->execute();
    }

    public static function read(){
        $sql = 'SELECT * FROM Editor';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->execute();

        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Editor");
            $obj = $stmt->fetchAll(); 
            return $obj;
        }
        else {
            return []; // retorna um array vazio caso não tenha nenhum item
        }
    }

    public static function update(Editor $editor){
        $sql = 'UPDATE Editor SET nome = ? , login = ?, senha = ? , idcargo = ? WHERE ideditor = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $editor->getNome());
        $stmt->bindValue(2, $editor->getLogin());
        $stmt->bindValue(3, $editor->getSenha());
        $stmt->bindValue(4, $editor->getIdcargo());
        $stmt->bindValue(5, $editor->getIdeditor());

        $stmt->execute();
    }

    public static function delete($id){
        $sql = 'DELETE FROM Editor WHERE ideditor = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();
    }

    //extras
    public static function readById($id){
        $sql = 'SELECT * FROM Editor WHERE ideditor = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Editor");
            $obj = $stmt->fetch(); 
            return $obj;
        }
        else {
            return []; // retorna um array vazio caso não tenha nenhum item
        }
    }

    public static function login($login, $senha){
        $sql = 'SELECT * FROM Editor WHERE login = ? AND senha = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $login);
        $stmt->bindValue(2, $senha);

        $stmt->execute();

        if($stmt->rowCount()>0){
            return true; // retorna true se um user com essas caracteristicas existem
        }
        else {
            return false; // retorna false se não existir usuário com essas características
        }
    }
}