<?php 

if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
        echo '<span style="color:blue;font-weight:bold;">'.$value.'</span>';
    }  
}
?>
<h3 style="text-align:center;">Thêm Sản Phẩm</h3>
<div class="col-md-12">
<form action="<?php echo BASE_URL ?>product/insert_product" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="email">Tên Danh Mục</label>
    <input type="text" name="title_product" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="email">Hình ảnh sản phẩm</label>
    <input type="file" name="image_product" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="email">Giá sản phẩm</label>
    <input type="text" name="price_product" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="email">Số lượng sản phẩm</label>
    <input type="text" name="quantity_product" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="email">Mô tả sản phẩm</label>
    <textarea id="editor" name="desc_product" row="5" style="resize:none;"  class="form-control" required> </textarea>
  </div>
  <div class="form-group">
    <label for="pwd">Danh Mục sản phẩm</label>
    <select class="form-control" name="category_product">

      <?php 
      foreach($category as $key => $cate){
      ?>
      <option value="<?php echo $cate['id_category'] ?>"> <?php echo $cate['title_category'] ?> </option>
      <?php
      }
      ?>
    </select>
  </div>

  <button type="submit" class="btn btn-default">Thêm Danh Mục</button>
</form>
</div>