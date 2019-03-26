<?php
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

    function process_user_get($action){ 
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
                    # unlink("../assets/images/users/${_GET['user']}.jpg");
                    # mysqli_query($db, "DELETE FROM wishlist WHERE user = '${_GET['user']}'");
                    # mysqli_query($db, "DELETE FROM cart WHERE user = '${_GET['user']}'");
                    # mysqli_query($db, "DELETE FROM orders WHERE user = '${_GET['user']}'");
                    # mysqli_query($db, "DELETE FROM users WHERE token = '${_GET['user']}'");
                    # if(isset($_SESSION["token"]) && $_SESSION["token"] == ${_GET['user']}) session_unregister("token");
                    $_SESSION['notify'] = 
                    "<div class='alert alert-success alert-dismissible fade show'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> Account ${_GET['user']} deleted.
                    </div>";
                }
                break;
            case 'reset':
                if(isset($_GET['user'])){
                    # $reset_pass = md5($GLOBALS['default_password']);
                    # mysqli_query($db, "UPDATE users SET password = '$reset_pass'");
                    # Send mail
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
                    # unlink("../assets/images/products/${_GET['product']}.jpg");
                    # mysqli_query($db, "DELETE FROM wishlist WHERE user = '${_GET['user']}'");
                    # mysqli_query($db, "DELETE FROM cart WHERE user = '${_GET['user']}'");
                    # mysqli_query($db, "DELETE FROM orders WHERE user = '${_GET['user']}'");
                    # mysqli_query($db, "DELETE FROM products WHERE token = '${_GET['user']}'");
                    # if(isset($_SESSION["token"]) && $_SESSION["token"] == ${_GET['user']}) session_unregister("token");
                    $_SESSION['notify'] = 
                    "<div class='alert alert-success alert-dismissible fade show'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> Product ${_GET['product']} deleted.
                    </div>";
                }
                break;
        }
        $_SESSION['active'] = "products";
        header("location: index.php");
    }

    function process_admin_get($action){ 
        $_SESSION['active'] = "admins";
        header("location: index.php");
    }

    function process_action_get($action){ 
        $_SESSION['active'] = "actions";
        header("location: index.php");
    }