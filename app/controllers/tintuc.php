<?php

class tintuc extends DController{
    
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
        $table = 'tbl_category_product';
        $table_post = 'tbl_post';
        $categorymodel = $this -> load ->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $this -> load -> view('header',$data);  
        $this -> load -> view('home');
        $this -> load -> view('footer');
    }

    public function categorypost(){
        $table = 'tbl_category_product';
        $table_post = 'tbl_post';
        $categorymodel = $this -> load ->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $this -> load -> view('header',$data); 
        $this -> load -> view('categorypost');
        $this -> load -> view('footer');
    }


   
}
?>