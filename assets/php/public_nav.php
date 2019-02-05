<?php $page = basename($_SERVER['PHP_SELF'], '.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light">
  	<a class="navbar-brand" href="index.php">eDuka</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
  	</button>

  	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="nav navbar-nav">
      <li class="nav-item <?php echo ($page=="offers")?"active":"" ?>" >
        <a class="nav-link" href="offers.php">Offers</a>
      </li>
      <li class="nav-item <?php echo ($page=="categories")?"active":"" ?>">
        <a class="nav-link" href="categories.php">Categories</a>
      </li>
       <li class="nav-item <?php echo ($page=="contact")?"active":"" ?>">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
    </ul>

    <ul class="nav navbar-nav ml-auto navbar-right">
    <li class="nav-item <?php echo ($page=="login")?"active":"" ?>">
        <a class="nav-link" href="login.php">
            <span class="fa fa-sign-in"></span> Login</a>
      </li>
      <li class="nav-item <?php echo ($page=="signup")?"active":"" ?>">
        <a class="nav-link" href="signup.php"> 
        <span class="fa fa-upload"></span> Sign Up</a>
      </li>
    </ul>
  </div>
</nav>