<?php include 'assets/php/_protect.php';
    $token = $_SESSION["token"];
    $profile_query = "SELECT * FROM users WHERE token = '$token'";
    $profile_res = mysqli_query($db, $profile_query);
    $profile_row = mysqli_fetch_row ($profile_res);
?>

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#details">View Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#edit">Edit Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#change">Change Password</a>
  </li>
</ul>

<div class="tab-content">
    <div class="tab-pane container active" id="details">
    <div class="d-flex"><img src="assets/images/users/<?php echo $profile_row[1] ?>.jpg" class="img-fluid rounded-circle profile-img mx-auto" alt="<?php echo $profile_row[2] ?>"></div>
    <table class="table table-borderless">
        <thead>
        </thead>
        <tbody>
            <tr>
                <td>Username</td>
                <td><?php echo $profile_row[2] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $profile_row[3] ?></td>
            </tr>
            <tr>
                <td>Account status</td>
                <td><?php echo $profile_row[5] ?></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="tab-pane container fade" id="edit">
    <!-- <div class="d-flex" id="preview"><img src="assets/images/users/<?php echo $profile_row[1] ?>.jpg" class="img-fluid rounded-circle profile-img mx-auto" alt="<?php echo $profile_row[2] ?>"></div> -->
    <div class="d-flex preview-empty" id="preview"><img src="" alt="" id="preview_img"><p><strong>Drag image file here to upload.</strong></p></div>
    <form class="form" role="form" method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" name="param" value="account" hidden>   
            <input type="text" class="form-control" name="token" value="<?php echo $profile_row[1] ?>" hidden>
        </div>

        <div class="form-group">
            <label for="new_pic">Or Select a photo</label><br>
            <input type="file" name="new_pic" id="new_pic" accept=".png, .jpg" onchange="handleFiles(this.files)" hidden>
        </div>

        <div class="form-group">
            <label for="new_user">New Username</label>
            <input type="text" class="form-control" name="new_user" placeholder="New Username"  value="<?php echo $profile_row[2] ?>" autocomplete="off">
        </div>

        <div class="form-group">
            <label for="new_email">New Email</label>
            <input type="email" class="form-control" name="new_email" placeholder="New Email"  value="<?php echo $profile_row[3] ?>" autocomplete="off">
        </div>

        <div class="btn-group">
            <button type="reset" class="btn btn-other" name="reset">Reset</button>
            <button type="submit" class="btn btn-other" name="submit">Update</button>
        </div>
    </form>
</div>

<div class="tab-pane container fade" id="change">
    <form class="form" role="form" method="post" action="<?php $_PHP_SELF ?>">
        <div class="form-group">
            <input type="text" class="form-control" name="param" value="password" hidden readonly>
            <input type="text" class="form-control" name="token" value="<?php echo $profile_row[1] ?>" hidden readonly>
        </div>

        <div class="form-group">
            <label for="current_password" >Current Password</label>
            <input type="password" class="form-control" name="current_password" placeholder="Current Password" required>
        </div>

        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
        </div>

        <div class="form-group">
            <label for="confirm_new_password">Confirm New Password</label>
            <input type="password" class="form-control" name="confirm_new_password" placeholder="Confirm New Password" required>
        </div>

        <div class="btn-group">
            <button type="reset" class="btn btn-other" name="reset">Reset</button>
            <button type="submit" class="btn btn-other" name="submit">Update</button>
        </div>
    </form>
</div>
</div>