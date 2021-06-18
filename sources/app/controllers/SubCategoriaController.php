<?php
include_once '../app/model/SubCategoria.php';
include_once '../app/model/SubCategoriaDAO.php';

class SubCategoriaController{
    //retorna todas os itens cadastrados
    public static function readAll(){
        $subcategorias = SubCategoriaDAO::read();

        $subcategoriasArray = [];
        foreach($subcategorias as $subcategoria){
            array_push($subcategoriasArray, ["id"=> $subcategoria->getIdSubCategoria(),"nome"=> $subcategoria->getNomesubcategoria(), "categoria"=> $subcategoria->getIdcategoria()]);
        }

        return json_encode($subcategoriasArray);
    }

    public static function readById($id){
        $subcategorias = SubCategoriaDAO::readById($id);

        $subcategoriasArray = [];
        foreach($subcategorias as $subcategoria){
            array_push($subcategoriasArray, ["id"=> $subcategoria->getIdSubCategoria(),"nome"=> $subcategoria->getNomesubcategoria(), "categoria"=> $subcategoria->getIdcategoria()]);
        }

        return json_encode($subcategoriasArray);
    }

    public static function cadastrarSubCategoria($subcategoria){
        $novaSubCategoria = new SubCategoria();

        $novaSubCategoria->setNomesubcategoria($subcategoria["nome"]);
        $novaSubCategoria->setIdcategoria($subcategoria["categoria"]);

        SubCategoriaDAO::create($novaSubCategoria);

        return true;
    }

    public static function atualizarSubCategoria($subcategoria){
        $novasubcategoria = new SubCategoria();

        $novasubcategoria->setIdsubcategoria($subcategoria->id);
        $novasubcategoria->setIdcategoria($subcategoria->categoria);
        $novasubcategoria->setNomesubcategoria($subcategoria->nome);

        SubCategoriaDAO::update($novasubcategoria);

        return true;
    }

    public static function deleteSubCategoria($id){
        SubCategoriaDAO::delete($id);
        return true;
    }
}