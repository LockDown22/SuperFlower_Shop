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
         
        $ordermodel = $this ->load -> model('ordermodel');
        $table_order ='tbl_order';
        $data['order'] = $ordermodel -> list_order($table_order);
        
    
        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');    
        $this -> load -> view('cpanel/order/order',$data);
        $this -> load -> view('cpanel/footer');
    }
    public function order_details($order_code){
        $ordermodel = $this ->load -> model('ordermodel');
        $table_order_details ='tbl_order_details';
        $table_product = 'tbl_product';
        $cond = "$table_product.id_product=$table_order_details.product_id AND $table_order_details.order_code = '$order_code'";
        $data['order_details'] = $ordermodel -> list_order_details($table_product,$table_order_details,$cond);
        
    
        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');    
        $this -> load -> view('cpanel/order/order_details',$data);
        $this -> load -> view('cpanel/footer');
    }



}