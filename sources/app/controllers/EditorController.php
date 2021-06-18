<?php 
include_once '../app/model/Editor.php';
include_once '../app/model/EditorDAO.php';

class EditorController{
    
    //retorna todas os itens cadastrados
    public static function readAll(){
        $editores = EditorDAO::read();

        $editoresArray = [];
        foreach($editores as $editor){
            array_push($editoresArray, ["id"=> $editor->getIdeditor(),"nome"=> $editor->getNome(), "login"=> $editor->getLogin(), "senha"=> $editor->getSenha(), "cargo"=> $editor->getIdcargo()]);
        }

        return json_encode($editoresArray);
    }

    public static function readById($id){
        $editor = EditorDAO::readById($id);

        $editoresArray = [];
        array_push($editoresArray, ["id"=> $editor->getIdeditor(),"nome"=> $editor->getNome(), "login"=> $editor->getLogin(), "senha"=> $editor->getSenha(), "cargo"=> $editor->getIdcargo()]);

        return json_encode($editoresArray);
    }

    public static function cadastrarEditor($editor){
        $novoEditor = new Editor();

        $novoEditor->setNome($editor["nome"]);
        $novoEditor->setLogin($editor["login"]);
        $novoEditor->setSenha(md5($editor["senha"]));
        $novoEditor->setIdcargo($editor["cargo"]);

        EditorDAO::create($novoEditor);

        return true;
    }

    public static function atualizarEditor($editor){
        $novoEditor = new Editor();

        $novoEditor->setIdEditor($editor->id);
        $novoEditor->setNome($editor->nome);
        $novoEditor->setLogin($editor->login);
        $novoEditor->setSenha(md5($editor->senha));
        $novoEditor->setIdcargo($editor->cargo);

        EditorDAO::update($novoEditor);

        return true;
    }

    public static function deleteEditor($id){
        EditorDAO::delete($id);
        return true;
    }
}