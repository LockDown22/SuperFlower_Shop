<?php 

if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
        echo '<span style="color:blue;font-weight:bold;">'.$value.'</span>';
    }
   
}


?>
<div class="container">
<h3 style="text-align:center;">Liệt Kê Danh Mục Bai Viet</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Tên Danh Mục</th>
        <th>Mô tả</th>
        <th>Quản Lý</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        $i=0;
        foreach($category as $key => $cate){

            $i++;
        ?>
      <tr>
        <td><?php echo $i?></td>
        <td><?php echo $cate['title_post']?></td>
        <td><?php echo $cate['desc_post']?></td>
        <td><a href="<?php echo BASE_URL?>post/delete_category/<?php echo $cate['id_post'] ?>">Delete</a>||<a 
        href="<?php echo BASE_URL?>post/edit_category/<?php echo $cate['id_post'] ?>">Update</a></td>
      </tr>
      <?php
       }
      ?>
    </tbody>
  </table>
</div>