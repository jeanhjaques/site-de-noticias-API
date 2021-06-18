<?php
include_once '../app/model/NoticiaDAO.php';

class NoticiaSubCategoriaController{
    //retorna todas os itens cadastrados
    public static function readAll(){
        $noticias = noticiaDAO::readSubCategoriaNoticia();

        $noticiasArray = [];

        foreach($noticias as $noticia){
            array_push($noticiasArray, ["idnoticia"=> $noticia["idnoticia"],"idSubCategoria"=> $noticia["idsubcategoria"]]);
        }

        return json_encode($noticiasArray);
    }


    public static function cadastrarNoticiaSubCategoria($noticiaSubcategoria){
        NoticiaDAO::createSubCategoriaNotica($noticiaSubcategoria["idNoticia"], $noticiaSubcategoria["idSubcategoria"]);
        return true;
    }

    public static function deleteNoticiaSubCategoria($noticiaSubcategoria){
        NoticiaDAO::deleteSubCategoriaNotica($noticiaSubcategoria->idNoticia, $noticiaSubcategoria->idSubcategoria);
        return true;
    }
}