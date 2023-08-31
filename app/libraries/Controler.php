<?php
   
   class Controller 
   {
     public function models($model)
     {

        require_once '../app/models/' . $model . '.php';

        return new $model();

     }

     public function views($view, $data = [])
     {
        if (file_exists('../app/views/'.$view.'.php')) {
            
            require_once '../app/views/' . $view . '.php';
        }else 
        {

            die('The View Does Not Exist ');
        }
     }
   }
