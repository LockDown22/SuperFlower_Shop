<?php 

if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
        echo '<span style="color:blue;font-weight:bold;">'.$value.'</span>';
    }  
}
?>
<h3 style="text-align:center;">Thêm Bài Viết</h3>
<div class="col-md-12">
<form action="<?php echo BASE_URL ?>post/insert_post" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="email">Tên Bài Viết </label>
    <input type="text" name="title_post_flw" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="email">Hình ảnh Bài Viết</label>
    <input type="file" name="image_post_flw" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="email">Chi tiết Bài Viết</label>
    <textarea id="editor" name="content_post_flw" row="10" style="resize:none;"  class="form-control" required> </textarea>
  </div>
  <div class="form-group">
    <label for="pwd">Danh Mục Bài Viết</label>
    <select class="form-control" name="category_post">
      <?php 
      foreach($category as $key => $cate){
      ?>
      <option value="<?php echo $cate['id_post'] ?>"> <?php echo $cate['title_post'] ?> </option>
      <?php
      }
      ?>
    </select>
  </div>

  <button type="submit" class="btn btn-default">Thêm Danh Mục</button>
</form>
</div>