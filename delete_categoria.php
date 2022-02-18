<?php
require 'conexao.php';
require 'dao/CategoriaDao.php';

$categoriaDao = new CategoriaDao($pdo);

$id = filter_input(INPUT_GET, 'id');

if ($id){
    $categoriaDao->deleteCategoria($id);
}
header("Location: categoria_list.php");
exit;

?>