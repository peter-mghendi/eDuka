<?php 
	$default_password = "Maseno2019";
	global $default_password;
	if (session_status() == PHP_SESSION_NONE) session_start();
	if (isset($_GET['logout'])) session_destroy();
	if (!isset($_SESSION['admin'])) header("location: login.php"); 
	include 'assets/php/_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Home | eDuka</title>
    <?php include 'assets/php/_css.php'; ?>
</head>
<body>
<?php 
    include 'assets/php/nav.php';
    include 'assets/php/modal.php';
?> 
	<div class="tab-content my-5">
  		<div class="tab-pane container active" id="users">
		  <button class="btn my-3" data-toggle="modal" data-target="#newUserModal"><span class="fa fa-plus mr-2"></span>Register New User</button>
  			<table class="table table-hover datatable" role="table">
  				<thead>
  					<tr>
  						<th></th>
  						<th>User ID</th>
  						<th>Username</th>
	  					<th>Actions</th>
  					</tr>		
  				</thead>
  				<tbody>
  					<?php 
  						$users_query = "SELECT * FROM users";
  						$users_result = mysqli_query($db, $users_query);
  						while ($users_row = mysqli_fetch_row($users_result)) {
  							echo 
  							"<tr>
  								<td><img src='../assets/images/users/$users_row[1].jpg' alt='$users_row[2]' class='img-fluid rounded-circle' style='height:32px; width:32px;'></td>
  								<td>$users_row[1]</td>
  								<td>$users_row[2]</td>
	  							<td>
	  								<button class='btn btn-primary mx-2' data-toggle='modal' data-target='#userModal_$users_row[1]'>Details</button>
	  								<button class='btn'><span class='fa fa-trash-alt m-2'></span></button>
	  								<button class='btn'><span class='fa fa-undo-alt m-2'></span></button>
	  							</td>
							  </tr>";
							  echo
							  "<div class='modal fade' id='userModal_$users_row[1]'>
  								<div class='modal-dialog'>
   									<div class='modal-content'>
      									<div class='modal-header'>
        									<h4 class='modal-title'>$users_row[2] - User Details</h4>
        									<button type='button' class='close' data-dismiss='modal'>&times;</button>
      									</div>
      									<div class='modal-body'>
      
      									</div>
      									<div class='modal-footer  d-flex'>
        								<p class='mx-auto'>User ID: $users_row[1]</p>
      							</div></div></div></div>";
  						}?>
  				</tbody>
  			</table>
  		</div>
  		<div class="tab-pane container fade" id="products">
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
  								<td><img src='../assets/images/products/$products_row[1].jpg' alt='$products_row[2]' class='img-fluide' style='height:32px; width:32px;'></td>
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
  		</div>
  		<div class="tab-pane container fade" id="admins">
  			<table class="table table-hover datatable" role="table">
  				<thead>
  					<tr>
  						<th>Username</th>
  						<th>Role</th>
	  					<th></th>
  					</tr>		
  				</thead>
  				<tbody>
  					<?php 
  						$admins_query = "SELECT * FROM admins";
  						$admins_result = mysqli_query($db, $admins_query);
  						while ($admins_row = mysqli_fetch_row($admins_result)) {
  							echo 
  							"<tr>
  								<td>$admins_row[1]</td>
  								<td class='set-title'>$admins_row[3]</td>
	  							<td><button class='btn btn-primary'>Details</button></td>
  							</tr>";
  					}?>
  				</tbody>
  			</table>
  		</div>
  		<div class="tab-pane container fade" id="actions">Actions</div>
	</div>
<?php 
	include 'assets/php/_js.php';
	include 'assets/php/_error.php';
?>
</body>
</html>