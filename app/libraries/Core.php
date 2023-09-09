<?php 
    /* 
    === core or brain of our app
    === get the URL and load the controler
    === url format : controler(page)/method(sub page)/params(user id)
    */

    class Core {

      protected $currentControler = 'Homes';
      protected $currentMethod = 'login';
      protected $params = [];

      public function __construct()
      {
        
        $url=$this->getUrl();
        
       if (isset($url[0]) && file_exists('../app/Controllers/' . ucfirst($url[0]) . '.php')) {
                $this->currentControler = ucfirst($url[0]);
                unset($url[0]);
            }

        // bring the requisted page from the Controllers
        require_once '../app/Controllers/'.$this->currentControler.'.php';

        // create the obj page from the requiested class page
        $this->currentControler=new $this->currentControler;       

        // check if the method existe in our current page
        if(isset($url[1]) && method_exists($this->currentControler,$url[1])){
          $this->currentMethod=$url[1];
          unset($url[1]);
        }

        // get params if they existe
        $this->params= isset($url) ? array_values($url) : []; // we used the array_values to make the params array start from index 0;

        // call the class method dynamicaly + arr of params
        call_user_func_array([$this->currentControler,$this->currentMethod],$this->params);
        
        
      }


      public function getUrl(){
        if(isset($_GET['url'])){
          $url=$_GET['url'];
          $url=rtrim($url,'/');
          $url=filter_var($url,FILTER_SANITIZE_URL);
          $url=explode('/',$url);
          return $url;
        }
      }
    }







    ?>