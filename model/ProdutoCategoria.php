<?php
class ProdutoCategoria{

    private $id;
    private $produto_id;
    private $categoria_id;

    //return the id
    public function getId(){
        return $this->id;
    }

    // set the id
    public function setId($id){
        $this->id = $id;
    }

    public function getIdCategoria(){
        return $this->categoria_id;
    }

    public function setIdCategoria($categoria_id){
        $this->categoria_id = $categoria_id;
    }

    public function getIdProduto(){
        return $this->produto_id;
    }

    public function setIdProduto($produto_id){
        $this->produto_id = $produto_id;
    }

}