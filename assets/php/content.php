<?php $slides = 4; $num=4;
$images = array("assets/images/smartHD.jpg", "assets/images/flexiblekyb.jpg", "assets/images/IdeapadLarge.jpg", "assets/images/flexiblekyb.jpg"); 
$titles = array("HD Monitor", "Flexiboard", "Lappytop", "Flexiboard Again");
$descriptions = array("View all your movies and games in ultra sharp Full HD quality", "Roll it up and take it with you wherever you go", "The ultimate students' laptop, built to cater to your every need", "I already discussed this one. Roll it up...");
?>
<main role="main">

<div class="container margin-vertical">
<div id="myCarousel" class="carousel slide bg-dark" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php for ($i=0; $i<$slides; $i++){
          $state = ($i==0)?"active":"";
          echo "<li data-target='#myCarousel' data-slide-to='$i' class='$state'></li>";
      } ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <?php for ($i=0; $i<$slides; $i++){
          $state = ($i==0)?"active":"";
          echo 
          "<div class='carousel-item $state'>
            <img src='$images[$i]' alt='Image'>
            <div class='carousel-caption text-right'>
                <h1>$titles[$i]</h1>
                <p>$descriptions[$i]</p>
                <h5 class='list-price text-danger'>Was: <s>Kshs. 32,000</s></h5> 
                <h4>Now: Ksh. 29,000</h4>
            </div>      
          </div>
          ";}?>
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
      <li class="nav-item"><a href="#month" class="nav-link"><?php echo date("F");?></a></li>
      <li class="nav-item"><a href="#flash" class="nav-link">Flash Sales</a></li>
    </ul>
  </nav>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="container-fluid product-set" id="new">
      <div class="d-flex">
          <h3>New Items</h3><h3 class="ml-auto"><small><a href="#?value=500">SEE MORE >></a></small></h3>
        </div><hr>
      <div class="row">
        <?php 
        $new_query = "SELECT * FROM products WHERE saletype = 'new'";
        $new_result = mysqli_query($db, $new_query) or die(mysqli_error($db));
        while($new_row = mysqli_fetch_row($new_result))
          echo "<div class='col-md-3'><div class='card mb-3 shadow-sm'>
            <img src='assets/images/products/$new_row[1].jpg' id='images'>
              <div class='card-body'><small><h5 style='text-transform: uppercase'>$new_row[2]</h5></small><h5>$new_row[3]</h5>
              <p class='list-price text-danger'>List Price: <s>Kshs. $new_row[5]</s></p> 
              <p class='price'>Our Price: Kshs. $new_row[6]</p>       
              <div class='d-flex justify-content-between align-items-center'>
                <div>
                  <button type='button' class='btn btn-sm btn-success product-btn' data-toggle='modal' data-target='#productModal' data-id='$new_row[1]'>View Details</button>
                  <button type='button' class='btn btn-sm btn-warning'>Add<i class='fa fa-cart-plus' aria-hidden='true'></i> </button>
                </div>            
              </div>
            </div>
          </div>
        </div>"; ?>
      </div></div>

      
      <div class="container-fluid product-set" id="popular">
        <div class="d-flex">
          <h3>Popular Items</h3><h3 class="ml-auto"><small><a href="#">SEE MORE >></a></small></h3>
        </div><hr>
      <div class="row">
        <?php for($i=0; $i<4; $i++) 
          echo '<div class="col-md-3"><div class="card mb-3 shadow-sm">
            <img src="assets/images/Ideapad.jpg" id="images">
              <div class="card-body"><h5>Ideapad 120s-11.6" Intel.</h5>
              <p class="list-price text-danger">List Price: <s>Kshs. 32,000</s></p> 
              <p class="price">Our Price: Kshs. 29,999</p>       
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal"  data-target="#item1">View Details</button>
                  <button type="button" class="btn btn-sm btn-warning">Add<i class="fa fa-cart-plus" aria-hidden="true"></i> </button>
                </div>            
              </div>
            </div>
          </div>
        </div>'; ?>
      </div></div>

      <div class="container-fluid product-set" id="month">
      <div class="d-flex">
          <h3><?php echo date("F");?> Sales</h3><h3 class="ml-auto"><small><a href="#">SEE MORE >></a></small></h3>
        </div><hr>
      <div class="row" id="flash">
        <?php for($i=0; $i<4; $i++) 
          echo '<div class="col-md-3"><div class="card mb-3 shadow-sm">
            <img src="assets/images/Ideapad.jpg" id="images">
              <div class="card-body"><h5>Ideapad 120s-11.6" Intel.</h5>
              <p class="list-price text-danger">List Price: <s>Kshs. 32,000</s></p> 
              <p class="price">Our Price: Kshs. 29,999</p>       
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal"  data-target="#item1">View Details</button>
                  <button type="button" class="btn btn-sm btn-warning">Add<i class="fa fa-cart-plus" aria-hidden="true"></i> </button>
                </div>            
              </div>
            </div>
          </div>
        </div>'; ?>
      </div></div>
      
      <div class="container-fluid product-set" id="flash">
      <div class="d-flex">
          <h3>Flash Sales</h3><h3 class="ml-auto"><small><a href="#">SEE MORE >></a></small></h3>
        </div><hr>
      <div class="row" id="flash">
        <?php for($i=0; $i<4; $i++) 
          echo '<div class="col-md-3"><div class="card mb-3 shadow-sm">
            <img src="assets/images/Ideapad.jpg" id="images">
              <div class="card-body"><h5>Ideapad 120s-11.6" Intel.</h5>
              <p class="list-price text-danger">List Price: <s>Kshs. 32,000</s></p> 
              <p class="price">Our Price: Kshs. 29,999</p>       
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal"  data-target="#item1">View Details</button>
                  <button type="button" class="btn btn-sm btn-warning">Add<i class="fa fa-cart-plus" aria-hidden="true"></i> </button>
                </div>            
              </div>
            </div>
          </div>
        </div>'; ?>
      </div></div>

    </div>
  </div>