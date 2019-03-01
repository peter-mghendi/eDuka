<?php echo "<div class='col-md-3'><div class='card mb-3 shadow-sm'>
<img src='assets/images/products/$set_row[1].jpg' id='images'>
  <div class='card-body'><small><h6 style='text-transform: uppercase'>$set_row[2]</h6></small><h5>$set_row[3]</h5>
  <p class='list-price text-danger'>List Price: <s>Kshs. $set_row[5]</s></p><p class='price'>Our Price: Kshs. $set_row[6]</p>       
  <div class='d-flex justify-content-between align-items-center'><div class='mx-auto'>
      <button type='button' class='btn btn-sm btn-success product-btn' data-toggle='modal' data-target='#productModal_$set_row[1]' data-id='$set_row[1]'>View Details</button>
      <a href='index.php?&list=cart&user=$user&product=$product' class='btn btn-sm btn-warning'><i class='fa fa-cart-plus' aria-hidden='true'></i> Add</a>
      <a href='index.php?&list=wishlist&user=$user&product=$product' class='btn btn-sm btn-link'><i class='$wished fa-star' aria-hidden='true'></i></a>
  </div></div></div></div></div>";