<?php

class Pages extends Controller{
    public function __construct()
    {
        // Corrected the syntax here
    }

    public function index(){
        $data=[
            'title'=>'welcome'
        ];
        $this->view('app/views/pages/index.php', $data); 
    }
    public function about(){
   
        $this->view('pages/about.php'); 

    }
}