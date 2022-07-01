
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>public/css/style.css">

</head>
<body>
   

<section class="home">

   <div class="content">
      <h3>@LockDown</h3>
      <p>Nhìn anh xem ! Sự thành công biết bao người thèm .</p>
      <a href="<?php echo BASE_URL ?>about" class="btn">discover more</a>
   </div>

</section>

<section class="products">

   <h1 class="title">latest products</h1>
  
   <div class="box-container">

    <?php
            foreach($list_product as $key =>$product){
      ?>

      <form action="<?php echo BASE_URL?>giohang/addtocart" method="POST" class="box">
         <a href="<?php echo BASE_URL ?>sanpham/infoproduct/<?php echo $product['id_product']?>" class="fas fa-eye"></a>
         <div class="price">$/-</div>
         <img src="<?php echo BASE_URL?>public/uploads/product/<?php echo $product['image_product']?>"  class="image">
         <div class="name"><?php echo $product['title_product']?></div>
         <input type="number" name="product_quantity" value="1" min="0" class="qty">
         <input type="submit" value="<?php echo number_format($product['price_product'],0,',','.') ?> Vnđ" class="option-btn">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
         <input type="hidden" name="product_id" value="<?php echo $product['id_product'] ?>">
         <input type="hidden" name="product_title" value="<?php echo $product['title_product'] ?>">
         <input type="hidden" name="product_image" value="<?php echo $product['image_product'] ?>">
         <input type="hidden" name="product_price" value="<?php echo $product['price_product'] ?>">
         <input type="hidden" name="product_quantity" value="1">
      </form>

      <?php
         }
      ?>

   </div>
   
   <div class="more-btn">
      <a href="#" class="option-btn">load more</a>
   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Distinctio officia aliquam quis saepe? Quia, libero.</p>
      <a href="contact.php" class="btn">contact us</a>
   </div>

</section>

<script src="<?php echo BASE_URL ?>product/js/script.js"></script>

</body>
</html>