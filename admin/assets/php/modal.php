<div class="modal fade" id="newUserModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Register New User</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form" role="form" method="post" action="<?php $_PHP_SELF ?>">
					<div class="form-group">
						<input type="text" class="form-control-plaintext" name="name" placeholder="Username" maxlength="100"
							autocomplete="off" required>
					</div>
					<div class="form-group">
						<input type="email" class="form-control-plaintext" name="email" placeholder="Email Address"
							maxlength="100" autocomplete="off" required>
					</div>
					<div class="d-flex">
						<button type="submit" class="btn btn-other btn-block mx-auto" name="addUser">Register</button>
					</div>
				</form>
			</div>
			<div class="modal-footer  d-flex">
				<p class="mx-auto"><strong>NOTE:</strong> Default password '<?php echo $GLOBALS['default_password'] ?>'	will be	used.</p>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="newProductModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add New Product</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
					<form action="<?php $PHP_SELF ?>" method="post" class="form" role="form" id="newProductForm"></form>
					<div role="form" class="form mt-2">						
						<div class="form-group">
							<input type="text" class="form-control-plaintext" placeholder="Brand" name="brand" form="newProductForm">
						</div>
						<div class="form-group">
							<input type="text" class="form-control-plaintext" placeholder="Name" name="name" form="newProductForm">
						</div>
						<div class="form-group">
							<input type="text" class="form-control-plaintext" placeholder="Category" name="category" form="newProductForm">
						</div>
						<div class="form-group">
							<textarea name="" id="" cols="30" rows="2" class="form-control-plaintext" placeholder="Description" name="description" form="newProductForm"></textarea>
						</div>
						<div class="form-group">
							<input type="number" class="form-control-plaintext" placeholder="Price" name="price" form="newProductForm">
						</div>
						<div class="d-flex">
							<button type="submit" class="btn btn-other btn-block mx-auto" name="addProduct" form="newProductForm">Add</button>
						</div>
					</div>
				</div>
				<div class="modal-footer  d-flex">
					<p class="mx-auto">Product can be edited via the "Details" option.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="newAdminModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add New Admin</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
					<form action="<?php $PHP_SELF ?>" method="post" class="form" role="form" id="newAdminForm"></form>
					<div role="form" class="form mt-2">						
						<div class="form-group">
							<input type="text" class="form-control-plaintext" placeholder="Username" name="username" form="newAdminForm">
						</div>
						<div class="form-group">
							<input type="password" class="form-control-plaintext" placeholder="Password" name="password" form="newAdminForm">
						</div>
						<div class="form-group">
							<input type="text" class="form-control-plaintext" placeholder="Role" name="role" form="newAdminForm">
						</div>
						<div class="d-flex">
							<button type="submit" class="btn btn-other btn-block mx-auto" name="addAdmin" form="newAdminForm">Register</button>
						</div>
					</div>
				</div>
				<div class="modal-footer  d-flex">
					<p class="mx-auto">Admin details are permanent and cannot be edited.</p>
				</div>
			</div>
		</div>
	</div>
</div>