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
<form action="<?php echo BASE_URL ?>product/update_category_product/<?php echo $cate['id_category'] ?>" method="POST">
  <div class="form-group">
    <label for="email">Tên Danh Mục</label>
    <input type="text" value="<?php echo $cate['title_category']?>" name="title_category" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="pwd">Miêu Tả Danh Mục</label>
    <textarea id="editor" name="desc_category" style="resize:none ;" rows="5" class="form-control" ><?php echo $cate['desc_category']?></textarea>
  </div>

  <button type="submit" class="btn btn-default">Update Danh Mục</button>
</form>
<?php
 }
?>
</div>