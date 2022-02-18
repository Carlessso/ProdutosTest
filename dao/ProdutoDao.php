<?php
require_once 'model/Produto.php';

class ProdutoDao{
    private $pdo;
    
    public function __construct(PDO $connection)
    {
        $this->pdo = $connection;
    }

    public function addProduto(Produto $produto){
        $sql = $this->pdo->prepare("INSERT INTO produto (id, sku, nome, descricao, preco, quantidade) VALUES(default, :sku, :nome, :descricao, :preco, :quantidade)");
        
        $sql->bindValue(':sku', $produto->getSku());
        $sql->bindValue(':nome', $produto->getNome());
        $sql->bindValue(':descricao', $produto->getDescricao());
        $sql->bindValue(':preco', $produto->getPreco());
        $sql->bindValue(':quantidade', $produto->getQuantidade());
        $sql->execute();

        $produto->setId($this->pdo->lastInsertId());
 
        return $produto;
    }

    public function getAllProdutos(){
        
        $produtos =[];

        $sql = $this->pdo->query("SELECT * FROM produto ORDER BY id");

        if($sql->rowCount() > 0 ){
            $result = $sql->fetchAll();

            foreach ($result as $produto) {
                $prod = new Produto;

                $prod->setId($produto['id']);
                $prod->setSku($produto['sku']);
                $prod->setNome($produto['nome']);
                $prod->setDescricao($produto['descricao']);
                $prod->setPreco($produto['preco']);
                $prod->setQuantidade($produto['quantidade']);

                $produtos[] = $prod;
            }
        }
        return $produtos;
    }


    
    public function findProdutoById($id){
        $sql = $this->pdo->prepare("SELECT * FROM produto WHERE id= :id");

        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if($sql->rowCount() > 0 ){
            $produto = $sql->fetch();

            $prod  = new Produto;

            $prod->setId($produto['id']);
            $prod->setSku($produto['sku']);
            $prod->setNome($produto['nome']);
            $prod->setDescricao($produto['descricao']);
            $prod->setPreco($produto['preco']);
            $prod->setQuantidade($produto['quantidade']);
      
            return $prod;

        }else{
            return false;
        }

    }
    
    public function updateProduto(Produto $produto){
        $sql = $this->pdo->prepare("UPDATE produto SET sku = :sku, nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade WHERE id = :id");

        $sql->bindValue(':id', $produto->getId());
        $sql->bindValue(':sku', $produto->getSku());
        $sql->bindValue(':nome', $produto->getNome());
        $sql->bindValue(':descricao', $produto->getDescricao());
        $sql->bindValue(':preco', $produto->getPreco());
        $sql->bindValue(':quantidade', $produto->getQuantidade());
        $sql->execute();
        
        return true;
    }

    public function deleteProduto($id){
        $sql = $this->pdo->prepare("DELETE FROM produto WHERE id = :id ");

        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}