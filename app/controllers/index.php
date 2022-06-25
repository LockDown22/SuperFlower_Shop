<?php

class index extends DController{
    
    public function __construct()
    {
        $data = array();
        parent::__construct();         
    }

    public function index(){
        $this->homepage();

   }

    public function homepage(){
        //neu k chay them NULL
        $this -> load -> view('header');  
        $this -> load -> view('home');
        $this -> load -> view('footer');
    }

    public function notfound(){
        $this -> load -> view('header');  
        $this -> load -> view('404');
        $this -> load -> view('footer');
    }
   
}
?>