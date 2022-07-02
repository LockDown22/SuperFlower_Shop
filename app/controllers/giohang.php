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
        $this -> load -> view('cart',$data);
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

    public function updatetocart(){
        Session::init();
        if(isset($_POST['delete_cart'])){
            if(isset($_SESSION["shopping_cart"])){
            foreach($_SESSION["shopping_cart"] as $key => $values){

                if($_SESSION["shopping_cart"][$key]['product_id']==$_POST['delete_cart']){

                    unset($_SESSION['shopping_cart'][$key]);
                }
               
            }
            header("Location:".BASE_URL.'giohang');
            }else{
            header("Location:".BASE_URL.'index');
            }
        }else{
            foreach($_POST['qty'] as $key => $qty){
                foreach($_SESSION["shopping_cart"] as $session => $values){
                    if($values['product_id']==$key && $qty >=1){
                        $_SESSION["shopping_cart"][$session]['product_quantity']=$qty;
                    }elseif($values['product_id']==$key && $qty <=0){
                        unset($_SESSION['shopping_cart'][$session]);
                    }
                }
            }
            header("Location:".BASE_URL.'giohang');
            // if(isset($_SESSION["shopping_cart"])){
            //     foreach($_SESSION["shopping_cart"] as $key => $values){
            //         if($$_SESSION["shopping_cart"][$key]['product_id']==$_POST['delete_id']){
    
            //          $_SESSION['shopping_cart'][$key];
            //         }
            //         header("Location:".BASE_URL.'giohang');
            //     }
    
            //     }else{
            //     header("Location:".BASE_URL.'index');
            //     }
        }
       


    }

    public function checkout(){
        Session::init();
        $table_order = "tbl_order";
        $table_order_details = "tbl_order_details";
        $ordermodel = $this -> load ->model('ordermodel');
            $name = $_POST['name'];
            $sodienthoai = $_POST['sodienthoai'];
            $email = $_POST['email'];
            $noidung = $_POST['noidung'];
            $diachi = $_POST['diachi'];
            $order_code=rand(0,9999).'new';
            date_default_timezone_set('asia/ho_chi_minh');
            $date=date("d/m/Y");
            $hour = date("h:i:sa");
            $order_date = $date.$hour;
            $data_order = array(
                'order_status' => 'moi',
                'order_code' => $order_code,
                'order_date' => $date.' '.$hour
            );
            $result_order = $ordermodel -> insert_order($table_order,$data_order);
        if(Session::get("shopping_cart")==true){
                foreach(Session::get("shopping_cart") as $key => $value){
                    $data =array(
                        'order_code' => $order_code,
                        'product_id'=>$value['product_id'],
                        'product_quantity'=>$value['product_quantity'],
                        'name' => $name,
                        'sodienthoai' => $sodienthoai,
                        'email' => $email,
                        'noidung' => $noidung,
                        'diachi' => $diachi,

                    );
                    $result_order_details = $ordermodel -> insert_order_details($table_order_details,$data);
                }
                unset($_SESSION["shopping_cart"]);
            }
           
                $message['msg']='Dat Hang Thanh Cong';
                header("Location:".BASE_URL."giohang?msg=".urlencode(serialize($message)));
            
           
    }
   
}
?>