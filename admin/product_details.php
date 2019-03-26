<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#view_<?php echo $products_row[1]; ?>">View</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#edit_<?php echo $products_row[1]; ?>">Edit</a>
  </li>
</ul>

<?php
	// db stuff
?>

<div class="tab-content">
	<div class="tab-pane container active" id="view_<?php echo $products_row[1]; ?>">
    	<div class="row mt-2">
    		<div class="col-md-4 col-sm-12 col-xs-12">Brand:</div>
    		<div class="col-md-8 col-sm-12 col-xs-12"><?php echo $products_row[2]?></div>
	    </div>
    	<div class="row mt-2">
		    <div class="col-md-4 col-sm-12 col-xs-12">Name:</div>
      		<div class="col-md-8 col-sm-12 col-xs-12"><?php echo $products_row[3]?></div>
    	</div>
    	<div class="row mt-2">
    		<div class="col-md-4 col-sm-12 col-xs-12">Status:</div>
    		<div class="col-md-8 col-sm-12 col-xs-12">
				<select class="selectpicker set-title" name='status' data-width="100%">
        			<?php 
    					$status_list = array("available", "out of stock", "restocking");
        					foreach($status_list as $status){
		    					$selected = $status == $products_row[5]?"selected='selected'":"";
	        					echo "<option class='set-title' $selected>$status</option>";
    	      		} ?>
	  			</select>
			</div>	  
    	</div>
    </div>

    <div class="tab-pane container fade" id="edit_<?php echo $products_row[1]; ?>">
		<form action="<? $PHP_SELF ?>" method="post" role="form" class="form mt-2">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Brand" name="brand">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="name">
            </div>
            <div class="form-group">
                <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Description" name="description"></textarea>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Old Price" name="old_price">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" placeholder="Price" name="price">
            </div>
            <div class="form-group">
                <select class="custom-select" name="saletype"  multiple></select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Category" name="category">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Tags" name="tags">
            </div>
            <div class="form-group">
                <select class="custom-select" name="status"></select>
            </div>
        </form>
    </div>
</div>