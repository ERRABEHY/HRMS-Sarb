<?php 
 
 class  Admin 
 {

    public $Database;
    
    public function __construct() 
    {
        $this->Database = new Database();
    }

    public function getdept()
    {
       $this->Database->query('SELECT COUNT(*) FROM department');
        $count = $this->Database->fetchColumn(); 
        
        return $count;
    }
    
    public function getUsers()
    {
        $this->Database->query('SELECT COUNT(*) FROM employes');
        $count = $this->Database->fetchColumn(); 
        
        return $count;
    }
    public function getPrs()
    {
        $this->Database->query('SELECT COUNT(*) FROM attendance Where presentDay = 1');
        $count = $this->Database->fetchColumn(); 
        
        return $count;
    }

    public function getAbs()
    {
        $this->Database->query('SELECT COUNT(*) FROM attendance Where absentDay = 1');
        $count = $this->Database->fetchColumn(); 
        
        return $count;
    }
    public function getReqts()
    {
        $this->Database->query(" SELECT COUNT(*) FROM requests Where status = 'pending' ");
        $count = $this->Database->fetchColumn(); 
        
        return $count;
    }
 }