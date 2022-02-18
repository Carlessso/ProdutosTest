<?php
class Categoria{

    private $id;
    private $nome;

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

    //set category name
    public function setNome($nome){
        $this->nome = $nome;
    }

}