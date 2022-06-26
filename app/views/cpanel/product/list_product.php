<?php 

if(!empty($_GET['msg'])){
    $msg = unserialize(urldecode($_GET['msg']));
    foreach ($msg as $key => $value){
        echo '<span style="color:blue;font-weight:bold;">'.$value.'</span>';
    }
   
}


?>
<div class="container">
<h3 style="text-align:center;">Liệt Kê Sản Phẩm</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Tên Sản Phẩm</th>
        <th>Anh Sản Phẩm</th>
        <th>Danh Muc</th>
        <th>Giá Sản Phẩm</th>
        <th>Số Lượng</th>
        <th>Mô tả</th>
        <th>Quản Lý</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        $i=0;
        foreach($product as $key => $pro){

            $i++;
        ?>
      <tr>
        <td><?php echo $i?></td>
        <td><?php echo $pro['title_product']?></td>
        <td><img src="<?php echo BASE_URL?>public/uploads/product/<?php echo $pro['image_product']?>" height="100px" width="100px"> </td>
        <td><?php echo $pro['title_category']?></td>
        <td><?php echo number_format($pro['price_product'],0,',','.').'đ' ?></td>
        <td><?php echo $pro['quantity_product']?></td>
        <td><?php echo $pro['desc_product']?></td>
        <td><a href="<?php echo BASE_URL?>product/delete_product/<?php echo $pro['id_product'] ?>">Delete</a>||<a 
        href="<?php echo BASE_URL?>product/edit_product/<?php echo $pro['id_product'] ?>">Update</a></td>
      </tr>
      <?php
       }
      ?>
    </tbody>
  </table>
</div>