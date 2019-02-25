<?php
    include '_connect.php';
    if(isset($_GET['list'])){
        extract($_GET);
        if ($list=="wishlist"){
            $wished_query = "SELECT * FROM wishlist WHERE user = '$user' AND product = '$product'";
            $wished_result = mysqli_query($db, $wished_query) or die(mysqli_error());
            $wished_count = mysqli_num_rows($wished_result);
            if ($wished_count == 0) $wish_query = "INSERT INTO wishlist VALUES(NULL, '$user', '$product')";
            else $wish_query = "DELETE FROM wishlist WHERE user = '$user' AND product = '$product'";
            mysqli_query($db, $wish_query);
            header("location: index.php");
        } elseif ($list=="cart") {
            if($action == "a"){
                $cart_query = "SELECT * FROM cart";
                $cart_result = mysqli_query($db, $cart_query);
                $cart_count = mysqli_num_rows($cart_result);
                if ($cart_count == 0){
                    # ADD
                } else {
                    # Update quantity
                }
            } elseif ($action == "r") {
                # Delete
            }
        }
    