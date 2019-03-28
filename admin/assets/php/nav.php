<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">eDuka <span class="badge badge-light">Admin</span></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
<?php if(isset($_SESSION['admin'])){
  echo "
  <div class='collapse navbar-collapse' id='collapsibleNavbar'>
    <ul class='navbar-nav'>
      <li class='nav-item'>
        <a class='nav-link' data-toggle='pill' href='#users'>Users</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' data-toggle='pill' href='#products'>Products</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' data-toggle='pill' href='#admins'>Administrators</a>
      </li> 
    </ul>

    <ul class='navbar-nav ml-auto'>
      <li class='nav-item'>
        <a class='nav-link' href='../'>Back to Site</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='index.php?logout=1'>Log Out</a>
      </li>
    </ul>
  </div> ";
}?>
</nav>