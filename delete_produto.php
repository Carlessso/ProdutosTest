<?php
require 'conexao.php';
require 'dao/ProdutoDao.php';

$produtoDao = new ProdutoDao($pdo);

$id = filter_input(INPUT_GET, 'id');

if ($id){
    $produtoDao->deleteProduto($id);
}
header("Location: produto_list.php");
exit;

?>