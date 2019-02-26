<?php $page = basename($_SERVER['PHP_SELF'], '.php'); $user = $_SESSION['user']; $token = $_SESSION['token']?>
<div class="primary-nav fixed-top">
<nav class="navbar navbar-expand-lg bg-dark navbar-dark" id="nav" name="nav">
    <?php include 'assets/php/nav_start.php'; ?>
    <ul class="nav navbar-nav ml-auto navbar-right">
      <li class="nav-item"><a class="nav-link"  data-toggle='modal' data-target='#searchModal'><span class="fa fa-search"></span> Search</a></li>  
      <li class="nav-item dropdown <?php echo ($page=="profile")||($page=="wishlist")||($page=="cart")||($page=="orders")?"active":"" ?>">
          <a class="nav-link dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" data-target="#dropdown-menu" href="javascript:void(0)">
          <span class="fa fa-user-cog"></span> <?php echo $user ?> </a>
          <div class="dropdown-menu" id="dropdown-menu">
            <?php $cart_query = "SELECT * FROM cart WHERE user = '$token'"; $cart_result = mysqli_query($db, $cart_query) or die(mysqli_error()); $cart_count = mysqli_num_rows($cart_result)?>
            <a class="nav-item dropdown-item <?php echo ($page=="profile")?"active":"" ?>" data-toggle='modal' data-target='#profileModal'><span class="fa fa-user-circle"></span> Profile</a>
            <a class="nav-item dropdown-item  <?php echo ($page=="wishlist")?"active":"" ?>" href="wishlist.php"><span class="fa fa-tasks"></span> Wishlist</a>
            <a class="nav-item dropdown-item  <?php echo ($page=="cart")?"active":"" ?>" href="cart.php"><span class="fa fa-shopping-cart"></span> Cart <span class="badge badge-pill badge-secondary"><?php echo $cart_count;?></span></a>
            <a class="nav-item dropdown-item  <?php echo ($page=="orders")?"active":"" ?>" href="orders.php"><span class="fa fa-box"></span> Orders </a>
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