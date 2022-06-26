<?php 

if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
        echo '<span style="color:blue;font-weight:bold;">'.$value.'</span>';
    }  
}
?>
<h3 style="text-align:center;">Update Sản Phẩm</h3>
<div class="col-md-12">
<?php 
  foreach($productbyid as $key =>$pro){

?>
<form action="<?php echo BASE_URL ?>product/update_product/<?php echo $pro['id_product'] ?>" method="POST" enctype="multipart/form-data">

  <div class="form-group">
    <label for="email">Tên Danh Mục</label>
    <input type="text" value="<?php echo $pro['title_product'] ?>" name="title_product" class="form-control" >
  </div>
  <div class="form-group">
    <label for="email">Hình ảnh sản phẩm</label>
    <input type="file" value="#" name="image_product" class="form-control" >
    <p><img src="<?php echo BASE_URL?>public/uploads/product/<?php echo $pro['image_product']?>" height="100px" width="100px"> </p>
  </div>
  <div class="form-group">
    <label for="email">Giá sản phẩm</label>
    <input type="text" value="<?php echo $pro['price_product'] ?>" name="price_product" class="form-control" >
  </div>
  <div class="form-group">
    <label for="email">Số lượng sản phẩm</label>
    <input type="text" value="<?php echo $pro['quantity_product'] ?>" name="quantity_product" class="form-control" >
  </div>
  <div class="form-group">
    <label for="email">Mô tả sản phẩm</label>
    <textarea name="desc_product" row="5" style="resize:none;"  class="form-control" ><?php echo $pro['desc_product'] ?> </textarea>
  </div>
  <div class="form-group">
    <label for="pwd">Danh Mục sản phẩm</label>
    <select class="form-control" name="category_product">

      <?php 
      foreach($category as $key => $cate){
      ?>
      <option <?php if($cate['id_category']==$pro['id_category']){echo 'selected';} ?> value="<?php echo $cate['id_category'] ?>"> <?php echo $cate['title_category'] ?> </option>
      <?php
      }
      ?>
    </select>
  </div>

  <button type="submit" class="btn btn-default">Update San Pham</button>
</form>
  <?php
 }
  ?>
</div>