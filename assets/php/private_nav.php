<?php $page = basename($_SERVER['PHP_SELF'], '.php'); ?>
<div class="primary-nav fixed-top">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark" id="nav" name="nav">
  	<a class="navbar-brand" href="index.php"><span class="fa fa-store"></span> eDuka</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggler-icon"></span>
  	</button>

  	<div class="collapse navbar-collapse" id="navbar-menu">
    <ul class="nav navbar-nav">
      <li class="nav-item <?php echo ($page=="offers")?"active":"" ?>">
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
    <!-- <li class="nav nav-item <?php # echo ($page=="profile")||($page=="wishlist")||($page=="cart")?"active":"" ?>">
          <a class="nav-link <?php # echo ($page=="profile")?"active":"" ?>" href="profile.php">
            <span class="fa fa-user"></span><?php # echo $_SESSION['user'] ?></a>
          <a class="nav-link dropdown-toggle dropdown-toggle-split <?php # echo ($page=="profile")?"active":($page=="wishlist")?"active":($page=="cart")?"active":"" ?>"
            data-toggle="dropdown" data-target="#dropdown-menu" href="javascript:void(0)"></a>

        <div class="dropdown-menu" id="dropdown-menu">
            <a class="nav-item dropdown-item  <?php # echo ($page=="wishlist")?"active":"" ?>" href="wishlist.php"><span class="fa fa-user"></span> Wishlist</a>
            <a class="nav-item dropdown-item  <?php # echo ($page=="cart")?"active":"" ?>" href="cart.php"><span class="fa fa-user"></span> Shopping Cart</a>
          </div>
      </li> -->

      <li class="nav-item"><a class="nav-link"  data-toggle='modal' data-target='#searchModal'><span class="fa fa-search"></span> Search</a></li>  

      <li class="nav-item dropdown <?php echo ($page=="profile")||($page=="wishlist")||($page=="cart")?"active":"" ?>">
          <a class="nav-link dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" data-target="#dropdown-menu" href="javascript:void(0)">
          <span class="fa fa-user-cog"></span> <?php echo $_SESSION['user'] ?> </a>
          <div class="dropdown-menu" id="dropdown-menu">
            <a class="nav-item dropdown-item <?php echo ($page=="profile")?"active":"" ?>" data-toggle='modal' data-target='#profileModal'><span class="fa fa-user-circle"></span> Profile</a>
            <a class="nav-item dropdown-item  <?php echo ($page=="wishlist")?"active":"" ?>" href="wishlist.php"><span class="fa fa-tasks"></span> Wishlist</a>
            <a class="nav-item dropdown-item  <?php echo ($page=="cart")?"active":"" ?>" href="cart.php"><span class="fa fa-shopping-cart"></span> Cart <span class="badge badge-pill badge-secondary">3</span></a>
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="assets/php/_logout.php">Log Out
        <span class="fa fa-sign-in"></span></a>
      </li>
    </ul>
  </div>
</nav>
<?php include 'assets/php/categories.php'; ?>
</div>