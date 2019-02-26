<?php
$error = "";
if (isset($_SESSION['login_error'])) {
    $error = $_SESSION['login_error'];
    $_SESSION['login_error'] = null;
} elseif (isset($_SESSION['signup_error'])){
    $error = $_SESSION['signup_error'];
    $_SESSION['signup_error'] = null;
} elseif (isset($_SESSION['account_error'])){
    $error = $_SESSION['account_error'];
    $_SESSION['account_error'] = null;
} elseif (isset($_SESSION['wishlist_error'])){
    $error = $_SESSION['wishlist_error'];
    $_SESSION['wishlist_error'] = null;
} elseif (isset($_SESSION['order_error'])){
    $error = $_SESSION['order_error'];
    $_SESSION['order_error'] = null;
}
echo $error;