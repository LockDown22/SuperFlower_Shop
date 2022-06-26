<?php

class post extends DController{

    public function __construct()
    {
        parent::__construct();

    }

    public function index(){
        $this->add_category();

    }

    public function add_category(){
        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');
        $this -> load -> view('cpanel/post/add_category');
        $this -> load -> view('cpanel/footer');
    }

    public function insert_category(){
       $title = $_POST['title_post'];
       $desc = $_POST['desc_post']; 
       $table = "tbl_post";
        
       $data = array(
        'title_post' => $title,
        'desc_post' => $desc
       );
       
       $categorymodel = $this -> load -> model('categorymodel');
       $result = $categorymodel ->insertcategory_post($table,$data);

       if($result==1){
            $message['msg']='Thêm Danh Bài viết Phẩm Thành Công';
            header("Location:".BASE_URL."post/list_category?msg=".urlencode(serialize($message)));
       }else{
        $message['msg']='Thêm Danh Mục Bài Viết Thất Bại';
            header("Location:".BASE_URL."post/list_category?msg=".urlencode(serialize($message)));

       }
    }
    
    public function list_category(){
        
        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');

        $table = "tbl_post";
        $categorymodel = $this -> load -> model('categorymodel');
        $data['category'] = $categorymodel-> post_category($table);

        $this -> load -> view('cpanel/post/list_category',$data);
        $this -> load -> view('cpanel/footer');
    }

    public function delete_category($id){
        $table = "tbl_post";
        $cond = "tbl_post.id_post ='$id'";
        $categorymodel = $this -> load -> model('categorymodel');
        $result = $categorymodel-> deletecategory_post($table,$cond);

        if($result==1){
            $message['msg']='Delete Danh Mục Bai Viet Thành Công';
            header("Location:".BASE_URL."post/list_category?msg=".urlencode(serialize($message)));
       }else{
        $message['msg']='Delete Danh Mục Bai Viet Thất Bại';
            header("Location:".BASE_URL."post/list_category?msg=".urlencode(serialize($message)));
       }
    }

    public function edit_category($id){
        $table = "tbl_post";
        $cond = "tbl_post.id_post ='$id'";
        $categorymodel = $this -> load -> model('categorymodel');
        $data['categorybyid'] = $categorymodel-> categorybyid_post($table,$cond);
        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');
        $this -> load -> view('cpanel/post/edit_category',$data);
        $this -> load -> view('cpanel/footer');
    }


    public function update_post($id){
        $table = "tbl_post";
        $cond = "tbl_post.id_post ='$id'";
        $title = $_POST['title_post'];
       $desc = $_POST['desc_post']; 
       
        
       $data = array(
        'title_post' => $title,
        'desc_post' => $desc
       );
        $categorymodel = $this -> load -> model('categorymodel');

        $result = $categorymodel-> updatecategory_post($table,$data,$cond);

        if($result==1){
            $message['msg']='Update Danh Mục Bai Viet Thành Công';
            header("Location:".BASE_URL."post/list_category?msg=".urlencode(serialize($message)));
       }else{
        $message['msg']='Update Danh Mục Bai Viet Thất Bại';
            header("Location:".BASE_URL."post/list_category?msg=".urlencode(serialize($message)));

       }
    }


}