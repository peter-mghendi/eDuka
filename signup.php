<form class="form" role="form" method="post" action="<?php $_PHP_SELF ?>">
    <div class="form-group">
        <label for="name">Username</label>
        <input type="text" class="form-control" name="name" placeholder="Your Name" maxlength="100" autocomplete="off" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Your Email" maxlength="100" autocomplete="off" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Create a Password" minlength="8" maxlength="50" autocomplete="off" required>
    </div>

    <div class="form-group">
        <label for="password">Confirm Password</label>
        <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm your Password" minlength="8" maxlength="50" autocomplete="off" required>
    </div>

    <div class="d-flex"><button type="submit" class="btn btn-other btn-block mx-auto" name="submit">Sign Up</button></div>
</form>