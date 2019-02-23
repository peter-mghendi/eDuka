<?php  
echo
"<div class='modal fade' id='productModal_$set_row[1]'>
  <div class='modal-dialog'>
    <div class='modal-content'>

      <div class='modal-header'>
        <h4>Product Details</h4>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
      </div>

      <div class='modal-body'>
        <div class='d-flex'><img src='assets/images/products/$set_row[1].jpg' alt='' class='mx-auto' style='width: 70%'></div>
        <h4><strong style='text-transform: uppercase'>$set_row[2]</strong> $set_row[3]</h4>
        <h5><strong>Ksh. $set_row[6]</strong></h5><p>$set_row[4]</p>
      </div>

      <div class='modal-footer d-flex'><div class='mx-auto'>".
        # Check whether product is in cart and add relevant buttons
        "<button class='btn btn-primary'><span class='fa fa-share-alt'></span> Share</button>
        <a href='index.php?&list=wishlist&user=$user&product=$product'  class='btn btn-success'><span class='$wished fa-star'></span> $wished_status</a>
        <button class='btn btn-warning'><span class='fa fa-cart-plus'></span> Add to cart</button>
        <button class='btn btn-danger' data-dismiss='modal'><span class='fa fa-times'></span> Cancel</button>
      </div></div>

    </div>
  </div>
</div>";