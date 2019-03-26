<table class="table table-hover datatable" role="table">
	<thead>
		<tr>
			<th></th>
			<th>Product ID</th>
			<th>Brand</th>
			<th>Name</th>
			<th>Price</th>
			<th>Status</th>
			<th></th>
		</tr>		
	</thead>
	<tbody>
		<?php 
			$products_query = "SELECT * FROM products";
			$products_result = mysqli_query($db, $products_query);
			while ($products_row = mysqli_fetch_row($products_result)) {
				echo 
				"<tr>
					<td><img src='../assets/images/products/$products_row[1].jpg' alt='$products_row[2]' class='img-fluid' style='height:32px; width:32px;'></td>
					<td>$products_row[1]</td>
					<td>$products_row[2]</td>
					<td>$products_row[3]</td>
  					<td>$products_row[6]</td>
					<td class='set-title'>$products_row[10]</td>
					<td>
						<button class='btn btn-primary' data-toggle='modal' data-target='#productModal_$products_row[1]'>Details</button>
						<a class='btn' href='index.php?&admin=1&action=delete&product=$products_row[1]'>
                            <span class='fa fa-trash-alt m-2'></span></a>
					</td>
				</tr>
				<tr>
					<td>
						<div class='modal fade' id='productModal_$products_row[1]'>
							<div class='modal-dialog'>
								<div class='modal-content'>
									<div class='modal-header'>
										<img src='../assets/images/products/$products_row[1].jpg' alt='$products_row[3] $products_row[3]' class='img-fluid rounded-circle align-middle mr-2' style='height:32px; width:32px;'>
										<h4 class='modal-title'>$products_row[2] $products_row[3] - Product Details</h4>
										<button type='button' class='close' data-dismiss='modal'>&times;</button>
									</div>
									<div class='modal-body'>";
										include 'product_details.php';
				echo 
									"</div>
									<div class='modal-footer d-flex mt-2'>
										<p class='mx-auto'>Product ID: $products_row[1]</p>
									</div>
								</div>
							</div>
						</div>
					</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>";
			}?>
	</tbody>
</table>