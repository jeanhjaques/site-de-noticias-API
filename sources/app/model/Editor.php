<?php
class Editor{
    //attributes
    private $ideditor;
    private $nome;
    private $login;
    private $senha;
    private $idcargo;

    //getters e setters
    public function getIdeditor(){
        return $this->ideditor;
    }

    public function setIdEditor($idEditor){
        $this->ideditor = $idEditor;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getSenha(){
        return $this->senha;
    }
    
    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getIdcargo(){
        return $this->idcargo;
    }
    
    public function setIdcargo($idcargo){
        $this->idcargo = $idcargo;
    }
    
}