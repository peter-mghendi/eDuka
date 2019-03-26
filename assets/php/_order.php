<?php
if (isset($_GET['order'])){
    extract($_GET);
    $len = 12;
    function getToken(int $length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYX";
        $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet .= "0123456789";
        $max = strlen($codeAlphabet);
        for ($i=0; $i<$length; $i++){
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
        return $token;}
    $order_id = getToken($len);
    $user = $_SESSION['token'];
    $productArray = array();
    $quantityArray = array();
    $status = "pending";
    $mode = "on delivery";

    $compile_query = "SELECT * FROM cart WHERE user = '$user'";
    $compile_result = mysqli_query($db, $compile_query);
    $compile_count = mysqli_num_rows($compile_result);
    if($compile_count > 0){
        while($compile_row = mysqli_fetch_row($compile_result)){
            array_push($productArray, $compile_row[2]);
            array_push($quantityArray, $compile_row[3]);
        }
        $products = implode(";", $productArray);
        $quantities = implode(";", $quantityArray);
        $order_query = "INSERT INTO orders VALUES(NULL, '$order_id', '$user', '$products', '$quantities', '$status', '$mode')";
        var_dump($order_query);
        mysqli_query($db, $order_query) or die(mysqli_error($db));
        mysqli_query($db, "DELETE FROM cart WHERE user = '$user'");
        $error = "<script> alert('Success! Your items have been ordered.');</script>";
        $_SESSION['order_error'] = $error;
    } else {
        $error = "<script> alert('Order failed! Your cart is empty.');</script>";
        $_SESSION['order_error'] = $error;
    }

}