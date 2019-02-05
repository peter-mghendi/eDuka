<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if(isset($_SESSION['token'])) include 'private_nav.php';
else include 'public_nav.php';