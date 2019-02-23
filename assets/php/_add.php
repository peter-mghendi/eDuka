<?php
    include '_connect.php';
    if(isset($_GET['list'])){
        extract($_GET);
        if ($list=="wishlist"){
            $wished_query = "SELECT * FROM wishlist WHERE user = '$user' AND product = '$product'";
            $wished_result = mysqli_query($db, $wished_query) or die(mysqli_error());
            $wished_count = mysqli_num_rows($wished_result);
            if ($wished_count == 0){
                $wish_query = "INSERT INTO wishlist VALUES(NULL, '$user', '$product')";
            } else {
                $wish_query = "DELETE FROM wishlist WHERE user = '$user' AND product = '$product'";
            }
            mysqli_query($db, $wish_query);
            header("location: index.php");
        }
    }