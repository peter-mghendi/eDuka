<?php 
    include 'assets/php/_protect.php';
    include 'assets/php/_connect.php';
    include 'assets/php/account/edit.php';
    include 'assets/php/_add.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wishlist | eDuka</title>
    <?php include 'assets/php/_css.php'; ?>
</head>
<body>
<?php 
    include 'assets/php/_nav.php';  
    include 'assets/php/modal.php';
    $user = $_SESSION['token'];
    $wished_query = "SELECT * FROM wishlist WHERE user = '$user'";
    $wished_result = mysqli_query($db, $wished_query) or die(mysqli_error());
?>
    <table class="table table-borderless table-responsive" style="margin: 80px;">
        <!-- <thead><h5>My Wishlist</h5></thead> -->
        <tbody>
        <?php if (mysqli_num_rows($wished_result) > 0) {
            while($wished_row = mysqli_fetch_row($wished_result)){
                $product_query = "SELECT * FROM products WHERE token = $wished_row[2]";
                $product_result = mysqli_query($db, $product_query);
                $product_row = mysqli_fetch_row($product_result);
                echo "<tr>
                    <td><img src='assets/images/products/$product_row[1].jpg' alt='$product_row[2]' style='width: 50%;'></td>
                    <td>$product_row[2] $product_row[3]</td>
                    <td>Ksh. $product_row[6]</td>
                    <td class='set-title'>$product_row[9]</td>
                    <td class = 'd-flex'><div class='mx-auto'><a href='index.php?&list=wishlist&user=$user&product=$product_row[1]'><span class='fa fa-trash'></span> </a>
                    <a href='#'> <span class='fa fa-cart-plus'></span></a></div></td>
                </tr>";}} else echo "<h4>Nothing to show</h4>";?>
        </tbody>
    </table>
    <?php 
    include 'assets/php/footer.php'; ?>
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>