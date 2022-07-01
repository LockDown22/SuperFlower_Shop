<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
<!-- custom admin css file link  -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>public/css/style.css">


</head>
<body>
<header class="header">

<div class="flex">

    <a href="<?php echo BASE_URL ?>" class="logo">Superflowers.</a>

    <nav class="navbar">
        <ul>
            <li><a href="<?php echo BASE_URL ?>">home</a></li>
            <li><a href="#">Info +</a>
                <ul>
                <li><a href="<?php echo BASE_URL ?>index/categorypost">News</a></li>
                    <li><a href="<?php echo BASE_URL?>index/about">About</a></li>
                </ul>
            </li>
            <li><a href="<?php echo BASE_URL ?>sanpham/allproducts">Sản Phẩm+</a> 
            <ul>
                <?php 
                foreach($category as $key =>$cate){
                
                ?>
                <li><a href="<?php echo BASE_URL ?>sanpham/category/<?php echo $cate['id_category']?>"><?php echo $cate['title_category'] ?></a></li>
               
                </li>
                <?php 
                }
                
                ?>
            </ul>
            </li>
            <li><a href="shop.php">Gian Hàng</a></li>
            
            <li><a href="#">account +</a>
                <ul>
                    <li><a href="login.php">login</a></li>
                    <li><a href="register.php">register</a></li>
                </ul>
            </li>
            <li><a href="#">News</a>
                <ul>
                    <?php 
                    foreach($category_post as $key =>$cate_post){
                
                        ?>
                    <li><a href="<?php echo BASE_URL ?>tintuc/categorypost/<?php echo $cate_post['id_post']?>"><?php echo $cate_post['title_post']?></a></li>
                    <?php 
                    }
                
                        ?>
                </ul>
            </li>
        </ul>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="search_page.php" class="fas fa-search"></a>
        <div id="user-btn" class="fas fa-user"></div>
        <?php
            // $select_wishlist_count = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '$user_id'") or die('query failed');
            // $wishlist_num_rows = mysqli_num_rows($select_wishlist_count);
        ?>
        <a href="wishlist.php"><i class="fas fa-heart"></i><span>()</span></a>
        <?php
            // $select_cart_count = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            // $cart_num_rows = mysqli_num_rows($select_cart_count);
        ?>
        <a href="<?php echo BASE_URL ?>sanpham/cart"><i class="fas fa-shopping-cart"></i><span>()</span></a>
    </div>

    <div class="account-box">
        <p>username : <span></span></p>
        <p>email : <span></span></p>
        <a href="logout.php" class="delete-btn">logout</a>
    </div>

</div>

</header>
</body>
<script src="<?php echo BASE_URL ?>product/js/script.js"></script>
</html>

