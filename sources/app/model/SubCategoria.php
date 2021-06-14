<?php 

class SubCategoria{
    //attributes
    private $nomesubcategoria;
    private $idsubcategoria;
    private $idcategoria;

    //getters and setters
    public function getNomesubcategoria(){
        return $this->nomesubcategoria;
    }

    public function setNomesubcategoria($nomeSubCategoria){
        $this->nomesubcategoria = $nomeSubCategoria;
    }

    public function getIdsubcategoria(){
        return $this->idsubcategoria;
    }

    public function setIdsubcategoria($idsubcategoria){
        $this->idsubcategoria = $idsubcategoria;
    }

    public function getIdcategoria(){
        return $this->idcategoria;
    }

    public function setIdcategoria($idCategoria){
        $this->idcategoria = $idCategoria;
    }
}