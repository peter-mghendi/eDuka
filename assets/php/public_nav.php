<?php $page = basename($_SERVER['PHP_SELF'], '.php'); ?>
<div class="primary-nav fixed-top">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark" id="nav" name="nav">
    <?php include 'assets/php/nav_start.php'; ?>
    <ul class="nav navbar-nav ml-auto navbar-right">
    <li class="nav-item"><a class="nav-link" data-toggle='modal' data-target='#searchModal'><span class="fa fa-search"></span> Search</a></li> 
    <li class="nav-item"><a class="nav-link" data-toggle='modal' data-target='#loginModal'><span class="fa fa-sign-in-alt"></span> Login</a></li>
      <li class="nav-item"><a class="nav-link"data-toggle='modal' data-target='#signupModal'><span class="fa fa-cloud-upload-alt"></span> Sign Up</a></li>
    </ul>
  </div>
</nav>
<?php include 'assets/php/categories.php'; ?>
</div>