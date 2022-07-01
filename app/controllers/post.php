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


    public function update_post_category($id){
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
    
    public function add_post(){
     
        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');
        $postmodel = $this -> load -> model('postmodel');
        $table = "tbl_post";
        $data['category'] = $postmodel-> category_post($table);

        $this -> load -> view('cpanel/post/add_post',$data);
        $this -> load -> view('cpanel/footer');
    }

    public function insert_post(){
        $title = $_POST['title_post_flw'];
        $content = $_POST['content_post_flw']; 
       
        //lay anh ve upload folder
        $image = $_FILES['image_post_flw']['name'];
        $tmp_image = $_FILES['image_post_flw']['tmp_name'];
        $div = explode('.',$image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'.$file_ext;

        $path_uploads = "public/uploads/post/".$unique_image;

        $category = $_POST['category_post'];
        $table = "tbl_post_flw";

        $data = array(
         'title_post_flw' => $title,
         'content_post_flw' => $content,
         'image_post_flw' => $unique_image,
         'id_post' => $category
        );
        
        $postmodel = $this -> load -> model('postmodel');
         $result = $postmodel ->insertpost($table,$data);
 
        if($result==1){
            move_uploaded_file($tmp_image,$path_uploads);
             $message['msg']='Thêm bài viết thành công';
               header("Location:".BASE_URL."post/list_post?msg=".urlencode(serialize($message)));
        }else{
                $message['msg']='Thêm bài viết thất bại';
               header("Location:".BASE_URL."post/list_post?msg=".urlencode(serialize($message)));
        }
    }

    public function list_post(){
        
        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');

        $table_post_flw = "tbl_post_flw";
        $table_post= "tbl_post";

        $postmodel = $this -> load -> model('postmodel');
        $data['post'] = $postmodel-> post($table_post_flw,$table_post);

        $this -> load -> view('cpanel/post/list_post',$data);
        $this -> load -> view('cpanel/footer');
    }

    public function delete_post($id){
        $table = "tbl_post_flw";
        $cond = "tbl_post_flw.id_post_flw ='$id'";
        $postmodel = $this -> load -> model('postmodel');
        $result = $postmodel-> deletepost($table,$cond);

        if($result==1){
            $message['msg']='Delete Bài Viết Thành Công';
            header("Location:".BASE_URL."post/list_post?msg=".urlencode(serialize($message)));
       }else{
        $message['msg']='Delete Bài Viết Thất Bại';
            header("Location:".BASE_URL."post/list_post?msg=".urlencode(serialize($message)));
        // header("Location:".BASE_URL."product");
       }
    }
    
    //lam tiep
    public function edit_post($id){
        $table = "tbl_post_flw";
        $cond = "tbl_post_flw.id_post_flw ='$id'";
        $table_category = "tbl_post";
        $postmodel = $this -> load -> model('postmodel');

        $data['postbyid'] = $postmodel-> postbyid($table,$cond);
        $data['post_category'] = $postmodel-> category_post($table_category);

        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');
        $this -> load -> view('cpanel/post/edit_post',$data);
        $this -> load -> view('cpanel/footer');
    }

    public function update_post_flw($id){
        $title = $_POST['title_post_flw'];
        $category = $_POST['category_post'];
        $content = $_POST['content_post_flw']; 
        $postmodel = $this -> load -> model('postmodel');
        $table = "tbl_post_flw";
        $cond = "tbl_post_flw.id_post_flw ='$id'";
        //lay anh ve upload folder
        $image = $_FILES['image_post_flw']['name'];
        $tmp_image = $_FILES['image_post_flw']['tmp_name'];
        $div = explode('.',$image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'.$file_ext;

        $path_uploads = "public/uploads/post/".$unique_image;
            if($image){

                $data['postbyid'] = $postmodel-> postbyid($table,$cond);
            foreach( $data['postbyid'] as $key=>$value){
                
                            $path_unlink ='public/uploads/post/';
                           unlink($path_unlink.$value['image_post_flw']);
            }
                $data = array(
                    'title_post_flw' => $title,
                    'content_post_flw' => $content,
                    'image_post_flw' => $unique_image,
                    'id_post' => $category
                   );
                   move_uploaded_file($tmp_image,$path_uploads);
            }else{
                $data = array(
                    'title_post_flw' => $title,
                    'content_post_flw' => $content,
                    // 'image_post_flw' => $unique_image,
                    'id_post' => $category
                   );
            }
        
        
       
         $result = $postmodel ->updatepost($table,$data,$cond);
 
        if($result==1){
            
             $message['msg']='Cap Nhat viết thành công';
               header("Location:".BASE_URL."post/list_post?msg=".urlencode(serialize($message)));
        }else{
                $message['msg']='Cap Nhat viết thất bại';
               header("Location:".BASE_URL."post/list_post?msg=".urlencode(serialize($message)));
        }

    }

    


}