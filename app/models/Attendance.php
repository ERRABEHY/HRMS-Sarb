<?php 
  class Attendance  
  {
    public $Database;
    
    public function __construct() 
    {
        $this->Database = new Database();
    }

    public function getUsers()
    {
        $this->Database->query('SELECT * FROM attendance');

        $Users = $this->Database->fetchAll(); 
        
        return $Users;
    }
    public function getUserName($Id)
    {
      $this->Database->query('SELECT * FROM employes WHERE employe_id  = :id');
      $this->Database->bind(':id', $Id);

      $Users = $this->Database->fetch(); 

      return $Users;
    }


  }