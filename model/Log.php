<?php
class Log
{
    private $id;
    private $logdate;
    private $tablename;
    private $old_record;
    private $new_record;

    //return the id
    public function getId(){
        return $this->id;
    }

    // set the id
    public function setId($id){
        $this->id = $id;
    }

    public function getLogDate(){
        return $this->logdate;
    }

    public function setLogDate($logdate){
        $this->logdate = $logdate;
    }

    public function getTableName(){
        return $this->tablename;
    }

    public function setTableName($tablename){
        $this->tablename = $tablename;
    }

    public function getOldRecord(){
        return $this->old_record;
    }

    public function setOldRecord($old_record){
        $this->old_record = $old_record;
    }

    public function getNewRecord(){
        return $this->new_record;
    }

    public function setNewRecord($new_record){
        $this->new_record = $new_record;
    }

}