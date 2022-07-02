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
      <a href="shop.php" class="option-btn">load more</a>
   </div>

</section>


