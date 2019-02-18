<?php include 'assets/php/_protect.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop | Profile</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/forms.css">
</head>
<body>
<?php 
    include 'assets/php/_nav.php';
    include 'assets/php/_connect.php';

    $token = $_SESSION["token"];
    $profile_query = "SELECT * FROM users WHERE token = '$token'";
    $profile_res = mysqli_query($db, $profile_query);
    $profile_row = mysqli_fetch_row ($profile_res);
?>

    <div class='container-fluid form-container'><div class='container-fluid form-content'><div class='form-material'>
        <table class="table table-borderless">
        <thead>
            <h5>User details for <?php echo $_SESSION['user']; ?></h5>
        </thead>
        <tbody>
            <tr>
                <td>Username</td>
                <td><?php echo $profile_row[2] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $profile_row[3] ?></td>
            </tr>
            <tr>
                <td>Password digest</td>
                <td><?php echo $profile_row[4] ?></td>
            </tr>
            <tr>
                <td>Account status</td>
                <td><?php echo $profile_row[5] ?></td>
            </tr>
        </tbody>
        </table>
    </div></div></div>
    
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>