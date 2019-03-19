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
	include 'assets/php/_admin.php';
	include 'assets/php/nav.php';
	include 'assets/php/modal.php';
?> 
<?php include 'assets/php/_notify.php'; ?>
	<div class="tab-content my-5">
  		<div class="tab-pane container <?php echo $_SESSION['active'] == 'users'?'active':'fade';?>" id="users">
		  <?php include 'users.php'; ?>
  		</div>
  		<div class="tab-pane container <?php echo $_SESSION['active'] == 'products'?'active':'fade';?>" id="products">
		  <?php include 'products.php'; ?>
  		</div>
  		<div class="tab-pane container <?php echo $_SESSION['active'] == 'admins'?'active':'fade';?>" id="admins">
		  <?php include 'admins.php'; ?>
  		</div>
		<div class="tab-pane container <?php echo $_SESSION['active'] == 'actions'?'active':'fade';?>" id="actions">
			  Actions
		</div>
	</div>
<?php 
	include 'assets/php/_js.php';
?>
</body>
</html>