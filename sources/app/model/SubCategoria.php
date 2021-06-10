<?php 

class SubCategoria{
    //attributes
    private $nomeSubCategoria;
    private $idSubCategoria;
    private $idCategoria;

    //getters and setters
    public function getNomeSubCategoria(){
        return $this->nomeSubCategoria;
    }

    public function setNomeSubCategoria($nomeSubCategoria){
        $this->nomeSubCategoria = $nomeSubCategoria;
    }

    public function getIdSubCategoria(){
        return $this->idSubCategoria;
    }

    public function setIdSubCategoria($idSubCategoria){
        $this->idSubCategoria = $idSubCategoria;
    }

    public function getIdCategoria(){
        return $this->idCategoria;  
    }

    public function setIdCategoria($idCategoria){
        $this->idCategoria = $idCategoria;
    }
}