<?php
include_once '../app/model/Categoria.php';
include_once '../app/model/CategoriaDAO.php';

class CategoriaController{
    public static function readAll(){
        $categorias = CategoriaDAO::read();

        $categoriasArray = [];
        
        foreach($categorias as $categoria){
            array_push($categoriasArray, ["id"=> $categoria->getIdcategoria(),"nome"=> $categoria->getNome()]);
        }

        return json_encode($categoriasArray);
    }

    public static function readById($id){
        $categorias = CategoriaDAO::readById($id);

        $categoriasArray = [];
        
        foreach($categorias as $categoria){
            array_push($categoriasArray, ["id"=> $categoria->getIdcategoria(),"nome"=> $categoria->getNome()]);
        }

        return json_encode($categoriasArray);
    }

    public static function cadastrarCategoria($categoria){
        $novaCategoria = new Categoria();

        $novaCategoria->setNome($categoria["nome"]);

        CategoriaDAO::create($novaCategoria);

        return true;
    }

    public static function atualizarCategoria($categoria){
        $novaCategoria = new Categoria();

        $novaCategoria->setIdcategoria($categoria->id);
        $novaCategoria->setNome($categoria->nome);

        CategoriaDAO::update($novaCategoria);

        return true;
    }

    public static function deleteCategoria($id){
        CategoriaDAO::delete($id);
        return true;
    }
}