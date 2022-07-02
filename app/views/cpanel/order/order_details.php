
<div class="container">
<h3 style="text-align:center;">Liệt Kê DOn Hang Chi Tiet</h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Tên Sản Phẩm</th>
        <th>Hình ảnh</th>
        <th>Số Lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        $i=0;
        $total = 0;
        foreach($order_details as $key => $ord){
            $total +=$ord['price_product']*$ord['product_quantity'];
            $i++;
        ?>
      <tr>
        <td><?php echo $i?></td>
        <td><?php echo $ord['title_product']?></td>
        <td><img src="<?php echo BASE_URL?>public/uploads/product/<?php echo $ord['image_product']?>" height="100px" width="100px"> </td>
        <td><?php echo $ord['product_quantity']?></td>
        <td><?php echo number_format($ord['price_product'],0,',','.').'Vnd' ?></td>
        <td><?php echo number_format($ord['price_product']*$ord['product_quantity'],0,',','.').'Vnd'?></td>
       
      </tr>
      <?php
       }
      ?>
      <tr>
      <td colspan="6">Total: <?php echo number_format($total,0,',','.').'Vnd' ?></td>
      </tr>
    </tbody>
  </table>
</div>