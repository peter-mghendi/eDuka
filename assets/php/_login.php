<?php
if (isset($_POST['email'])){
extract($_POST);
if (session_status() == PHP_SESSION_NONE) session_start();
include '_connect.php';
$password = md5($password);
$log_sql ="SELECT * FROM users WHERE email='$email' AND password='$password'";
$log_result=mysqli_query($db, $log_sql) or die( mysqli_error($db) );
$log_count= mysqli_num_rows ($log_result);

if ($log_count==1){
    $log_row=mysqli_fetch_row ($log_result);
    $username = $log_row[2];
    $token = $log_row[1];
    $_SESSION['user'] = $username;
    $_SESSION['token'] = $token;
    if (isset($_SESSION['login_error'])) session_unregister('login_error');
    if (isset($_SESSION['signup_error'])) session_unregister('signup_error');
    header("location:index.php");
}else{
    $error = "<div class='container-fluid form-container'><div class='container-fluid form-content'><div class='form-material'>";
    $error .=  "<center><h4><b>Incorrect login credentials</b></h4></center>";
    $error .=  "<hr>";
    $error .=  "<center><p class='danger'>ERROR: Either the login credentials entered for $username are incorrect or that account does not exist.</p></center>";
    $error .=  "<br>";
    $error .=  "<center><p>Click <a href='signup.php'>here</a> to sign up instead.</p></center>";
    $error .=  "</div></div></div>";
    if (isset($_SESSION['signup_error'])) $_SESSION['signup_error'] = null;
    $_SESSION['login_error'] = $error;
}
}
?>