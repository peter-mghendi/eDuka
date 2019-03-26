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
						<button class='btn btn-primary'>Details</button>
						<button class='btn'><span class='fa fa-trash-alt m-2'></span></button>
					</td>
				</tr>
				<tr>
					<td><img src='../assets/images/products/$products_row[1].jpg' alt='$products_row[2]' class='img-fluid' style='height:32px; width:32px;'></td>
					<td>$products_row[1]</td>
					<td>$products_row[2]</td>
					<td>$products_row[3]</td>
  					<td>$products_row[6]</td>
					<td class='set-title'>$products_row[10]</td>
					<td>
						<button class='btn btn-primary'>Details</button>
						<button class='btn'><span class='fa fa-trash-alt m-2'></span></button>
					</td>
				</tr>";
			}?>
	</tbody>
</table>