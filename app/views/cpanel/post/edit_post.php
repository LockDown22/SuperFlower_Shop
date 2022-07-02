<?php 

if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
        echo '<span style="color:blue;font-weight:bold;">'.$value.'</span>';
    }  
}
?>
<h3 style="text-align:center;">Cập nhật Bài Viết</h3>
<div class="col-md-12">
  <?php 
    foreach($postbyid as $key =>$pos){
  ?>
<form action="<?php echo BASE_URL ?>post/update_post_flw/<?php echo $pos['id_post_flw']?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="email">Tên Bài Viết </label>
    <input type="text" value="<?php echo $pos['id_post_flw']?>" name="title_post_flw" class="form-control" required>
  </div>
  <div class="form-group">
    <label for="email">Hình ảnh Bài Viết</label>
    <input type="file" name="image_post_flw" class="form-control" >
    <p><img src="<?php echo BASE_URL?>public/uploads/post/<?php echo $pos['image_post_flw']?>" height="100px" width="100px"> </p>
  </div>
  <div class="form-group">
    <label for="email">Chi tiết Bài Viết</label>
    <textarea id="editor" name="content_post_flw" row="10" style="resize:none;"  class="form-control" required><?php echo $pos['content_post_flw']?> </textarea>
  </div>
  <div class="form-group">
    <label for="pwd">Danh Mục Bài Viết</label>
    <select class="form-control" name="category_post">
      <?php 
      foreach($post_category as $key => $cate){
      ?>
      <option <?php if($cate['id_post']==$pos['id_post']){echo 'selected';} ?>value="<?php echo $cate['id_post'] ?>"> <?php echo $cate['title_post'] ?> </option>
      <?php
      }
      ?>
    </select>
  </div>

  <button type="submit" class="btn btn-default">Thêm Bài viết</button>
</form>

<?php 
    }
  ?>
</div>