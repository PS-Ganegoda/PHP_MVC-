<?php

/*base controller 
loads the models and views
*/

class Controller{
    public function model($model){
         // require model file 
         require_once'../app/models' .$model . '.php';
         //instanciate $model
         return new $model();
         
        
    }
    //load view

    public function view($view, $data=[]){
        // check for the vieiw
        if (file_exists('../app/views' .$view . '.php')){
        require_once '../app/views' .$view . '.php';

    }else{
        die('View does not exists');
    }
}
}