<?php
include_once 'Noticia.php';
include_once 'Conexao.php';

class NoticiaDAO{
    public static function create(Noticia $noticia){
        $sql = 'INSERT INTO noticia(titulo, subtitulo, data, conteudo, dataultimaatualizacao, ideditor) VALUES(?, ?, current_timestamp, ?, current_timestamp, ?)';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $noticia->getTitulo());
        $stmt->bindValue(2, $noticia->getSubtitulo());
        $stmt->bindValue(3, $noticia->getConteudo());
        $stmt->bindValue(4, $noticia->getIdeditor());

        $stmt->execute();
    }

    public static function read(){
        $sql = 'SELECT * FROM noticia';
        
        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->execute();

        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Noticia");
            $obj = $stmt->fetchAll(); 
            return $obj;
        }
        else {
            return []; // retorna um array vazio caso não tenha nenhum item
        }
    }

    public static function update(Noticia $noticia){
        $sql = 'UPDATE noticia SET titulo = ?, subtitulo = ?, conteudo =? , dataultimaatualizacao= current_timestamp, ideditor = ? WHERE idnoticia = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $noticia->getTitulo());
        $stmt->bindValue(2, $noticia->getSubtitulo());
        $stmt->bindValue(3, $noticia->getConteudo());
        $stmt->bindValue(4, $noticia->getIdeditor());
        $stmt->bindValue(5, $noticia->getIdnoticia());

        $stmt->execute();
        

    }

    public static function delete($id){
        $sql = 'DELETE FROM noticia WHERE idnoticia = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();
    }

    //extras
    public static function readById($id){
        $sql = 'SELECT * FROM noticia WHERE idnoticia = ?';
        
        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Noticia");
            $obj = $stmt->fetchAll(); 
            return $obj;
        }
        else {
            return []; // retorna um array vazio caso não tenha nenhum item
        }
    }

    //lê todas as relações
    public static function readSubCategoriaNoticia(){
        $sql = 'SELECT * FROM subcategorianoticia';
    
        $stmt = Conexao::getConnect()->prepare($sql);
    
        $stmt->execute();

        if($stmt->rowCount()>0){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        else {
            return []; // retorna um array vazio caso não tenha nenhum item
        }
    }

    //relaciona a noticia a uma subcategoria
    public static function createSubCategoriaNotica($idNoticia, $idSubCategoria){
        $sql = 'INSERT INTO subcategorianoticia(idnoticia, idsubcategoria) VALUES(?,?)';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $idNoticia);
        $stmt->bindValue(2, $idSubCategoria);

        $stmt->execute();
    }

    //deleta a relacao entre a noticia e a subcategoria
    public static function deleteSubCategoriaNotica($idNoticia, $idSubCategoria){
        $sql = 'DELETE FROM subcategorianoticia WHERE idnoticia = ? AND idsubcategoria = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $idNoticia);
        $stmt->bindValue(2, $idSubCategoria);

        $stmt->execute();
    }
}