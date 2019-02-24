<div class="modal fade" id="loginModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Login</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <?php include 'login.php'; ?>
      </div></div></div></div>
<div class="modal fade" id="signupModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Sign Up</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body"><?php include 'signup.php'; ?></div></div></div></div>
<div class="modal fade" id="profileModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo $_SESSION['user'] ?>'s Profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body"><?php include 'profile.php'; ?></div>
      <div class="modal-footer  d-flex">
        <p class="mx-auto">Session ID: <?php echo $profile_row[1] ?></p>
      </div></div></div></div>
<div class="modal fade" id="contactModal"><div class="modal-dialog"><div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Get in Touch</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <?php include 'contact.php'; ?>
      </div>
      <div class="modal-footer  d-flex">
        <p class="mx-auto">Session ID: <?php echo $profile_row[1] ?></p>
      </div></div></div></div>
  <div class="modal fade" id="searchModal">
    <div class="modal-dialog search-dialog">
      <div class="modal-content search-box bg-dark">
        <div class="modal-body search-body">
          <form class="form form-inline form-group" role="form" method="post" action="<?php $_PHP_SELF ?>">
            <input type="search" class="form-control search-text-box" name="search_query" placeholder="I'm looking for..." required style="width:100%">
            <button type="sumbit" class="form-control btn btn-search" style="margin-left:-44px"><span class="fa fa-search"></span></button>
          </form>
        </div>
      </div>
    </div>
  </div>