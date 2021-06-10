<?php 
class Cargo{
    //attributes
    private $idCargo;
    private $nome;
    private $nivelAcesso;

    //getters e setters
    public function getIdCargo(){
        return $this->idCargo;
    }

    public function setIdCargo($idCargo){
        $this->idCargo = $idCargo;
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