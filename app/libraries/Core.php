<?php

/* app core class 
   creates URL and loads core controllers
   URL format: /controller/method/params
*/
class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        // print_r($this->getUrl());

        $url = $this->getUrl();

        // look in controllers for the first value
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            // if exists set as controller
            $this->currentController = ucwords($url[0]);
            // unset 0 index
            unset($url[0]);
        }

        // require controller
        require_once '../app/controllers/' . $this->currentController . '.php';

        // instantiate
  
        $this->currentController = new $this->currentController;
        //check for second parts url

        if(isset($url[1])){
            //check the methord exists
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
            echo $this->currentMethod;
        }
      //get params
      $this->params = $url ? array_values($url) : [];
      call_user_func_array( [$this->currentController, $this->currentMethod],  $this->params);
      
  
          
    }




    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
