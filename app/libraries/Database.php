<?php

  class Database
 {

    private $hostName='localhost';
    private $dbName='hrms';
    private $user='root';
    private $pass='';

    private $stmt;
    private $connect;

    public function __construct()
    {
        $dsn='mysql:host='.$this->hostName.';dbname='.$this->dbName;

        try 
        {
            $this->connect=new PDO($dsn,$this->user,$this->pass);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
        }catch(PDOException $e)
        {
            die('connection feiled '.$e->getMessage());
        }

    }

    public function query($sql)
    {
        $this->stmt= $this->connect->prepare($sql);
    }

    public function bind($param, $value, $type = null)
    {
        if(is_null($type))
        {
            switch(true)
            {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }


    public function fetchAll()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function fetch()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function fetchColumn()
    {
        $this->execute();
        return $this->stmt->fetchColumn();
    }


    public function rowCount()
    {
        return $this->stmt->rowCount();
    }


}