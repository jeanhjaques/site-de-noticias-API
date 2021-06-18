<?php
include_once '../app/model/Noticia.php';
include_once '../app/model/NoticiaDAO.php';

class NoticiaController{
    //retorna todas os itens cadastrados
    public static function readAll(){
        $noticias = noticiaDAO::read();

        $noticiasArray = [];
        foreach($noticias as $noticia){
            array_push($noticiasArray, ["id"=> $noticia->getIdnoticia(),"titulo"=> $noticia->getTitulo(), "subtitulo"=> $noticia->getSubtitulo(), "data"=> $noticia->getData(), "conteudo"=> $noticia->getConteudo(), "dataUltimaAtualizacao"=> $noticia->getDataultimaAtualizacao(), "idEditor"=> $noticia->getIdeditor()]);
        }

        return json_encode($noticiasArray);
    }

    public static function readById($id){
        $noticias = noticiaDAO::readById($id);

        $noticiasArray = [];
        foreach($noticias as $noticia){
            array_push($noticiasArray, ["id"=> $noticia->getIdnoticia(),"titulo"=> $noticia->getTitulo(), "subtitulo"=> $noticia->getSubtitulo(), "data"=> $noticia->getData(), "conteudo"=> $noticia->getConteudo(), "dataUltimaAtualizacao"=> $noticia->getDataultimaAtualizacao(), "idEditor"=> $noticia->getIdeditor()]);
        }

        return json_encode($noticiasArray);
    }

    public static function cadastrarNoticia($noticia){
        $novaNoticia = new Noticia();

        $novaNoticia->setTitulo($noticia["titulo"]);
        $novaNoticia->setSubtitulo($noticia["subtitulo"]);
        $novaNoticia->setConteudo($noticia["conteudo"]);
        $novaNoticia->setIdeditor($noticia["editor"]);

        NoticiaDAO::create($novaNoticia);

        return true;
    }

    public static function atualizarNoticia($noticia){
        $novaNoticia = new Noticia();

        $novaNoticia->setIdnoticia($noticia->id);
        $novaNoticia->setTitulo($noticia->titulo);
        $novaNoticia->setSubtitulo($noticia->subtitulo);
        $novaNoticia->setConteudo($noticia->conteudo);
        $novaNoticia->setIdeditor($noticia->editor);

        NoticiaDAO::update($novaNoticia);

        return true;
    }

    public static function deleteNoticia($id){
        NoticiaDAO::delete($id);
        return true;
    }
}