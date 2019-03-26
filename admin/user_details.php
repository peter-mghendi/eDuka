<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#overview_<?php echo $users_row[1]; ?>">Overview</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#activity_<?php echo $users_row[1]; ?>">Activity</a>
  </li>
</ul>

<?php
	$wishlist_result = mysqli_query($db, "SELECT wishlist.id, products.token, products.brand, products.name, products.price, products.status 
	FROM wishlist INNER JOIN products ON wishlist.product = products.token WHERE user = '$users_row[1]'") or die(mysqli_error($db));
	$cart_result = mysqli_query($db, "SELECT cart.id, products.token, products.brand, products.name, products.price, products.status, cart.quantity
	FROM cart INNER JOIN products ON cart.product = products.token WHERE user = '$users_row[1]'") or die(mysqli_error($db));
	$order_result = mysqli_query($db, "SELECT * FROM orders WHERE user = '$users_row[1]'");
	$wishlist_count = mysqli_num_rows($wishlist_result);
	$cart_count = mysqli_num_rows($cart_result);
	$order_count = mysqli_num_rows($order_result);
?>

<div class="tab-content">
	<div class="tab-pane container active" id="overview_<?php echo $users_row[1]; ?>">
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
    		<div class="col-md-8 col-sm-12 col-xs-12">
				<select class="selectpicker set-title" name='status' data-width="100%">
        			<?php 
    					$status_list = array("active", "suspended", "deactivated", "pending confirmation");
        					foreach($status_list as $status){
		    					$selected = $status == $users_row[5]?"selected='selected'":"";
	        					echo "<option class='set-title' $selected>$status</option>";
    	      		} ?>
	  			</select>
			</div>	  
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
			<div class="col-md-4 col-sm-12 col-xs-12">Orders:</div>
			<div class="col-md-8 col-sm-12 col-xs-12"><?php echo $order_count?></div>
		</div>  
  </div>

  <div class="tab-pane container fade" id="activity_<?php echo $users_row[1]; ?>">
		<ul class="nav nav-pills mt-1">
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
		<div class="tab-pane container active" id="wishlist_<?php echo $users_row[1]; ?>">
		<div class="row mt-2">
				<div class="col-md-9 col-sm-12 col-xs-12"><strong>Product ID/Name</strong></div>
				<div class="col-md-3 col-sm-12 col-xs-12"><strong>Price</strong></div>
			</div>
			<?php while($wishlist_row = mysqli_fetch_row($wishlist_result)):?>
				<div class="row mt-2">
					<div class="col-md-3 col-sm-12 col-xs-12"><?php echo $wishlist_row[1]; ?></div>
					<div class="col-md-6 col-sm-12 col-xs-12"><?php echo $wishlist_row[2].' '.$wishlist_row[3]; ?></div>
					<div class="col-md-3 col-sm-12 col-xs-12">Ksh.<?php echo $wishlist_row[4]; ?></div>
				</div>
			<?php endwhile; ?>
		</div>
		<div class="tab-pane container fade" id="cart_<?php echo $users_row[1]; ?>">
			<div class="row mt-2">
				<div class="col-md-8 col-sm-12 col-xs-12"><strong>Product ID/Name</strong></div>
				<div class="col-md-2 col-sm-12 col-xs-12"><strong>Qty</strong></div>
				<div class="col-md-2 col-sm-12 col-xs-12"><strong>Price</strong></div>
			</div>
			<?php while($cart_row = mysqli_fetch_row($cart_result)):?>
				<div class="row mt-2">
					<div class="col-md-2 col-sm-12 col-xs-12"><?php echo $cart_row[1]; ?></div>
					<div class="col-md-6 col-sm-12 col-xs-12"><?php echo $cart_row[2].' '.$cart_row[3]; ?></div>
					<div class="col-md-2 col-sm-12 col-xs-12"><?php echo $cart_row[6]; ?></div>
					<div class="col-md-2 col-sm-12 col-xs-12">Ksh.<?php echo $cart_row[4]; ?></div>
				</div>
			<?php endwhile; ?>
		</div>
		<div class="tab-pane container fade" id="orders_<?php echo $users_row[1]; ?>">
			<div class="row mt-2">
					<div class="col-md-4 col-sm-12 col-xs-12"><strong>Order ID</strong></div>
					<div class="col-md-2 col-sm-12 col-xs-12"><strong>Qty</strong></div>
					<div class="col-md-3 col-sm-12 col-xs-12"><strong>Cost</strong></div>
					<div class="col-md-3 col-sm-12 col-xs-12"><strong>Status</strong></div>
			</div>
			<?php while($order_row = mysqli_fetch_row($order_result)):
				$cost = 0;
				$product_array = explode(";", $order_row[3]);
				$qty_array = explode(";", $order_row[4]);
				foreach ($product_array as $key => $product) {
					$sql = "SELECT price FROM products WHERE token = '$product'";
					$product_price = mysqli_fetch_row(mysqli_query($db, $sql)) or die(mysqli_error($db));
					$cost = $cost + ($qty_array[$key]*$product_price[0]);
				}
				$qty = array_sum($qty_array);
			?>
				<div class="row mt-2">
					<div class="col-md-4 col-sm-12 col-xs-12"><?php echo $order_row[1]; ?></div>
					<div class="col-md-2 col-sm-12 col-xs-12"><?php echo $qty; ?></div>
					<div class="col-md-3 col-sm-12 col-xs-12"><?php echo $cost; ?></div>
					<div class="col-md-3 col-sm-12 col-xs-12"><?php echo $order_row[5]; ?></div>
				</div>
			<?php endwhile; ?>
			</div>
		</div>
  </div>
</div>