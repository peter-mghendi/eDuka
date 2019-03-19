<div class="modal fade" id="newUserModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Register New User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <form class="form" role="form" method="post" action="<?php $_PHP_SELF ?>">
    <div class="form-group">
        <label for="name">Username</label>
        <input type="text" class="form-control" name="name" placeholder="Username" maxlength="100" autocomplete="off" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email Address" maxlength="100" autocomplete="off" required>
    </div>

    <div class="d-flex"><button type="submit" class="btn btn-other btn-block mx-auto" name="submit">Register</button></div>
</form>
      </div>
      <div class="modal-footer  d-flex">
      <p class="mx-auto"><strong>NOTE:</strong> Default password '<?php echo $GLOBALS['default_password'] ?>' will be used.</p>
      </div></div></div></div> 