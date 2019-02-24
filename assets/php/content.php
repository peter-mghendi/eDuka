<?php $slides = 4; $num=4; $user = $_SESSION['token']; $productSets=array("new", "popular", "monthly", "flash"); ?>
<main role="main">
  <div class="container margin-vertical">
    <div id="myCarousel" class="carousel slide bg-dark" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php $i = 0;
        $set_query = "SELECT * FROM products";
        $set_result = mysqli_query($db, $set_query) or die(mysqli_error($db));
        while(($set_row = mysqli_fetch_row($set_result)) && ($i<$slides)){
          $categories = explode(";", $set_row[7]);
          if(!in_array("featured", $categories)) continue;
          $state = ($i==0)?"active":"";
          echo "<li data-target='#myCarousel' data-slide-to='$i' class='$state'></li>";
          $i++;}?>
      </ol>
      <div class="carousel-inner" role="listbox">
        <?php $i = 0;
        $set_query = "SELECT * FROM products";
        $set_result = mysqli_query($db, $set_query) or die(mysqli_error($db));
        while(($set_row = mysqli_fetch_row($set_result)) && ($i<$slides)){
          $categories = explode(";", $set_row[7]);
          if(!in_array("featured", $categories)) continue;
          $state = ($i==0)?"active":"";
          echo "<div class='carousel-item $state'><img src='assets/images/products/$set_row[1].jpg' alt='Image'>
            <div class='carousel-caption text-right'><small><h6 style='text-transform: uppercase'>$set_row[2]</h6></small><h1>$set_row[3]</h1><p>$set_row[4]</p>
            <h5 class='list-price text-danger'>Was: <s>Kshs. $set_row[5]</s></h5> <h4>Now: Ksh. $set_row[6]</h4></div></div>"; 
            $i++; }?>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
      <a class="carousel-control-next" href="#myCarousel" data-slide="next"><span class="carousel-control-next-icon"></span></a>
    </div></div>
  <nav class="container secondary-nav">
    <ul class="nav justify-content-center">
      <li class="nav-item"><a href="#new" class="nav-link">New</a></li>
      <li class="nav-item"><a href="#popular" class="nav-link">Popluar</a></li>
      <li class="nav-item"><a href="#monthly" class="nav-link">
          <?php echo date("F");?></a></li>
      <li class="nav-item"><a href="#flash" class="nav-link">Flash Sales</a></li>
    </ul>
  </nav>
  <div class="album py-5 bg-light">
    <div class="container">
    <?php foreach ($productSets as $productSet){
      echo "<div class='container-fluid product-set' id='new'><div class='d-flex'><h3 class='set-title'>$productSet items</h3><h3 class='ml-auto'><small><a href='#'>SEE MORE >></a></small></h3></div><hr><div class='row'>";
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