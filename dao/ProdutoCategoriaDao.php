<?php
require_once 'model/ProdutoCategoria.php';
require_once 'model/Categoria.php';

class ProdutoCategoriaDao{
    private $pdo;
    
    public function __construct(PDO $connection)
    {
        $this->pdo = $connection;
    }

    public function addProdutoCategoria(ProdutoCategoria $produtoCategoria){
        $sql = $this->pdo->prepare("INSERT INTO produto_categoria (id, categoria_id, produto_id) VALUES(default, :categoria_id, :produto_id)");
        
        $sql->bindValue(':categoria_id', $produtoCategoria->getIdCategoria());
        $sql->bindValue(':produto_id', $produtoCategoria->getIdProduto());
        $sql->execute();

        $produtoCategoria->setId($this->pdo->lastInsertId());
 
        return $produtoCategoria;
    }
    
    public function getByProduto($id_produto){
        $categorias = [];

        $sql = $this->pdo->prepare("SELECT categoria.* FROM produto_categoria, categoria WHERE produto_id = :id AND categoria_id = categoria.id");

        $sql->bindValue(':id', $id_produto);
        $sql->execute();
        
        if($sql->rowCount() > 0 ){
            $result = $sql->fetchAll();

            foreach ($result as $categoria) {
                $cat = new Categoria;
                $cat->setId($categoria['id']);
                $cat->setNome($categoria['nome']);

                $categorias[] = $cat;
            }

        }

        return $categorias;

    }

    public function deleteByIdProduto($id_produto){
        $sql = $this->pdo->prepare("DELETE FROM produto_categoria WHERE produto_id = :id ");

        $sql->bindValue(':id', $id_produto);
        $sql->execute();
    }
}