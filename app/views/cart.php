

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
        $total = 0;
        foreach($_SESSION['shopping_cart'] as $key => $value){
            $subtotal = $value['product_quantity'] * $value['product_price'];
            $total += $subtotal;
    ?>
    <div  class="box">
        <a href="cart.php?delete=" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>
        <a href="view_page.php?pid=" class="fas fa-eye"></a>
     
        <img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $value['product_image'] ?>" class="image">
        
        <div class="name"><?php echo $value['product_title'] ?></div>
        <input type="number" min="1" value="<?php echo $value['product_quantity'] ?>" name="cart_quantity" class="qty">
        <div class="price"><?php echo number_format($value['product_price'],0,',','.').' Vnđ' ?></div>
        <div class="sub-total"> Total : <?php echo number_format($subtotal,0,',','.').' Vnđ' ?><span></span> </div>      
    </div>
    <?php
            }
        }
    ?>
    </div>
    
    <div class="more-btn">
        <a href="cart.php?delete_all" class="delete-btn " onclick="return confirm('delete all from cart?');">delete all</a>
    </div>

    <div class="cart-total">
        <p>grand total :<?php echo number_format($total,0,',','.').' Vnđ' ?> <span>/-</span></p>
        <a href="shop.php" class="option-btn">continue shopping</a>
        <a href="checkout.php" class="btn  ">proceed to checkout</a>
    </div>

</section>


<script src="js/script.js"></script>

</body>
</html>