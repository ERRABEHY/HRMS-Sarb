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

         public function getDprt($emp)
        {
            $this->Database->query('SELECT department FROM employee WHere full_name = :emp');
            $this->Database->bind(':emp', $emp); 

            $Users = $this->Database->fetch(); 
            
            return $Users->department;
        }



    // public function absentDay($emp){

    //   $this->Database->query('SELECT  presentDay From attendance WHere employee = :emp ');
    //   $this->Database->bind(':emp', $emp); 
    //   $absences = $this->Database->fetch();

    //   return $absences->presentDay;
    // }
  
  }