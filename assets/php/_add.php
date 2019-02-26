<?php
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
            $carted_query = "SELECT * FROM cart WHERE user = '$user' AND product = '$product'";
            $carted_result = mysqli_query($db, $carted_query);
            $carted_count = mysqli_num_rows($carted_result);
            $carted_row = mysqli_fetch_row($carted_result);
            if(!isset($action)){
                if ($carted_count == 0) $cart_query = "INSERT INTO cart VALUES(NULL, '$user', '$product', 1)";
                else $cart_query = "DELETE FROM cart WHERE user = '$user' AND product = '$product'";
                mysqli_query($db, $cart_query);
                header("location: index.php");
            } else {
                switch ($action){
                    case "inc": $quantity = ++$carted_row[3]; break;
                    case "dec": $quantity = --$carted_row[3]; break;
                    default: echo "<script> alert('Error while tring to increase quantity')";
                }
                $quantity_query = "UPDATE cart SET quantity = $quantity WHERE user = '$user' AND product = '$product'";
                mysqli_query($db, $quantity_query);
                header("location: cart.php");
            }
        }
    }