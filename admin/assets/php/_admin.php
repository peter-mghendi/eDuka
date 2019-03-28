<?php
    $user_img_path = "../assets/images/users/";
    $new_user_img = $user_img_path."_user.png";
    $product_img_path = "../assets/images/products/";
    $new_product_img = $product_img_path."_product.png";
    if (!isset($_SESSION['active'])) $_SESSION['active'] = "users";
    if (isset($_GET['admin'])) switch($_GET['admin']){
        case 0: process_user_get($_GET['action']);
            break;
        case 1: process_product_get($_GET['action']);
            break;
        case 2: process_admin_get($_GET['action']);
            break;
        case 3: process_action_get($_GET['action']);
            break;
    }

    if(isset($_POST['addUser'])){
        extract($_POST);
        do{
            $token = getToken(12);
            $tkn_query = "SELECT * FROM users WHERE token = '$token'";
            $tkn_res = mysqli_query($db, $tkn_query);
            $tkn_count = mysqli_num_rows($tkn_res);
        } while ($tkn_count > 0);  
        $pass = md5($GLOBALS['default_password']);
        $user_img = $user_img_path.$token.".jpg";
        copy($new_user_img, $user_img);
        mysqli_query($db, "INSERT INTO users VALUES (NULL, '$token', '$name', '$email', '$pass', 'active')") or die(mysqli_error($db));
        $_SESSION['notify'] = 
            "<div class='alert alert-success alert-dismissible fade show'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> User account $token: $name created.
            </div>";
        $_SESSION['active'] = "users";
        header("location: index.php");
    }

    if(isset($_POST['addProduct'])){
        extract($_POST);
        do{
            $token = getToken(7);
            $tkn_query = "SELECT * FROM products WHERE token = '$token'";
            $tkn_res = mysqli_query($db, $tkn_query);
            $tkn_count = mysqli_num_rows($tkn_res);
        } while ($tkn_count > 0);   
        $product_img = $product_img_path.$token.".jpg";
        copy($new_product_img, $product_img);
        mysqli_query($db, "INSERT INTO products VALUES (NULL, '$token', '$brand', '$name', '$description', 0, '$price', '', '$category', '', 'available')") or die(mysqli_error($db));
        $_SESSION['notify'] = 
            "<div class='alert alert-success alert-dismissible fade show'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> Product $brand $name created.
            </div>";
        $_SESSION['active'] = "products";
        header("location: index.php");
    }

    if(isset($_POST['addAdmin'])){
        extract($_POST);
        $pass = md5($password);
        $count = mysqli_num_rows(mysqli_query($db, "SELECT * FROM admins WHERE username = '$username'"));
        if ($count == 0){
            mysqli_query($db, "INSERT INTO admins VALUES (NULL, '$username', '$password', '$role')") or die(mysqli_error($db));
            $_SESSION['notify'] = 
            "<div class='alert alert-success alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>Success!</strong> Admin account $username created.
            </div>";
        } else {
            $_SESSION['notify'] = 
            "<div class='alert alert-danger alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                <strong>Failed!</strong> Admin account $username already exists.
            </div>";
        }
        $_SESSION['active'] = "admins";
        header("location: index.php");
    }

    function getToken(int $length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYX";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet);
        for ($i=0; $i<$length; $i++) $token .= $codeAlphabet[random_int(0, $max-1)];
        return $token;
    }

    function process_user_get($action){
        include 'assets/php/_connect.php'; 
        switch($action){
            case 'change':
                if(isset($_GET['user'])){
                    $_SESSION['notify'] = 
                    "<div class='alert alert-success alert-dismissible fade show'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> Account ${_GET['user']} status changed to ${_GET['status']}.
                    </div>";
                }
                break;
            case 'delete':
                if(isset($_GET['user'])){
                    unlink("../assets/images/users/${_GET['user']}.jpg");
                    mysqli_query($db, "DELETE FROM wishlist WHERE user = '${_GET['user']}'");
                    mysqli_query($db, "DELETE FROM cart WHERE user = '${_GET['user']}'");
                    mysqli_query($db, "DELETE FROM orders WHERE user = '${_GET['user']}'");
                    mysqli_query($db, "DELETE FROM users WHERE token = '${_GET['user']}'");
                    if(isset($_SESSION["token"]) && $_SESSION["token"] == ${_GET['user']}) session_unregister("token");
                    $_SESSION['notify'] = 
                    "<div class='alert alert-success alert-dismissible fade show'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> Account ${_GET['user']} deleted.
                    </div>";
                }
                break;
            case 'reset':
                if(isset($_GET['user'])){
                    $reset_pass = md5($GLOBALS['default_password']);
                    mysqli_query($db, "UPDATE users SET password = '$reset_pass' WHERE token = '${_GET['user']}'");
                    $_SESSION['notify'] = 
                    "<div class='alert alert-success alert-dismissible fade show'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> Password reset for account ${_GET['user']}.
                    </div>";
                }
                break;
        }
        $_SESSION['active'] = "users";
        header("location: index.php");
    }

    function process_product_get($action){ 
        include 'assets/php/_connect.php';
        switch($action){
            case 'change':
                if(isset($_GET['product'])){
                    $_SESSION['notify'] = 
                    "<div class='alert alert-success alert-dismissible fade show'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> Product ${_GET['product']} status changed to ${_GET['status']}.
                    </div>";
                }
                break;
            case 'delete':
                if(isset($_GET['product'])){
                    unlink("../assets/images/products/${_GET['product']}.jpg");
                    mysqli_query($db, "DELETE FROM wishlist WHERE user = '${_GET['product']}'");
                    mysqli_query($db, "DELETE FROM cart WHERE user = '${_GET['product']}'");
                    mysqli_query($db, "DELETE FROM products WHERE token = '${_GET['product']}'");
                    $_SESSION['notify'] = 
                    "<div class='alert alert-success alert-dismissible fade show'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> Product ${_GET['product']} deleted.
                    </div>";
                }
                break;
        }
        $_SESSION['active'] = "products";
        # header("location: index.php");
    }

    function process_admin_get($action){ 
        include 'assets/php/_connect.php';
        switch($action){
            case 'delete':
                if(isset($_GET['user'])){
                    mysqli_query($db, "DELETE FROM admins WHERE username = '${_GET['user']}'");
                    if(isset($_SESSION["admin"]) && $_SESSION["admin"] == $_GET['user']) session_destroy();
                    $_SESSION['notify'] = 
                    "<div class='alert alert-success alert-dismissible fade show'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> Admin ${_GET['user']} deleted.
                    </div>";
                }
                break;
        }
        $_SESSION['active'] = "admins";
        header("location: index.php");
    }