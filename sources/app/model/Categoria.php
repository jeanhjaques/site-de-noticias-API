<?php
class Categoria
{
    //attributes
    private $nome;
    private $idcategoria;

    //getters and setters
    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getIdcategoria(){
        return $this->idcategoria;
    }

    public function setIdcategoria($idCategoria){
        $this->idcategoria = $idCategoria;
    }
}