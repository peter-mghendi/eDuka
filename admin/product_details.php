<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#general_<?php echo $products_row[1]; ?>">General</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#specifics_<?php echo $products_row[1]; ?>">Specifics</a>
  </li>
</ul>

<div class="tab-content">
    <form action="<?php $PHP_SELF ?>" method="post" class="form" role="form" id="productForm"></form>
    
	<div class="tab-pane container active" id="general_<?php echo $products_row[1]; ?>">
        <div role="form" class="form mt-2">
            <div class="form-group">
                <input type="text" class="form-control" name="param" value="product" form="productForm" hidden>   
                <input type="text" class="form-control" name="token" value="<?php echo $products_row[1]?>" form="productForm" hidden>
            </div>
            <div class="custom-file">
                <label class="custom-file-label" for="product_pic">Select a photo</label><br>
                <input class="custom-file-input" type="file" name="product_pic" id="product_pic" accept=".png, .jpg" form="productForm">
            </div>
            <div class="form-group">
                <input type="text" class="form-control-plaintext" placeholder="Brand" name="brand" value="<?php echo $products_row[2]?>" form="productForm">
            </div>
            <div class="form-group">
                <input type="text" class="form-control-plaintext" placeholder="Name" name="name" value="<?php echo $products_row[3]?>" form="productForm">
            </div>
            <div class="form-group">
                <input type="text" class="form-control-plaintext" placeholder="Category" name="category" value="<?php echo $products_row[8]?>" form="productForm">
            </div>
            <div class="form-group">
				<select class="selectpicker set-title" name='status' data-width="100%" form="productForm">
        			<?php 
    					$status_list = array("available", "out of stock", "restocking");
        				foreach($status_list as $status){
		    	    		$selected = $status == $products_row[10]?"selected='selected'":"";
	        				echo "<option class='set-title' $selected>$status</option>";
                        } 
                    ?>
	  			</select>
			</div>
        </div>
    </div>

    <div class="tab-pane container fade" id="specifics_<?php echo $products_row[1]; ?>">
		<div  role="form" class="form mt-2">
            <div class="form-group">
                <textarea name="" id="" cols="30" rows="2" class="form-control-plaintext" placeholder="Description" name="description" form="productForm"><?php echo $products_row[4]?></textarea>
            </div>
            <div class="form-group">
                <input type="number" class="form-control-plaintext" placeholder="Old Price" name="old_price" value="<?php echo $products_row[5]?>" form="productForm">
            </div>
            <div class="form-group">
                <input type="number" class="form-control-plaintext" placeholder="Price" name="price" value="<?php echo $products_row[6]?>" form="productForm">
            </div>
            <div class="form-group">
                <input type="text" class="form-control-plaintext" placeholder="Tags" name="tags" value="<?php echo $products_row[9]?>" form="productForm">
            </div>
            <div class="form-group">
                <select class="selectpicker" name="saletype" data-width="100%"  form="productForm" multiple>
                    <?php 
    					$saletype_list = array("featured", "new", "popular", "flash", "monthly");
        				foreach($saletype_list as $saletype){
		    	    		$selected = in_array($saletype, explode(";", $products_row[7]))?"selected='selected'":"";
	        				echo "<option class='set-title' $selected>$saletype</option>";
                        } 
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>