<?php $this_page = basename($_SERVER['PHP_SELF'], '.php'); if(isset($_SESSION['user'])) {$user = $_SESSION['user']; $token = $_SESSION['token'];} ?>
<div class="primary-nav fixed-top">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark" id="nav" name="nav">
	<a class="navbar-brand" href="index.php"><span class="fa fa-store"></span> eDuka</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarToggler">
<ul class="nav navbar-nav">
<li class="nav-item <?php echo ($this_page=="offers")?"active":"" ?>" >
  <a class="nav-link" href="offers.php">
  <span class="fa fa-box-open"></span> Offers</a>
</li>
<li class="nav-item <?php echo ($this_page=="categories")?"active":"" ?>">
  <a class="nav-link" href="#category_bar" data-toggle="collapse">
  <span class="fa fa-bars"></span> Categories</a>
</li>
 <li class="nav-item <?php echo ($this_page=="contact")?"active":"" ?>">
  <a class="nav-link" data-toggle='modal' data-target='#contactModal'>
  <span class="fa fa-envelope-open-text"></span> Contact Us</a>
</li>
</ul>
<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if(isset($_SESSION['token'])) include 'private_nav.php';
else include 'public_nav.php'; ?>
  </div>
</nav>
<?php include 'assets/php/categories.php'; ?>
</div>