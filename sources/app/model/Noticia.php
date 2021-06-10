<?php 
class Noticia {
    //attributes
    private $idNoticia;
    private $titulo;
    private $subtitulo;
    private $data;
    private $conteudo;
    private $dataUltimaAtualizacao;
    private $idEditor;

    //getters e setters
    public function getIdNoticia(){
        return $this->noticia;
    }

    public function setIdNoticia($idNoticia){
        $this->idNoticia = $idNoticia;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getSubtitulo(){
        return $this->subtitulo;
    }

    public function setSubtitulo($subtitulo){
        $this->subtitulo = $subtitulo;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getConteudo(){
        return $this->conteudo;
    }

    public function setConteudo($conteudo){
        $this->conteudo = $conteudo;
    }

    public function getDataUltimaAtualizacao(){
        return $this->dataUltimaAtualizacao;
    }

    public function setDataUltimaAtualização($dataUltimaAtualizacao){
        $this->dataUltimaAtualizacao = $dataUltimaAtualizacao;
    }

    public function getIdEditor(){
        return $this->idEditor;
    }
    public function setIdEditor($idEditor){
        $this->idEditor = $idEditor;
    }
}