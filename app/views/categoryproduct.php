<section class="products">

   <h1 class="title">latest products</h1>
  
   <div class="box-container">

   <?php
            foreach($category_by_id as $key =>$product){
      ?>
      <form action="" method="POST" class="box">
         <a href="<?php echo BASE_URL ?>sanpham/infoproduct/<?php echo $product['id_product']?>" class="fas fa-eye"></a>
         <div class="price">$/-</div>
         <img src="<?php echo BASE_URL?>public/uploads/product/<?php echo $product['image_product']?>"  class="image">
         <div class="name"><?php echo $product['title_product']?></div>
         <input type="number" name="product_quantity" value="1" min="0" class="qty">
         <input type="submit" value="<?php echo number_format($product['price_product'],0,',','.') ?> Vnđ" class="option-btn">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
      </form>
      <?php
         }
      ?>

   </div>
   
   <div class="more-btn">
      <a href="shop.php" class="option-btn">load more</a>
   </div>

</section>


