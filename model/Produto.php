<?php
class Produto{

    private $id;
    private $nome;
    private $descricao;
    private $preco;
    private $quantidade;

    //return the id
    public function getId(){
        return $this->id;
    }

    // set the id
    public function setId($id){
        $this->id = $id;
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

    //get the price
    public function getQuantidade(){
        return $this->quantidade;
    }

    //set price
    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

}