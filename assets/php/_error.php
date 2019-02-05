<?php
$error = "";
if (isset($_SESSION['login_error'])) 
$error = $_SESSION['login_error'];
else if (isset($_SESSION['signup_error']))
$error = $_SESSION['signup_error'];
echo $error;