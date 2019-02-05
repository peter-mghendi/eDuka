<?php include 'assets/php/_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop | Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/forms.css">
</head>
<body>
    <?php include 'assets/php/public_nav.php'; include 'assets/php/_error.php'; ?>
    <div class="container-fluid form-container" style='display: <?php echo isset($_SESSION['login_error'])?'none':'block'; ?>'>
        <div class="container-fluid form-content">
        <div class="form-header">
            <h4>Log in here...</h4>
            <p>...to access all of Shop's features</p>
        </div>
        <form class="form" role="form" method="post" action="<?php $_PHP_SELF ?>">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Your Email" autocomplete="off" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Your Password" autocomplete="off" required>
            </div>

            <button type="submit" class="btn btn-other btn-block" name="submit">Sign In</button>
        </form>
        </div>
    </div>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>