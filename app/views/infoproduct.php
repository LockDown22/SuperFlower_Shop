

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>quick view</title>


</head>
<body>
   

<section class="quick-view">

    <h1 class="title">product details</h1>
    <?php
    foreach($details_product as $key => $value){
        $name_product = $value['title_product'];
        $price_product = $value['price_product'];
        $desc_product = $value['desc_product'];
        $image_product = $value['image_product'];
    }
    
    ?>
  
    <form action="" method="POST">
         <img src=" <?php echo BASE_URL ?>public/uploads/product/<?php echo $image_product ?>" alt="" class="image">
         <div class="name"><?php echo $name_product ?></div>
         <div class="price"><?php echo number_format($price_product,0,',','.'),' Vnđ'  ?></div>
         <div class="details"><?php echo $desc_product ?></div>
         <input type="number" name="product_quantity" value="1" min="0" class="qty">
         <input type="hidden" name="product_id" value="?>">
         <input type="hidden" name="product_name" value="#">
         <input type="hidden" name="product_price" value="#">
         <input type="hidden" name="product_image" value="#">
         <input type="submit" value="add to wishlist" name="add_to_wishlist" class="option-btn">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
      </form>

    ?>

    <div class="more-btn">
        <a href="home.php" class="option-btn">go to home page</a>
    </div>

</section>


</body>
</html>