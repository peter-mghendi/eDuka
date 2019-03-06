<?php if (!isset($_SESSION['admin'])) header("location: login.php"); ?>
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
	# Page content...
<?php 
	include 'assets/php/_js.php';
	include 'assets/php/_error.php';
?>
</body>
</html>