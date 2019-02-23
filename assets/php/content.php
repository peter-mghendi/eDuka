<?php $slides = 4; $num=4; $user = $_SESSION['token'];
#$images = array("assets/images/smartHD.jpg", "assets/images/flexiblekyb.jpg", "assets/images/IdeapadLarge.jpg", "assets/images/flexiblekyb.jpg"); 
#$titles = array("HD Monitor", "Flexiboard", "Lappytop", "Flexiboard Again");
#$descriptions = array("View all your movies and games in ultra sharp Full HD quality", "Roll it up and take it with you wherever you go", "The ultimate students' laptop, built to cater to your every need", "I already discussed this one. Roll it up...");
?>
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
          $i++;
      } ?>
      </ol>

      <!-- Wrapper for slides -->
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

      <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </div>

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
      <div class="container-fluid product-set" id="new">
        <div class="d-flex">
          <h3>New Items</h3>
          <h3 class="ml-auto"><small><a href="#">SEE MORE >></a></small></h3>
        </div>
        <hr>
        <div class="row">
          <?php 
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
              if(!in_array("new", $categories)) continue;
              echo "<div class='col-md-3'><div class='card md-3 shadow-sm'>
                <img src='assets/images/products/$set_row[1].jpg' id='images'>
                  <div class='card-body'><small><h6 style='text-transform: uppercase'>$set_row[2]</h6></small><h5>$set_row[3]</h5>
                  <p class='list-price text-danger'>List Price: <s>Kshs. $set_row[5]</s></p><p class='price'>Our Price: Kshs. $set_row[6]</p>       
                  <div class='d-flex justify-content-between align-items-center'><div class='mx-auto'>
                      <button type='button' class='btn btn-sm btn-success product-btn' data-toggle='modal' data-target='#productModal_$set_row[1]' data-id='$set_row[1]'>View Details</button>
                      <a href='#' class='btn btn-sm btn-warning'><i class='fa fa-cart-plus' aria-hidden='true'></i> Add</a>
                      <a href='index.php?&list=wishlist&user=$user&product=$product' class='btn btn-sm btn-link'><i class='$wished fa-star' aria-hidden='true'></i></a>
                  </div></div>
                </div>
              </div>
              </div>";
              include 'assets/php/details.php';
              $i++;
            } ?>
        </div>
      </div>


      <div class="container-fluid product-set" id="popular">
        <div class="d-flex">
          <h3>Popular Items</h3>
          <h3 class="ml-auto"><small><a href="#">SEE MORE >></a></small></h3>
        </div>
        <hr>
        <div class="row">
          <?php 
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
          if(!in_array("popular", $categories)) continue;
          echo "<div class='col-md-3'><div class='card md-3 shadow-sm'>
            <img src='assets/images/products/$set_row[1].jpg' id='images'>
              <div class='card-body'><small><h6 style='text-transform: uppercase'>$set_row[2]</h6></small><h5>$set_row[3]</h5>
              <p class='list-price text-danger'>List Price: <s>Kshs. $set_row[5]</s></p><p class='price'>Our Price: Kshs. $set_row[6]</p>       
              <div class='d-flex justify-content-between align-items-center'><div class='mx-auto'>
                  <button type='button' class='btn btn-sm btn-success product-btn' data-toggle='modal' data-target='#productModal_$set_row[1]' data-id='$set_row[1]'>View Details</button>
                  <a href='#' class='btn btn-sm btn-warning'><i class='fa fa-cart-plus' aria-hidden='true'></i> Add</a>
                  <a href='index.php?&list=wishlist&user=$user&product=$product' class='btn btn-sm btn-link'><i class='$wished fa-star' aria-hidden='true'></i></a>
              </div></div>
            </div>
          </div>
          </div>";
          include 'assets/php/details.php';
          $i++;
        } ?>
        </div>
      </div>

      <div class="container-fluid product-set" id="monthly">
        <div class="d-flex">
          <h3>
            <?php echo date("F");?> Sales</h3>
          <h3 class="ml-auto"><small><a href="#">SEE MORE >></a></small></h3>
        </div>
        <hr>
        <div class="row" id="flash">
          <?php 
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
          if(!in_array("monthly", $categories)) continue;
          echo "<div class='col-md-3'><div class='card md-3 shadow-sm'>
            <img src='assets/images/products/$set_row[1].jpg' id='images'>
              <div class='card-body'><small><h6 style='text-transform: uppercase'>$set_row[2]</h6></small><h5>$set_row[3]</h5>
              <p class='list-price text-danger'>List Price: <s>Kshs. $set_row[5]</s></p><p class='price'>Our Price: Kshs. $set_row[6]</p>       
              <div class='d-flex justify-content-between align-items-center'><div class='mx-auto'>
                  <button type='button' class='btn btn-sm btn-success product-btn' data-toggle='modal' data-target='#productModal_$set_row[1]' data-id='$set_row[1]'>View Details</button>
                  <a href='#' class='btn btn-sm btn-warning'><i class='fa fa-cart-plus' aria-hidden='true'></i> Add</a>
                  <a href='index.php?&list=wishlist&user=$user&product=$product' class='btn btn-sm btn-link'><i class='$wished fa-star' aria-hidden='true'></i></a>
              </div></div>
            </div>
          </div>
          </div>";
          include 'assets/php/details.php';
          $i++;
        } ?>
        </div>
      </div>

      <div class="container-fluid product-set" id="flash">
        <div class="d-flex">
          <h3>Flash Sales</h3>
          <h3 class="ml-auto"><small><a href="#">SEE MORE >></a></small></h3>
        </div>
        <hr>
        <div class="row" id="flash">
          <?php 
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
          if(!in_array("flash", $categories)) continue;
          echo "<div class='col-md-3'><div class='card md-3 shadow-sm'>
            <img src='assets/images/products/$set_row[1].jpg' id='images'>
              <div class='card-body'><small><h6 style='text-transform: uppercase'>$set_row[2]</h6></small><h5>$set_row[3]</h5>
              <p class='list-price text-danger'>List Price: <s>Kshs. $set_row[5]</s></p><p class='price'>Our Price: Kshs. $set_row[6]</p>       
              <div class='d-flex justify-content-between align-items-center'><div class='mx-auto'>
                  <button type='button' class='btn btn-sm btn-success product-btn' data-toggle='modal' data-target='#productModal_$set_row[1]' data-id='$set_row[1]'>View Details</button>
                  <a href='#' class='btn btn-sm btn-warning'><i class='fa fa-cart-plus' aria-hidden='true'></i> Add</a>
                  <a href='index.php?&list=wishlist&user=$user&product=$product' class='btn btn-sm btn-link'><i class='$wished fa-star' aria-hidden='true'></i></a>
              </div></div>
            </div>
          </div>
          </div>";
          include 'assets/php/details.php';
          $i++;
        } ?>
        </div>
      </div>

    </div>
  </div>