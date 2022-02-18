<?php
class Produto{

    private $id;
    private $sku;
    private $nome;
    private $descricao;
    private $preco;
    private $quantidade;
    private $file_path;

    //return the id
    public function getId(){
        return $this->id;
    }

    // set the id
    public function setId($id){
        $this->id = $id;
    }

    //return the id
    public function getSku(){
        return $this->sku;
    }

    // set the id
    public function setSku($sku){
        $this->sku = $sku;
    }

    //get the name
    public function getNome(){
        return $this->nome;
    }

    //set product name
    public function setNome($nome){
        $this->nome = $nome;
    }

    //get the name
    public function getDescricao(){
        return $this->descricao;
    }

    //set product name
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    //get the price
    public function getPreco(){
        return $this->preco;
    }

    //set price
    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

    //get the price
    public function getFilePath(){
        return $this->file_path;
    }

    //set price
    public function setFilePath($path){
        $this->file_path = $path;
    }
    

}