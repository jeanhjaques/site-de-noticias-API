<?php 
class Cargo{
    //attributes
    private $idcargo;
    private $nome;
    private $nivelacesso;

    //getters e setters
    public function getIdcargo(){
        return $this->idcargo;
    }

    public function setIdcargo($idcargo){
        $this->idcargo = $idcargo;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNivelacesso(){
        return $this->nivelacesso;
    }

    public function setNivelacesso($nivelAcesso){
        $this->nivelacesso = $nivelAcesso;
    }
}