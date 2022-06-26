<?php
class product extends DController{

    public function __construct()
    {
        parent::__construct();
            // echo 'this is class product';
    }

    public function index(){
        $this->add_category();

    }

    public function add_category(){
        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');
        $this -> load -> view('cpanel/product/add_category');
        $this -> load -> view('cpanel/footer');
    }

    public function add_product(){
        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');
        $table = "tbl_category_product";

        $categorymodel = $this -> load -> model('categorymodel');
        $data['category'] = $categorymodel-> category($table);

        $this -> load -> view('cpanel/product/add_product',$data);
        $this -> load -> view('cpanel/footer');
    }

    public function insert_category(){
       $title = $_POST['title_category'];
       $desc = $_POST['desc_category']; 
       $table = "tbl_category_product";
        
       $data = array(
        'title_category' => $title,
        'desc_category' => $desc
       );
       
       $categorymodel = $this -> load -> model('categorymodel');
       $result = $categorymodel ->insertcategory($table,$data);

       if($result==1){
            $message['msg']='Thêm Danh Mục Sản Phẩm Thành Công';
            header("Location:".BASE_URL."product/list_category?msg=".urlencode(serialize($message)));
       }else{
        $message['msg']='Thêm Danh Mục Sản Phẩm Thất Bại';
            header("Location:".BASE_URL."product/list_category?msg=".urlencode(serialize($message)));
        // header("Location:".BASE_URL."product");
       }
    }

    public function insert_product(){
        $title = $_POST['title_product'];
        $desc = $_POST['desc_product']; 
        $price = $_POST['price_product'];
        $quantity = $_POST['quantity_product']; 
        $category = $_POST['category_product'];

           
        //lay anh ve upload folder
        $image = $_FILES['image_product']['name'];
        $tmp_image = $_FILES['image_product']['tmp_name'];
        $div = explode('.',$image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'.$file_ext;

        $path_uploads = "public/uploads/product/".$unique_image;

        $table = "tbl_product";

        $data = array(
         'title_product' => $title,
         'desc_product' => $desc,
         'quantity_product' => $quantity,
         'price_product' => $price,
         'image_product' => $unique_image,
         'id_category' => $category
        );
        
        $categorymodel = $this -> load -> model('categorymodel');
         $result = $categorymodel ->insertproduct($table,$data);
 
        if($result==1){
            move_uploaded_file($tmp_image,$path_uploads);
             $message['msg']='Thêm Sản Phẩm Thành Công';
               header("Location:".BASE_URL."product/add_product?msg=".urlencode(serialize($message)));
        }else{
         $message['msg']='Thêm Sản Phẩm Thất Bại';
               header("Location:".BASE_URL."product/add_product?msg=".urlencode(serialize($message)));
        }
      }
    
    public function list_category(){
        
        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');

        $table = "tbl_category_product";
        $categorymodel = $this -> load -> model('categorymodel');
        $data['category'] = $categorymodel-> category($table);

        $this -> load -> view('cpanel/product/list_category',$data);
        $this -> load -> view('cpanel/footer');
    }

    public function list_product(){
        
        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');

        $table_product = "tbl_product";
        $table_category = "tbl_category_product";

        $categorymodel = $this -> load -> model('categorymodel');
        $data['product'] = $categorymodel-> product($table_product,$table_category);

        $this -> load -> view('cpanel/product/list_product',$data);
        $this -> load -> view('cpanel/footer');
    }

    public function delete_category($id){
        $table = "tbl_category_product";
        $cond = "tbl_category_product.id_category ='$id'";
        $categorymodel = $this -> load -> model('categorymodel');
        $result = $categorymodel-> deletecategory($table,$cond);

        if($result==1){
            $message['msg']='Delete Danh Mục Sản Phẩm Thành Công';
            header("Location:".BASE_URL."product/list_category?msg=".urlencode(serialize($message)));
       }else{
        $message['msg']='Delete Danh Mục Sản Phẩm Thất Bại';
            header("Location:".BASE_URL."product/list_category?msg=".urlencode(serialize($message)));
        // header("Location:".BASE_URL."product");
       }
    }

    public function delete_product($id){
        $table = "tbl_product";
        $cond = "tbl_product.id_product ='$id'";
        $categorymodel = $this -> load -> model('categorymodel');
        $result = $categorymodel-> deleteproduct($table,$cond);

        if($result==1){
            $message['msg']='Delete Sản Phẩm Thành Công';
            header("Location:".BASE_URL."product/list_product?msg=".urlencode(serialize($message)));
       }else{
        $message['msg']='Delete Sản Phẩm Thất Bại';
            header("Location:".BASE_URL."product/list_product?msg=".urlencode(serialize($message)));
        // header("Location:".BASE_URL."product");
       }
    }

    public function edit_category($id){
        $table = "tbl_category_product";
        $cond = "tbl_category_product.id_category ='$id'";
        $categorymodel = $this -> load -> model('categorymodel');
        $data['categorybyid'] = $categorymodel-> categorybyid($table,$cond);
        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');
        $this -> load -> view('cpanel/product/edit_category',$data);
        $this -> load -> view('cpanel/footer');
    }
    public function edit_product($id){
        $table = "tbl_product";
        $cond = "tbl_product.id_product ='$id'";
        $table_category = "tbl_category_product";
        $categorymodel = $this -> load -> model('categorymodel');

        $data['productbyid'] = $categorymodel-> productbyid($table,$cond);
        $data['category'] = $categorymodel-> category($table_category);

        $this -> load -> view('cpanel/header');
        $this -> load -> view('cpanel/menu');
        $this -> load -> view('cpanel/product/edit_product',$data);
        $this -> load -> view('cpanel/footer');
    }


    public function update_category_product($id){
        $table = "tbl_category_product";
        $cond = "tbl_category_product.id_category ='$id'";
        $title = $_POST['title_category'];
       $desc = $_POST['desc_category']; 
       
        
       $data = array(
        'title_category' => $title,
        'desc_category' => $desc
       );
        $categorymodel = $this -> load -> model('categorymodel');

        $result = $categorymodel-> updatecategory($table,$data,$cond);

        if($result==1){
            $message['msg']='Update Danh Mục Sản Phẩm Thành Công';
            header("Location:".BASE_URL."product/list_category?msg=".urlencode(serialize($message)));
       }else{
        $message['msg']='Update Danh Mục Sản Phẩm Thất Bại';
            header("Location:".BASE_URL."product/list_category?msg=".urlencode(serialize($message)));

       }
    }

    public function update_product($id){
        $categorymodel = $this -> load -> model('categorymodel');
        $cond = "tbl_product.id_product ='$id'";
        $title = $_POST['title_product'];
        $desc = $_POST['desc_product']; 
        $price = $_POST['price_product'];
        $quantity = $_POST['quantity_product']; 
        $category = $_POST['category_product'];
        $table = "tbl_product";
       
           
        //lay anh ve upload folder
        $image = $_FILES['image_product']['name'];
        $tmp_image = $_FILES['image_product']['tmp_name'];
        $div = explode('.',$image);
        $file_ext = strtolower(end($div));
        $unique_image = $div[0].time().'.'.$file_ext;
        $path_uploads = "public/uploads/product/".$unique_image;
        
        if($image){
            $data['productbyid'] = $categorymodel-> productbyid($table,$cond);
            foreach( $data['productbyid'] as $key=>$value){
                
                            $path_unlink ='public/uploads/product/';
                           unlink($path_unlink.$value['image_product']);
            }
            $data = array(
            'title_product' => $title,
            'desc_product' => $desc,
            'quantity_product' => $quantity,
            'price_product' => $price,
            'image_product' => $unique_image,
            'id_category' => $category
           );
           move_uploaded_file($tmp_image,$path_uploads);

        }else{
            
        $data = array(
            'title_product' => $title,
            'desc_product' => $desc,
            'quantity_product' => $quantity,
            'price_product' => $price,
           // 'image_product' => $unique_image,
            'id_category' => $category
           );
        }
        
         $result = $categorymodel ->updateproduct($table,$data,$cond);
 
        if($result==1){
             $message['msg']='Update Sản Phẩm Thành Công';
               header("Location:".BASE_URL."product/list_product?msg=".urlencode(serialize($message)));
        }else{
         $message['msg']='Update Sản Phẩm Thất Bại';
               header("Location:".BASE_URL."product/list_product?msg=".urlencode(serialize($message)));
        }
    }



}