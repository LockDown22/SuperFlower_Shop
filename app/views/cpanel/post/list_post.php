<?php 

if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
        echo '<span style="color:blue;font-weight:bold;">'.$value.'</span>';
    }
   
}


?>
<div class="container">
<h3 style="text-align:center;">Liệt Kê Bai Viet</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Tên Bai Viet</th>
        <th>Anh Bai Viet</th>
        <th>Danh Muc</th>
        <th>Quản Lý</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        $i=0;
        foreach($post as $key => $po){
            $i++;
        ?>
      <tr>
        <td><?php echo $i?></td>
        <td><?php echo $po['title_post_flw']?></td>
        <td><img src="<?php echo BASE_URL?>public/uploads/post/<?php echo $po['image_post_flw']?>" height="100px" width="100px"> </td>
        <td><?php echo $po['title_post']?></td>
        <td><a href="<?php echo BASE_URL?>post/delete_post/<?php echo $po['id_post_flw'] ?>">Delete</a>||<a 
        href="<?php echo BASE_URL?>post/edit_post/<?php echo $po['id_post_flw'] ?>">Update</a></td>
      </tr>
      <?php
       }
      ?>
    </tbody>
  </table>
</div>