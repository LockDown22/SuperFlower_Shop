<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo BASE_URL?>login/dashboard">Admin Control Panel</a>
    </div>
    <ul class="nav navbar-nav">

      <li class="active"><a href="<?php echo BASE_URL?>login/dashboard">Trang Chủ</a></li>

      <li><a href="#">About</a></li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh Mục Bài Viết
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="<?php echo BASE_URL?>post">Thêm</a></li>
          <li><a href="<?php echo BASE_URL?>post/list_category">Liệt kê</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Bài viêt
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="<?php echo BASE_URL?>post/add_post">Thêm</a></li>
          <li><a href="<?php echo BASE_URL?>post/list_post">Liệt kê</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Danh Mục Sản Phẩm
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo BASE_URL?>product">Thêm</a></li>
          <li><a href="<?php echo BASE_URL?>product/list_category">Liệt kê</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sản phẩm
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo BASE_URL?>product/add_product">Thêm</a></li>
          <li><a href="<?php echo BASE_URL?>product/list_product">Liệt kê</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Đơn hàng
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo BASE_URL?>order">Liệt kê</a></li>
        </ul>
      </li>
      <!-- <a href="<?php echo BASE_URL?>login/logout" class="">Logout</a> -->
      <li class="active"><a href="<?php echo BASE_URL?>login/logout">Logout</a></li>

    </ul>
  </div>
</nav>