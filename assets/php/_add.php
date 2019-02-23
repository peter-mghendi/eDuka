<?php
    include '_connect.php';
    if(isset($_GET['list'])){
        extract($_GET);
        if ($list=="wishlist"){
            $wish_query = "INSERT INTO wishlist VALUES(NULL, '$user', '$product')";
            mysqli_query($db, $wish_query);
            header("location: index.php");
        }
    }