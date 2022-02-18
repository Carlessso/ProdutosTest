<?php
    require 'conexao.php';
    require 'dao/ProdutoDao.php';
    
    //caso nao tenha id no get, tenta pelo post
    $id = filter_input(INPUT_GET, 'id')??filter_input(INPUT_POST, 'id');
  
    $produtoDao = new ProdutoDao($pdo);
    $produto    = $produtoDao->findProdutoById($id);

?>

<!doctype html>
<html ⚡>
<head>
  <title>Tezus | Backend Test | Add Product</title>
  <meta charset="utf-8">

<link  rel="stylesheet" type="text/css"  media="all" href="assets/css/style.css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
<meta name="viewport" content="width=device-width,minimum-scale=1">
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
    <h1 class="title new-item">New Product</h1>
    
    <form method="POST" action="produto_form.php">
      <div class="input-field">
        <label for="id" class="label">Product Id</label>
        <input value="<?php if ($id) {echo $produto->getId();}?>" readonly="readonly" type="text" id="id"  name="id" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="sku" class="label">Product SKU</label>
        <input value="<?php if ($id) {echo $produto->getSku();}?>" required="required" type="text" id="sku" name="sku" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="name" class="label">Product Name</label>
        <input value="<?php if ($id) {echo $produto->getNome();}?>" type="text" id="name" name="nome" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="price" class="label">Price</label>
        <input value="<?php if ($id) {echo $produto->getPreco();}?>" type="text" id="price" name="preco" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="quantity" class="label">Quantity</label>
        <input value="<?php if ($id) {echo $produto->getQuantidade();}?>" type="text" id="quantity" name="quantidade" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="category" class="label">Categories</label>
        <select multiple id="category" class="input-text" name="categorias">
          <option>Category 1</option>
          <option>Category 2</option>
          <option>Category 3</option>
          <option>Category 4</option>
        </select>
      </div>
      <div class="input-field">
        <label for="description" class="label">Description</label>
        <textarea id="description" name="descricao" class="input-text"><?php if ($id) {echo $produto->getDescricao();}?></textarea>
      </div>
      <div class="actions-form">
        <a href="produto_list.php" class="action back">Back</a>
        <input class="btn-submit btn-action" type="submit" value="Save Product" />
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
    $produtoDao = new ProdutoDao($pdo);
    
    $id         = filter_input(INPUT_POST,'id');
    $sku        = filter_input(INPUT_POST,'sku');
    $nome       = filter_input(INPUT_POST,'nome');
    $descricao  = filter_input(INPUT_POST,'descricao');
    $preco      = filter_input(INPUT_POST,'preco');
    $quantidade = filter_input(INPUT_POST,'quantidade');

    if(!empty($sku))
    {
      if ($id){
        $produto = $produtoDao->findProdutoById($id);
        
        $produto->setSku($sku);
        $produto->setNome($nome);
        $produto->setDescricao($descricao);
        $produto->setPreco($preco);
        $produto->setQuantidade($quantidade);

        $produtoDao->updateProduto($produto);

        echo("<script>setIdProduto({$id});</script>");
        echo("<script>setNomeProduto('{$nome}');</script>");
        echo("<script>setSkuProduto('{$sku}');</script>");
        echo("<script>setPrecoProduto('{$preco}');</script>");
        echo("<script>setDescricaoProduto('{$descricao}');</script>");
        echo("<script>setQuantidadeProduto('{$quantidade}');</script>");
        
      }else{
          $produto = new Produto;

          $produto->setSku($sku);
          $produto->setNome($nome);
          $produto->setDescricao($descricao);
          $produto->setPreco($preco);
          $produto->setQuantidade($quantidade);

          $produtoDao->addProduto($produto);

          $idProduto = $produto->getId();

          //seta o valor no campo para novo update
          echo("<script>setIdProduto({$idProduto});</script>");
          echo("<script>setNomeProduto('{$nome}');</script>");
          echo("<script>setSkuProduto('{$sku}');</script>");
          echo("<script>setPrecoProduto('{$preco}');</script>");
          echo("<script>setDescricaoProduto('{$descricao}');</script>");
          echo("<script>setQuantidadeProduto('{$quantidade}');</script>");     
      }
      
      require 'components/success.php';
    }

?>