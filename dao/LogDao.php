<?php
require_once 'model/Log.php';

class LogDao{
    private $pdo;
    
    public function __construct(PDO $connection)
    {
        $this->pdo = $connection;
    }

    public function log($tablename, $old_record, $new_record){
        $sql = $this->pdo->prepare("INSERT INTO log VALUES(default, default, :tablename, :old_record, :new_record)");
        
        $sql->bindValue(':tablename', $tablename);
        $sql->bindValue(':old_record', $old_record);
        $sql->bindValue(':new_record', $new_record);
        $sql->execute();

        return true;
    }
}