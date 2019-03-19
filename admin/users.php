<button class="btn my-3" data-toggle="modal" data-target="#newUserModal"><span class="fa fa-plus mr-2"></span>Register New User</button>
<div class="table-responsive">
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
        									<img src='../assets/images/users/$users_row[1].jpg' alt='$users_row[2]' class='img-fluid rounded-circle align-middle mr-2' style='height:32px; width:32px;'><h4 class='modal-title'>$users_row[2] - User Details</h4>
        									<button type='button' class='close' data-dismiss='modal'>&times;</button>
      									</div>
                                          <div class='modal-body'>";
                                        include 'user_details.php';
                                        echo 
      									"</div>
      									<div class='modal-footer  d-flex'>
        								<p class='mx-auto'>User ID: $users_row[1]</p>
      							</div></div></div></div>";
  						}?>
  				</tbody>
  			</table>