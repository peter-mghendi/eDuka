<form class="form" role="form" method="post" action="<?php $_PHP_SELF ?>">
    <div class="form-group">
        <label for="user">Email</label>
        <input type="email" class="form-control" name="user" id="user" placeholder="Your Email" autocomplete="off" required>
    </div>

    <div class="form-group">
        <label for="pass">Password</label>
        <input type="password" class="form-control" name="pass" id="pass" placeholder="Your Password" autocomplete="off" required>
    </div>

    <button type="submit" class="btn btn-other btn-block" name="submit">Sign In</button>
</form>