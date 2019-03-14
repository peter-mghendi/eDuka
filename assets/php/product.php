<?php 
$page = basename($_SERVER['PHP_SELF']);
$wish_attrib = isset($_SESSION['user'])?"href='$page?&list=wishlist&user=$user&product=$product'":"data-toggle='modal' href='#loginModal'";
$cart_attrib = isset($_SESSION['user'])?"href='$page?&list=cart&user=$user&product=$product'":"data-toggle='modal' href='#loginModal'";
echo "<div class='col-md-3'><div class='card mb-3 shadow-sm'>
<img src='assets/images/products/$set_row[1].jpg' id='images'>
  <div class='card-body'><small><h6 style='text-transform: uppercase'>$set_row[2]</h6></small><h5>$set_row[3]</h5>
  <p class='list-price text-danger'>List Price: <s>Kshs. $set_row[5]</s></p><p class='price'>Our Price: Kshs. $set_row[6]</p>       
  <div class='d-flex justify-content-between align-items-center'><div class='mx-auto'>
      <button type='button' class='btn btn-sm btn-success product-btn' data-toggle='modal' data-target='#productModal_$set_row[1]' data-id='$set_row[1]'>View Details</button>
      <a class='btn btn-sm btn-warning' $cart_attrib><i class='fa fa-cart-plus' aria-hidden='true'></i> Add</a>
      <a class='btn btn-sm btn-link' $wish_attrib><i class='$wished fa-star' aria-hidden='true'></i></a>
  </div></div></div></div></div>";