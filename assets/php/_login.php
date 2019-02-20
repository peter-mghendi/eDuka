<?php
if (isset($_POST['user'])){
extract($_POST);
if (session_status() == PHP_SESSION_NONE) session_start();
$pass = md5($pass);
$log_sql ="SELECT * FROM users WHERE email='$user' AND password='$pass'";
$log_result=mysqli_query($db, $log_sql) or die( mysqli_error($db) );
$log_count= mysqli_num_rows ($log_result);

if ($log_count==0){
    $error = "<script> alert('Login failed! Invalid login details entered for $user.');</script>";
    if (isset($_SESSION['signup_error'])) $_SESSION['signup_error'] = null;
    $_SESSION['login_error'] = $error;
} else if (($log_row=(mysqli_fetch_row ($log_result)))[5]!="active"){
    $error = "<script> alert('Login failed! This account has been $account_status.');</script>";
    if (isset($_SESSION['signup_error'])) $_SESSION['signup_error'] = null;
    $_SESSION['login_error'] = $error;
} else {
    $_SESSION['user'] = $log_row[2];
    $_SESSION['token'] = $log_row[1];
    if (isset($_SESSION['login_error'])) $_SESSION['login_error'] = null;
    if (isset($_SESSION['signup_error'])) $_SESSION['signup_error'] = null;
    header("location: index.php");
}
}
?>