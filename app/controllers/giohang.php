<?php

class giohang extends DController{
    
    public function __construct()
    {
        $data = array();
        parent::__construct();         
    }

    public function index(){
        $this->giohang();

   }

    public function giohang(){
        Session::init();
        $table = 'tbl_category_product';
        $table_post = 'tbl_post';
        $table_product = 'tbl_product';
        $categorymodel = $this -> load ->model('categorymodel');
        $data['category'] = $categorymodel->category_home($table);
        $data['category_post'] = $categorymodel->categorypost_home($table_post);
        $data['list_product'] = $categorymodel->list_product_home($table_product);
        $this -> load -> view('header',$data); 
        $this -> load -> view('home',$data);
        $this -> load -> view('footer'); 
    }

    public function addtocart(){
        Session::init();
         //Session::destroy();
        if(isset($_SESSION["shopping_cart"])){
           
            foreach($_SESSION["shopping_cart"] as $key => $value){
                     $avaiable =0;
                    if($_SESSION['shopping_cart'][$key]['product_id']==$_POST['product_id']){
                        $avaiable++;
                        $_SESSION['shopping_cart'][$key]['product_quantity']= $_SESSION['shopping_cart'][$key]['product_quantity']+$_POST['product_quantity'];
                    }
                }
                if($avaiable==0){ 
                    $item = array(
                        'product_id'=>$_POST["product_id"],
                        'product_title'=>$_POST["product_title"],
                        'product_price'=>$_POST["product_price"],
                        'product_image'=>$_POST["product_image"],
                        'product_quantity'=>$_POST["product_quantity"]
        
                    );
                    $_SESSION["shopping_cart"][]= $item;
                }
            
        }else{
            $item = array(
                'product_id'=>$_POST["product_id"],
                'product_title'=>$_POST["product_title"],
                'product_price'=>$_POST["product_price"],
                'product_image'=>$_POST["product_image"],
                'product_quantity'=>$_POST["product_quantity"]

            );
            $_SESSION["shopping_cart"][]= $item;
            $this -> load -> view('cart');
          

        }
        header("Location:".BASE_URL.'giohang');
    }

    
   
}
?>