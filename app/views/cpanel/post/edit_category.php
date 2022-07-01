<?php 

if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
        echo '<span style="color:blue;font-weight:bold;">'.$value.'</span>';
    }
}
?>
<h3 style="text-align:center;">Update Danh Mục Sản Phẩm</h3>
<div class="col-md-12">
    <?php
        foreach($categorybyid as $key => $cate){

       
    
    ?>
<form action="<?php echo BASE_URL ?>post/update_post_category/<?php echo $cate['id_post'] ?>" method="POST">
  <div class="form-group">
    <label for="email">Tên Danh Mục</label>
    <input type="text" value="<?php echo $cate['title_post']?>" name="title_post" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="pwd">Miêu Tả Danh Mục</label>
    <textarea name="desc_post" style="resize:none ;" rows="5" class="form-control" ><?php echo $cate['desc_post']?></textarea>
  </div>

  <button type="submit" class="btn btn-default">Update Danh Mục</button>
</form>
<?php
 }
?>
</div>