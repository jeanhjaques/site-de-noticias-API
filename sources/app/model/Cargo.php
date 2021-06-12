<?php 
class Cargo{
    //attributes
    private $idcargo;
    private $nome;
    private $nivelAcesso;

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

    public function getNivelAcesso(){
        return $this->nivelAcesso;
    }

    public function setNivelAcesso($nivelAcesso){
        $this->nivelAcesso = $nivelAcesso;
    }
}