<?php
  class requestsData 
  {
    public $Database;
    
    public function __construct() 
    {
        $this->Database = new Database();
    }

    public function getUsers()
    {
        $this->Database->query("SELECT * FROM requests WHERE status = 'pending' ");

        $Users = $this->Database->fetchAll(); 
        
        return $Users;
    }

    public function Update($Id ,$emp, $type, $desr ,$Newtype)
    {
        $this->Database->query(" UPDATE requests SET status = :newType WHERE status = 'pending' AND id = :id AND emp = :emp  AND type = :type AND description = :desr ");
        $this->Database->bind(':newType', $Newtype);
        $this->Database->bind(':id', $Id);
        $this->Database->bind(':emp', $emp);
        $this->Database->bind(':type', $type);
        $this->Database->bind(':desr', $desr);
        $this->Database->execute(); 
    }

    public function getEmpAll()
    {
        $this->Database->query("SELECT * FROM requests Where  status != 'pending' ");

        $Users = $this->Database->fetchAll();  
        
        return $Users;
    }

    public function getData($emp)
    {
        $this->Database->query("SELECT * FROM requests WHERE emp = :emp ");
        $this->Database->bind(':emp', $emp);

        $Users = $this->Database->fetchAll(); 
        
        return $Users;
    }

    public function checkRequest($emp, $type)
    {
        $this->Database->query("SELECT * FROM requests WHERE emp = :emp AND type = :type AND status = 'pending'");
        $this->Database->bind(':emp', $emp);
        $this->Database->bind(':type', $type);
        $this->Database->execute();

        return $this->Database->rowCount() > 0;
   }

   public function insertData($emp, $type, $dec)
{
    $this->Database->query('INSERT INTO requests (emp, type, description) VALUES (:emp, :type, :dec)');
    $this->Database->bind(':emp', $emp);
    $this->Database->bind(':type', $type);
    $this->Database->bind(':dec', $dec);
    $this->Database->execute();
}



  }