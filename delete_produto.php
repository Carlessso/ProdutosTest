<?php
require 'conexao.php';
require 'dao/ProdutoDao.php';
require 'dao/ProdutoCategoriaDao.php';

$produtoDao          = new ProdutoDao($pdo);
$produtoCategoriaDao = new ProdutoCategoriaDao($pdo);

$id = filter_input(INPUT_GET, 'id');

if ($id){
    $produtoCategoriaDao->deleteByIdProduto($id);
    $produtoDao->deleteProduto($id);
}
header("Location: produto_list.php");
exit;

?>