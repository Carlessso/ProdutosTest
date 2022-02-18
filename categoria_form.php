<?php
    require 'conexao.php';
    require 'dao/CategoriaDao.php';
    
    //caso nao tenha id no get, tenta pelo post
    $id = filter_input(INPUT_GET, 'id')??filter_input(INPUT_POST, 'id');
  
    $categoriaDao = new CategoriaDao($pdo);
    $categoria = $categoriaDao->findCategoriaById($id);

?>


<!doctype html>
<html ⚡>
<head>
  <title>Tezus | Backend Test | Add Category</title>
  <meta charset="utf-8">

<link  rel="stylesheet" type="text/css"  media="all" href="assets/css/style.css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
<meta name="viewport" content="width=device-width,minimum-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
<script src="js/produtos.js"></script>
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<script async src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script></head>
  <!-- Header -->
<amp-sidebar id="sidebar" class="sample-sidebar" layout="nodisplay" side="left">
  <div class="close-menu">
    <a on="tap:sidebar.toggle">
      <img src="assets/images/bt-close.png" alt="Close Menu" width="24" height="24" />
    </a>
  </div>
  <a href="index.php"><img src="assets/images/menu-go-jumpers.png" alt="Welcome" width="200" height="43" /></a>
  <div>
    <ul>
      <li><a href="categoria_list.php" class="link-menu">Categorias</a></li>
      <li><a href="produto_list.php" class="link-menu">Produtos</a></li>
    </ul>
  </div>
</amp-sidebar>
<header>
  <div class="go-menu">
    <a on="tap:sidebar.toggle">☰</a>
    <a href="index.php" class="link-logo"><img src="assets/images/go-logo.png" alt="Welcome" width="69" height="430" /></a>
  </div>
  <div class="right-box">
    <span class="go-title">Administration Panel</span>
  </div>    
</header>  
<!-- Header -->
  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item">New Category</h1>
    
    <form method="POST" action="categoria_form.php">
      <div class="input-field">
        <label for="category-name" class="label">Category Name</label>
        <input value="<?php if ($id) {echo $categoria->getNome();} ?>"required="required" type="text" name="nome" id="category-name" class="input-text" />
        
      </div>
      <div class="input-field">
        <label for="category-code" class="label">Category Id</label>
        <input readonly="readonly" type="numeric" name="id" id="category-code" class="input-text" value="<?php   if ($id) {echo $categoria->getId();} ?>"/>
        
      </div>
      <div class="actions-form">
        <a href="categoria_list.php" class="action back">Back</a>
        <input class="btn-submit btn-action"  type="submit" value="Save" />
      </div>
    </form>
  </main>
  <!-- Main Content -->

  <!-- Footer -->
<footer>
	<div class="footer-image">
	  <img src="assets/images/go-jumpers.png" width="119" height="26" alt="Go Jumpers" />
	</div>
	<div class="email-content">
	  <span>go@jumpers.com.br</span>
	</div>
</footer>
 <!-- Footer --></body>
</html>

<?php
    $categoriaDao = new CategoriaDao($pdo);
    
    $id = filter_input(INPUT_POST,'id');
    $nome = filter_input(INPUT_POST,'nome');

    if(!empty($nome))
    {
      if ($id){
        $categoria = $categoriaDao->findCategoriaById($id);
        
        $categoria->setNome($nome);
        $categoriaDao->updateCategoria($categoria);

        echo("<script>setIdCategoria({$id});</script>");
        echo("<script>setNomeCategoria('{$nome}');</script>");
        
      }else{
          $categoria = new Categoria;

          $categoria->setNome($nome);
          $categoriaDao->addCategoria($categoria);

          $idCategoria = $categoria->getId();

          //seta o valor no campo para novo update
          echo("<script>setIdCategoria({$idCategoria});</script>");
          echo("<script>setNomeCategoria('{$nome}');</script>");        
      }
      
      require 'components/success.php';
    }

?>