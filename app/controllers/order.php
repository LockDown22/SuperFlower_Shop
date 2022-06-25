<?php

class order extends DController{

    function __construct()
    {
        Session::checkSession();
        parent::__construct();
            // echo 'this is class post';
    }

    public function index(){
        $this->order();
    }
    public function order(){
        
        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');
        $this -> load -> view('cpanel/order/order');
        $this -> load -> view('cpanel/footer');
    }
    public function add_order(){
        
        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');
        $this -> load -> view('cpanel/order/add_order');
        $this -> load -> view('cpanel/footer');
    }

}