<?php 
class Noticia {
    //attributes
    private $idnoticia;
    private $titulo;
    private $subtitulo;
    private $data;
    private $conteudo;
    private $dataultimaatualizacao;
    private $ideditor;

    //getters e setters
    public function getIdnoticia(){
        return $this->idnoticia;
    }

    public function setIdnoticia($idNoticia){
        $this->idnoticia = $idNoticia;
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

    public function getDataultimaatualizacao(){
        return $this->dataultimaatualizacao;
    }

    public function setDataultimaatualização($dataUltimaAtualizacao){
        $this->dataultimaatualizacao = $dataUltimaAtualizacao;
    }

    public function getIdeditor(){
        return $this->ideditor;
    }
    public function setIdeditor($idEditor){
        $this->ideditor = $idEditor;
    }
}