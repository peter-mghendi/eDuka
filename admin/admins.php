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