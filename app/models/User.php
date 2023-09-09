<?php
    class User
    {
        protected $Database;

        public function __construct()
        {
            $this->Database = new Database();
        }

        public function validateUser($email, $password)
        {
            $this->Database->query('SELECT * FROM employes WHERE email = :email AND password = :password');
            $this->Database->bind(':email', $email);
            $this->Database->bind(':password', $password);
            $user = $this->Database->fetch(); 

            return $user ? true : false;
        }

        public function getdept()
        {
            $this->Database->query('SELECT COUNT(*) as dptNbrs From department Where id = ? ');
            $dpt = $this->Database->fetch();
            return $dpt->dptNbrs;
        }

        public function getUser($email)
        {
            $this->Database->query('SELECT * FROM employes WHERE email = :email ');
            $this->Database->bind(':email', $email);
            $user = $this->Database->fetch(); 

            if ($user) {
                return $user;
            } else {
                return null; 
            }
        }

        public function checkAttendance($user)
        {
            $this->Database->query('SELECT * FROM attendance  WHERE employee_id = :user');
            $this->Database->bind(':user', $user);
            $User = $this->Database->fetch(); 
            
            return  $User->datetm;
        }
        
        public function addPrs($emp)
        {
            $this->Database->query('SELECT * FROM attendance  WHERE employee_id = :user');
            $this->Database->bind(':user', $emp);
            $User = $this->Database->fetch(); 

            $newPrsValue    = $User->present    +   1;
            $newAbsValue    = $User->absnt      -   1;
            $newPrsDayValue =                       1;
            $newAbsDayValue =                       0;
            $date           = date("Y-m-d");
            
            $this->Database->query('UPDATE attendance SET present = :pre, absnt =:abs , absentDay = :absday, presentDay = :prdy, datetm = :dtm WHERE employee_id = :user');
            $this->Database->bind(':pre', $newPrsValue);
            $this->Database->bind(':abs', $newAbsValue);
            $this->Database->bind(':absday', $newAbsDayValue);
            $this->Database->bind(':prdy', $newPrsDayValue);
            $this->Database->bind(':dtm', $date);
            $this->Database->bind(':user', $emp);
            $this->Database->execute(); 
            

        }
       public function addAbs()
        {
            $date = date("Y-m-d");
            $this->Database->query('SELECT * FROM attendance WHERE datetm < :dateOfToday');
            $this->Database->bind(':dateOfToday', $date);

            while ($row = $this->Database->fetch()) {
                $newAbsValue = $row->absnt + 1;
                $newAbsDayValue = 1;
                $newPrsDayValue = 0;
                $this->Database->query('UPDATE attendance SET absnt = :abs, presentDay = :presentDay, absentDay = :absDay, datetm = :dateOfToday WHERE datetm < :dateOfToday');
                $this->Database->bind(':abs', $newAbsValue);
                $this->Database->bind(':absDay', $newAbsDayValue);
                $this->Database->bind(':presentDay', $newPrsDayValue);
                $this->Database->bind(':dateOfToday', $date);
                $this->Database->execute();
            }
        }
    
        public function getPrDay($emp)
        {
            $this->Database->query('SELECT presentDay FROM attendance  WHERE employee_id = :user');
            $this->Database->bind(':user', $emp);
            $User = $this->Database->fetch();
            
            return $User->presentDay ;
        }

        public function getAttendance($emp)
        {
            $this->Database->query('SELECT absnt, present FROM attendance  WHERE employee_id = :user');
            $this->Database->bind(':user', $emp);
            $User = $this->Database->fetch();
            
            return $User;
        }
        public function getRequest($emp)
        {
            $this->Database->query("SELECT COUNT(*) as employesPending FROM requests WHERE emp = :emp AND status = 'pending'");
            $this->Database->bind(':emp', $emp);
            $User = $this->Database->fetch();
            
            return $User->employesPending;

        }
    }
