<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#overview_<?php echo $users_row[1]; ?>">Overview</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#activity_<?php echo $users_row[1]; ?>">Activity</a>
  </li>
</ul>

<div class="tab-content">
  <div class="tab-pane container active" id="overview_<?php echo $users_row[1]; ?>">
    <?php
      $wishlist_count = mysqli_num_rows(mysqli_query($db, "SELECT * FROM wishlist WHERE user = '$users_row[1]'"));
      $cart_count = mysqli_num_rows(mysqli_query($db, "SELECT * FROM cart WHERE user = '$users_row[1]'"));
      $order_count = mysqli_num_rows(mysqli_query($db, "SELECT * FROM orders WHERE user = '$users_row[1]'"));
    ?>
    <div class="row mt-2">
      <div class="col-md-4 col-sm-12 col-xs-12">Username:</div>
      <div class="col-md-8 col-sm-12 col-xs-12"><?php echo $users_row[2]?></div>
    </div>
    <div class="row mt-2">
      <div class="col-md-4 col-sm-12 col-xs-12">Email Address:</div>
      <div class="col-md-8 col-sm-12 col-xs-12"><?php echo $users_row[3]?></div>
    </div>
    <div class="row mt-2">
      <div class="col-md-4 col-sm-12 col-xs-12">Status:</div>
      <div class="col-md-8 col-sm-12 col-xs-12"><?php echo $users_row[5]?></div>
    </div><hr>
    <div class="row mt-2">
      <div class="col-md-4 col-sm-12 col-xs-12">Wishlist Items:</div>
      <div class="col-md-8 col-sm-12 col-xs-12"><?php echo $wishlist_count?></div>
    </div>
    <div class="row mt-2">
      <div class="col-md-4 col-sm-12 col-xs-12">Cart Items:</div>
      <div class="col-md-8 col-sm-12 col-xs-12"><?php echo $cart_count?></div>
    </div>
    <div class="row mt-2">
      <div class="col-md-4 col-sm-12 col-xs-12">Ordered Items:</div>
      <div class="col-md-8 col-sm-12 col-xs-12"><?php echo $order_count?></div>
    </div>  
  </div>
  <div class="tab-pane container fade" id="activity_<?php echo $users_row[1]; ?>">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" href="#wishlist_<?php echo $users_row[1]; ?>">Wishlist</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#cart_<?php echo $users_row[1]; ?>">Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#orders_<?php echo $users_row[1]; ?>">Orders</a>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane container active" id="wishlist_<?php echo $users_row[1]; ?>">Wishlist</div>
      <div class="tab-pane container fade" id="cart_<?php echo $users_row[1]; ?>">Cart</div>
      <div class="tab-pane container fade" id="orders_<?php echo $users_row[1]; ?>">Orders</div>
    </div>
  </div>
</div>