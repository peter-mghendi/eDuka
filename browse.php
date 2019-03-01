<?php 
    include 'assets/php/_connect.php';
    if (session_status() == PHP_SESSION_NONE) session_start();
    if (isset($_SESSION['token'])){
        include 'assets/php/account/edit.php';
        include 'assets/php/_add.php';
    } else {
        include 'assets/php/_login.php'; 
        include 'assets/php/_signup.php';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Browse | eDuka</title>
    <?php include 'assets/php/_css.php'; ?>
</head>
<body>
<?php 
    include 'assets/php/_nav.php';
?>
<div class="jumbotron-fluid bg-light" style='margin-top: 64px; padding: 8px;'>
<div class="container-fluid d-flex">
<button class="btn btn-outline-primary ml-auto my-3" data-toggle="collapse" data-target="#controls">
<span class="spinner-grow spinner-grow-sm"></span> Show/Hide Controls</button>
</div>

<div id="controls" class="collapse show">
<form action="$" method="post" class="form">
<div class="container">
<div class="form-group row">
    <div class="col-xs-12 col-sm-6 col-md-4"><label for="#search">Search Term:</label><input type="search" id='search' name='search' class="form-control"></div>
    <div class="col-xs-12 col-sm-6 col-md-4"><label for="brand">Brand:</label> <select name="cars" size="1" class="form-control" id='brand' name='brand'>
    <?php for($i=0; $i<4; $i++) echo " <option value='option$i'>Option $i</option>"; ?>
   </select></div>
    <div class="col-xs-12 col-sm-6 col-md-4"><label for="price">Price:</label><input type="range" class="form-control"  id='price' name='price'></div>
    <div class="col-xs-12 col-sm-6 col-md-4"><label for="category">Category:</label><input type="text" class="form-control" id='category' name='category'></div>
    <div class="col-xs-12 col-sm-6 col-md-4"><label for="saletype">Sale Type:</label><input type="text" class="form-control" id='saletype' name='saletype'></div>
    <div class="col-xs-12 col-sm-6 col-md-4"><label for="status">Status:</label><input type="text" class="form-control" id='status' name='status'></div>
    <div class="col-xs-12 col-sm-6 col-md-6"><input type="reset" class="btn btn-secondary btn-block"></div>
    <div class="col-xs-12 col-sm-6 col-md-6"><input type="submit"  class="btn btn-primary btn-block" id='filter' name='filter'></div>
</div></div>
</form>
</div> 
</div>
    
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/webfont.js"></script>
<script src="assets/js/main.js"></script>
<?php include 'assets/php/_error.php'; ?>
</body>
</html>