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
            case 'delete':
                # Delete user image
                # Delete session
                # mysqli_query($db, "DELETE FROM wishlist WHERE user = '${_GET['user']}'");
                # mysqli_query($db, "DELETE FROM cart WHERE user = '${_GET['user']}'");
                # mysqli_query($db, "DELETE FROM orders WHERE user = '${_GET['user']}'");
                # mysqli_query($db, "DELETE FROM users WHERE user = '${_GET['user']}'");
                $_SESSION['notify'] = 
                "<div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Success!</strong> Account ${_GET['user']} deleted.
                </div>";
                break;
            case 'reset':
                # $reset_pass = md5($GLOBALS['default_password']);
                # mysqli_query($db, "UPDATE users SET password = '$reset_pass'");
                # Send mail
                $_SESSION['notify'] = 
                "<div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Success!</strong> Password reset for account ${_GET['user']}.
                </div>";
        }
        $_SESSION['active'] = "users";
        // echo $_SESSION['notify'];
        header("location: index.php");
    }

    function process_product_get($action){ 
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