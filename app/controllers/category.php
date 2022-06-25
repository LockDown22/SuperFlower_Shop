<?php

class category extends DController{
    
    public function __construct()
    {
        $data = array();
        $message = array();
        parent::__construct();         
    }

    
    public function list_category(){
        //neu k chay them NULL
        $this -> load -> view('header');
       $categorymodel = $this -> load -> model('categorymodel');

        $table_category_product = 'tbl_category_product';
       $data['category'] =  $categorymodel->category($table_category_product);

        $this -> load -> view('category',$data);
        $this -> load -> view('footer');

  
    }

    public function catebyid(){
        //neu k chay them NULL
        $this -> load -> view('header');
       $categorymodel = $this -> load -> model('categorymodel');
        $id=1;
        $table_category_product = 'tbl_category_product';
       $data['categorybyid'] =  $categorymodel->categorybyid($table_category_product,$id);

        $this -> load -> view('categorybyid',$data);
        $this -> load -> view('footer');

  
    }

    public function addcategory(){
        $this->load->view('addcategory');
    }

    public function insertcategory(){

        $categorymodel = $this -> load -> model('categorymodel');

        $table_category_product = 'tbl_category_product';
        $title = $_POST['title'];
        $desc  =$_POST['desc'];
        $data = array(
            'title_category' => $title,
            'desc_category' => $desc
        );
         $result = $categorymodel->insertcategory($table_category_product,$data);
        
            if($result==1){
                $message['msg']="Add sucessfully";
            }else{
                $message['msg'] = "Add failed";
            }
            $this->load->view('addcategory',$message);
    }

    public function updatecategory(){

        $categorymodel = $this -> load -> model('categorymodel');

        $table_category_product = 'tbl_category_product';
        // $title = $_POST['title'];
        // $desc  =$_POST['desc'];
        $cond="tbl_category_product.id_category=3";
        $data = array(
            'title_category' => 'macbook pro',
            'desc_category' => 'macbook ngonnn'
        );
         $result = $categorymodel->updatecategory($table_category_product,$data,$cond);
        
            if($result==1){
                echo "Update sucessfully";
                // $message['msg']="Update sucessfully";
            }else{
                echo "Update failed";
                // $message['msg'] = "Update failed";
            }
            // $this->load->view('addcategory',$message);
    }
    public function deletecategory(){
        $categorymodel = $this -> load -> model('categorymodel');

        $table_category_product = 'tbl_category_product';
        $cond="tbl_category_product.id_category=35";
     
         $result = $categorymodel->deletecategory($table_category_product,$cond);
        
            if($result==1){
                echo "Delete sucessfully";       
            }else{
                echo "Delete failed";
            }
    }

}
?>