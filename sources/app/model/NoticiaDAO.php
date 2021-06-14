<?php
include_once 'Noticia.php';
include_once 'Conexao.php';

class NoticiaDAO{
    public static function create(Noticia $noticia){
        $sql = 'INSERT INTO noticia(titulo, subtitulo, data, conteudo, dataultimaatualização, ideditor) VALUES(?, ?, current_timestamp, ?, current_timestamp, ?';

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
        $sql = 'UPDATE noticia SET titulo = ?, subtitulo = ?, data = ?, conteudo =? , dataultimaatualização = current_timestamp, ideditor = ? WHERE idnoticia = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $noticia->getTitulo());
        $stmt->bindValue(2, $noticia->getSubtitulo());
        $stmt->bindValue(3, $noticia->getData());
        $stmt->bindValue(4, $noticia->getConteudo());
        $stmt->bindValue(5, $noticia->getIdeditor());
        $stmt->bindValue(6, $noticia->getIdnoticia());

        $stmt->execute();
        

    }

    public static function delete($id){
        $sql = 'DELETE FROM noticia WHERE idnotica = ?';

        $stmt = Conexao::getConnect()->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}