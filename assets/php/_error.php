<?php
$error = "";
if (isset($_SESSION['login_error'])) {
    $error = $_SESSION['login_error'];
    $_SESSION['login_error'] = null;
} else if (isset($_SESSION['signup_error'])){
    $error = $_SESSION['signup_error'];
    $_SESSION['signup_error'] = null;
} else if (isset($_SESSION['account_error'])){
    $error = $_SESSION['account_error'];
    $_SESSION['account_error'] = null;
}
echo $error;