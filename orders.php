<?php include 'assets/php/_protect.php'; 
    include 'assets/php/_connect.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders | eDuka</title>
    <?php include 'assets/php/_css.php'; ?>
</head>

<body>
    <?php 
    include 'assets/php/_nav.php';
    include 'assets/php/modal.php';
    $user = $_SESSION['token'];
    $ordered_query = "SELECT * FROM orders WHERE user = '$user'";
    $ordered_result = mysqli_query($db, $ordered_query) or die(mysqli_error());
?>
    <div class="container d-flex table-responsive">
        <table class="table table-sm table-borderless table-hover mx-auto" style="margin-top: 80px;">
            <thead>
                <tr>
                <th></th>
                <th>Order ID</th>
                <th>Item Quantity</th>
                <th>Status</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($ordered_result) > 0) {
            while($ordered_row = mysqli_fetch_row($ordered_result)){
                $item_quantity = 15;
                echo "<tr>
                    <td class='align-middle'>$ordered_row[0]</td>
                    <td class='align-middle'>$ordered_row[1]</td>
                    <td class='align-middle'>$item_quantity</td>
                    <td class='align-middle set-title'><span>$ordered_row[5]</span></td>
                    <td class='align-middle'><button class='btn btn-primary' data-toggle='modal' data-target='#orderModal_$ordered_row[1]'>Details</button></td>
                </tr><tr><td>";
                include 'assets/php/order_details.php'; echo "</td></tr>";
                }}  else echo "<tr><td><caption>Nothing to display</caption></td></tr>";?>
            </tbody>
        </table>
        <?php ?>
    </div>
    <?php include 'assets/php/footer.php'; ?>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>