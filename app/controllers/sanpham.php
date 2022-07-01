<?php

class sanpham extends DController{
    
    public function __construct()
    {
        $data = array();
        parent::__construct();         
    }

    public function index(){
        $this->category(null);

   }

    public function category($id){
        $table = 'tbl_category_product';
        $table_post = 'tbl_post';
        $table_product = 'tbl_product';
        $categorymodel = $this -> load ->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['category_by_id'] = $categorymodel->categorybyid_home($table,$table_product,$id);
        $this -> load -> view('header',$data); 
        $this -> load -> view('categoryproduct',$data);
        $this -> load -> view('footer');
    }
    public function infoproduct($id){
        $table = 'tbl_category_product';
        $table_post = 'tbl_post';
        $table_product = 'tbl_product';
        $cond = "$table_product.id_category=$table.id_category AND $table_product.id_product='$id'";
        $categorymodel = $this -> load ->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['details_product'] = $categorymodel->details_product_home($table,$table_product,$cond);
        $this -> load -> view('header',$data); 
        $this -> load -> view('infoproduct',$data);
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
    public function cart(){
        $table = 'tbl_category_product';
        $table_post = 'tbl_post';
        $categorymodel = $this -> load ->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);

        $this -> load -> view('header',$data); 
        $this -> load -> view('cart');
        $this -> load -> view('footer');
    }

    public function allproducts(){
        $table = 'tbl_category_product';
        $table_post = 'tbl_post';
        $table_product = 'tbl_product';
        $categorymodel = $this -> load ->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['list_product'] = $categorymodel->list_product_home($table_product);
        $this -> load -> view('header',$data); 
        $this -> load -> view('listproduct',$data);
        $this -> load -> view('footer'); 
    }



   
}
?>