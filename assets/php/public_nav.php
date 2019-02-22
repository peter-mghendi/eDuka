<?php $page = basename($_SERVER['PHP_SELF'], '.php'); ?>
<div class="primary-nav fixed-top">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark" id="nav" name="nav">
  	<a class="navbar-brand" href="index.php"><span class="fa fa-store"></span> eDuka</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
  	</button>

  	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="nav navbar-nav">
      <li class="nav-item <?php echo ($page=="offers")?"active":"" ?>" >
        <a class="nav-link" href="offers.php">
        <span class="fa fa-box-open"></span> Offers</a>
      </li>
      <li class="nav-item <?php echo ($page=="categories")?"active":"" ?>">
        <a class="nav-link" href="#category_bar" data-toggle="collapse">
        <span class="fa fa-bars"></span> Categories</a>
      </li>
       <li class="nav-item <?php echo ($page=="contact")?"active":"" ?>">
        <a class="nav-link" href="contact.php">
        <span class="fa fa-envelope-open-text"></span> Contact Us</a>
      </li>
    </ul>

    <ul class="nav navbar-nav ml-auto navbar-right">
    <li class="nav-item"><a class="nav-link"  data-toggle='modal' data-target='#searchModal'><span class="fa fa-search"></span> Search</a></li> 
    <li class="nav-item"><a class="nav-link" data-toggle='modal' data-target='#loginModal'><span class="fa fa-sign-in-alt"></span> Login</a></li>
      <li class="nav-item"><a class="nav-link"data-toggle='modal' data-target='#signupModal'><span class="fa fa-cloud-upload-alt"></span> Sign Up</a></li>
    </ul>
  </div>
</nav>
<?php include 'assets/php/categories.php'; ?>
</div>