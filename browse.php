<?php 
    include 'assets/php/_connect.php';
    $user = $_SESSION['token'];
    include 'assets/php/_browse.php';
    if (session_status() == PHP_SESSION_NONE) session_start();
    if (isset($_SESSION['token'])){
        include 'assets/php/account/edit.php';
        include 'assets/php/_add.php';
    } else {
        include 'assets/php/_login.php'; 
        include 'assets/php/_signup.php';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Browse | eDuka</title>
    <?php include 'assets/php/_css.php'; ?>
</head>

<body>
    <?php 
    include 'assets/php/_nav.php';
?>
    <div class="jumbotron-fluid bg-light" style='padding: 8px; padding-top:0px'>
        <div class="container-fluid d-flex">
            <button class="btn btn-outline-primary ml-auto mt-5 mb-3" data-toggle="collapse" data-target="#controls">
                <span class="spinner-grow spinner-grow-sm"></span> Show/Hide Controls</button>
        </div>

        <div id="controls" class="collapse show"><div class="container"><form action="$" method="post" class="form">
        <div class="form-group row">
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-2"><input type="search" id='search' name='search' 
                        class="form-control" placeholder='Search Term'></div>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-2"><select class="selectpicker" id='brand' name='brand' multiple='multiple'
                                data-live-search="true" title="Select a brand..." data-selected-text-format="count > 3" data-width="100%" 
                                data-size="5" data-actions-box="true"  data-header="Select a brand">
                                <?php for($i=0; $i<4; $i++) echo "<option>Brand $i</option>"; ?>
                        </select></div>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-2 form-inline">
                            <label for="price_min">Price: </label><input type="number"class="form-control" id='price_min' name='price_min'>
                            <label for="price_max">To: </label><input type="number"class="form-control" id='price_max' name='price_max'>
                            </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-2"><label for="category">Category:</label><input
                                type="text" class="form-control" id='category' name='category'></div>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-2"><label for="saletype">Sale Type:</label><input
                                type="text" class="form-control" id='saletype' name='saletype'></div>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-2"><label for="status">Status:</label><input type="text"
                                class="form-control" id='status' name='status'></div>
                        <div class="col-xs-12 col-sm-6 col-md-6"><input type="reset"
                                class="btn btn-secondary btn-block"></div>
                        <div class="col-xs-12 col-sm-6 col-md-6"><input type="submit" class="btn btn-primary btn-block"
                                id='filter' name='filter' value="Submit"></div>
    </div></form></div></div>

    <div class="album py-5 bg-light"><div class="container"><div class='row'>
            <?php 
                # Remember to remove this for loop.
                for($x=0; $x<4; $x++){
                $i=0;
                $set_query = "SELECT * FROM products LIMIT $start, $step";
                $set_result = mysqli_query($db, $set_query) or die(mysqli_error($db));
                while($set_row = mysqli_fetch_row($set_result)){
                $categories = explode(";", $set_row[7]);
                $product = $set_row[1];
                $wished_query = "SELECT * FROM wishlist WHERE user = '$user' AND product = '$product'";
                $wished_result = mysqli_query($db, $wished_query) or die(mysqli_error());
                $wished_count = mysqli_num_rows($wished_result);
                $wished = ($wished_count == 1)?"fa":"far";
                $wished_status = ($wished_count == 1)?"Added":"Add";
                include 'assets/php/product.php';
                include 'assets/php/details.php';
                $i++;} }?>
    </div></div></div>

    <ul class="pagination justify-content-center">
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul> 
    <?php include 'assets/php/footer.php'; ?>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>                 -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap-select.min.js"></script>
    <script src="../js/webfont.js"></script>
    <script src="assets/js/main.js"></script>
    <?php include 'assets/php/_error.php'; ?>
</body>

</html>