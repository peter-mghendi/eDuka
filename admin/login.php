<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login | eDuka</title>
    <?php include 'assets/php/_css.php'; ?>
</head>
<body>
<?php 
    include 'assets/php/nav.php';
    include 'assets/php/modal.php';
?> 
<div class="container d-flex">
	<div class="card w-50 mx-auto mt-5">
		<div class="card-header">
			<h4 class="card-title">Administrator Login</h4>
		</div>
		<div class="card-body">
		<form class="form" role="form" method="post" action="<?php $_PHP_SELF ?>">
    		<div class="form-group">
		        <label for="user">Username</label>
        		<input type="email" class="form-control" name="user" id="user" placeholder="Your Username" autocomplete="off" required>
		    </div>

		    <div class="form-group">
        		<label for="pass">Password</label>
        		<input type="password" class="form-control" name="pass" id="pass" placeholder="Your Password" autocomplete="off" required>
		    </div>

    		<div class="d-flex"><button type="submit" class="btn btn-other btn-block mx-auto" name="submit">Sign In</button></div>
		</div>  	
		</form>
		<div class="card-footer">
			<p>&copy eDuka <?php echo date("Y");?>. All rights reserved.</p>
		</div>
	</div>
</div>
<?php 
	include 'assets/php/_js.php';
	include 'assets/php/_error.php';
?>
</body>
</html>
