<button class="btn my-3" data-toggle="modal" data-target="#newAdminModal"><span class="fa fa-plus mr-2"></span>Register New Admin</button>
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
					<td><a class='btn'  href='index.php?&admin=2&action=delete&user=$admins_row[1]'><span class='fa fa-trash-alt'></span></a></td>
				</tr>";
			}?>
	</tbody>
</table>