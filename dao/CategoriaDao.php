<?php
require_once 'model/Categoria.php';

class CategoriaDao{
    private $pdo;
    
    public function __construct(PDO $connection)
    {
        $this->pdo = $connection;
    }

    public function addCategoria(Categoria $categoria){
        $sql = $this->pdo->prepare("INSERT INTO categoria (id, nome) VALUES(default, :nome)");
        
        $sql->bindValue(':nome', $categoria->getNome());
        $sql->execute();

        $categoria->setId($this->pdo->lastInsertId());
 
        return $categoria;
    }

    public function getAllCategorias(){
        
        $categorias =[];

        $sql = $this->pdo->query("SELECT * FROM categoria ORDER BY id");

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


    
    public function findCategoriaById($id){
        $sql = $this->pdo->prepare("SELECT * FROM categoria WHERE id= :id");

        $sql->bindValue(':id', $id);
        $sql->execute();
        
        if($sql->rowCount() > 0 ){
            $data = $sql->fetch();

            $cat  = new Categoria;
            $cat->setId($data['id']);
            $cat->setNome($data['nome']);
                        
            return $cat;

        }else{
            return false;
        }

    }
    
    public function updateCategoria(Categoria $categoria){
        $sql = $this->pdo->prepare("UPDATE categoria SET nome = :nome WHERE id = :id");

        $sql->bindValue(':id', $categoria->getId());
        $sql->bindValue(':nome', $categoria->getNome());
        $sql->execute();
        
        return true;
    }

    public function deleteCategoria($id){
        $sql = $this->pdo->prepare("DELETE FROM categoria WHERE id = :id ");

        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}