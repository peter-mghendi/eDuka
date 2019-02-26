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
    <title>Offers | eDuka</title>
    <?php include 'assets/php/_css.php'; ?>
</head>
<body>
<?php include 'assets/php/_nav.php';
$num=8; $user = $_SESSION['token']; $productSets=array("new", "popular", "monthly", "flash"); ?>
<div class="album py-5 bg-light">
    <div class="container">
    <?php foreach ($productSets as $productSet){ $title = $productSet=='monthly'?date('F'):$productSet;
      echo "<div class='jumbotron d-flex'><p class='align-middle mx-auto my-auto set-title'>$title</p></div>";
      echo "<div class='container-fluid product-set' id='new'><div class='d-flex'><h3 class='set-title'>$title items</h3><h3 class='ml-auto'><small><a href='#'>SEE MORE >></a></small></h3></div><hr><div class='row'>";
      $i = 0;
      $set_query = "SELECT * FROM products";
      $set_result = mysqli_query($db, $set_query) or die(mysqli_error($db));
      while(($set_row = mysqli_fetch_row($set_result)) && ($i<$num)){
        $categories = explode(";", $set_row[7]);
        $product = $set_row[1];
        $wished_query = "SELECT * FROM wishlist WHERE user = '$user' AND product = '$product'";
        $wished_result = mysqli_query($db, $wished_query) or die(mysqli_error());
        $wished_count = mysqli_num_rows($wished_result);
        $wished = ($wished_count == 1)?"fa":"far";
        $wished_status = ($wished_count == 1)?"Added":"Add";
        if(!in_array("$productSet", $categories)) continue;
        include 'assets/php/product.php';
        include 'assets/php/details.php';
        $i++;}
      echo "</div></div>"; }?>
</div></div>
    
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/webfont.js"></script>
<script src="assets/js/main.js"></script>
<?php include 'assets/php/_error.php'; ?>
</body>
</html>