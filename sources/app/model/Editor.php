<?php
class Editor{
    //attributes
    private $idEditor;
    private $nome;
    private $login;
    private $senha;
    private $idCargo;

    //getters e setters
    public function getIdEditor(){
        return $this->idEditor;
    }

    public function setIdEditor($idEditor){
        $this->idEditor = $idEditor;
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

    public function getIdCargo(){
        return $this->idCargo;
    }

    public function setIdCargo($idCargo){
        $this->idCargo = $idCargo;
    }
    
}