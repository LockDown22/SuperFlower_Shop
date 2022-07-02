

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>


<section class="heading">
    <h3>shopping cart</h3>
    <p> <a href="home.php">home</a> / cart </p>
</section>

<section class="shopping-cart">

    <h1 class="title">products added</h1>
   
    <div class="box-container">
    
    <?php 
    if(isset($_SESSION['shopping_cart'])){
        // $cart = $_SESSION['shopping_cart'];
        // print_r($cart);
       ?>
    <form action="<?php echo BASE_URL ?>giohang/updatetocart/" method="POST">
    
       <?php
        $total = 0;
        foreach($_SESSION['shopping_cart'] as $key => $value){
            $subtotal = $value['product_quantity'] * $value['product_price'];
            $total += $subtotal;
    ?>
   
    <div  class="box">

    <button type="submit" value="<?php echo $value['product_id']?>" name="delete_cart" class="fas fa-times"></button> 

        <a href="<?php echo BASE_URL ?>sanpham/infoproduct/<?php echo $value['product_id']?>" class="fas fa-eye"></a>
     
        <img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $value['product_image'] ?>" class="image" >
        
        <div class="name"><?php echo $value['product_title'] ?></div>
        <input type="number" min="0" value="<?php echo $value['product_quantity'] ?>" name="qty[<?php echo $value['product_id'] ?>]" class="">
        <div class="price"><?php echo number_format($value['product_price'],0,',','.').' Vnđ' ?></div>
        <div class="sub-total"> Total : <?php echo number_format($subtotal,0,',','.').' Vnđ' ?><span></span> </div>
        <button type="submit" value="<?php echo $value['product_id']?>" name="update_cart" class="option-btn">Update</button>  
        
        
    </div>
    <?php
            }
            
        
    ?>
    
    </form>
    
    
    </div>


    <div class="cart-total">
        <p>grand total :<?php echo number_format($total,0,',','.').' Vnđ' ?> <span>/-</span></p>
        <a href="<?php echo BASE_URL?>index" class="option-btn">continue shopping</a>
        <a href="checkout.php" class="btn  ">proceed to checkout</a>
    </div>
    <?php
            }
            
        
    ?>
</section>

<section class="checkout">

    <form action="<?php echo BASE_URL ?>giohang/checkout" method="POST">

        <h3>place your order</h3>

        <div class="flex">
            <div class="inputBox">
                <span>your name :</span>
                <input type="text" name="name" placeholder="enter your name">
            </div>
            <div class="inputBox">
                <span>your number :</span>
                <input type="number" name="sodienthoai" min="0" placeholder="enter your number">
            </div>
            <div class="inputBox">
                <span>your email :</span>
                <input type="email" name="email" placeholder="enter your email">
            </div>
            <div class="inputBox">
                <span>address:</span>
                <input type="text" name="diachi" placeholder="e.g. flat no.">
            </div>
            <div class="inputBox">
                <span>Description:</span>
                <input type="text" name="noidung" placeholder="something">
            </div>
           
        </div>

        <input type="submit" name="order" value="order now" class="btn">
        <input type="reset" name="order" value="Nhập lại" class="btn">
    </form>

</section>
<?php 
if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
        echo '<span style="color:blue;font-weight:bold;">'.$value.'</span>';
    }  
}
?>

</body>
</html>