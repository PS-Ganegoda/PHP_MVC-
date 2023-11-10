<?php

class Pages extends Controller{
    public function __construct()
    {
        $this->view('hello'); // Corrected the syntax here
    }

    public function index(){
     
    }
    public function about($id){
       echo $id;
    }
}