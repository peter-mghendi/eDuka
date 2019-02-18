<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>e-sales|home</title>
     <link rel="stylesheet" href="../css/bootstrap.min.css">
     
     <link rel="sylesheet" href="assets/css/style.css"> 
     <link rel="sylesheet" href="assets/css/main.css">    
     <link rel="stylesheet" href="../css/all.css">
     <link rel="stylesheet" href="../css/fontawesome.min.css">
     <script src="../js/jquery.min.js"></script>
	   <script src="../js/bootstrap.min.js"></script>
    <script src="../js/webfont.js"></script>  
 </head>
 <body>
 

<main role="main">

  <div class="container margin-top">
    <div class="row">
      <div class="col-sm3"></div>
      <div class="col-sm6">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/images/smartHD.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/images/flexiblekyb.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="assets/images/IdeapadLarge.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="col-sm3"></div>
      </div>
    </div>
  </div>

  <nav class="container secondary-nav">
    <ul class="nav justify-content-center">
      <li class="nav-item"><a href="#new" class="nav-link">New</a></li>
      <li class="nav-item"><a href="#popular" class="nav-link">Popluar</a></li>
      <li class="nav-item"><a href="#flash" class="nav-link">Flash Sales</a></li>
    </ul>
  </nav>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="container-fluid" id="new">
      <h3>New Items</h3><h5 class="ml-auto align-right"><a href="#">SEE MORE >></a></h5><hr>
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
      </div><br></div>

      
      <div class="container-fluid" id="popular">
      <h3>Popular Items</h3><h5 class="ml-auto align-right"><a href="#">SEE MORE >></a></h5><hr>
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
      </div><br></div>

      
      <div class="container-fluid" id="flash">
      <h3>Flash Sales</h3><h5 class="ml-auto align-right"><a href="#">SEE MORE >></a></h5><hr>
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
      </div><br></div>

    </div>
  </div>
  <?php include 'assets/php/footer.php'?>
  </body>
  </html>