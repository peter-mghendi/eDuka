<?php 
    include 'assets/php/_connect.php';
    include 'assets/php/_browse.php';
    if (session_status() == PHP_SESSION_NONE) session_start();
    $user = isset($_SESSION['token'])?$_SESSION['token']:"";
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
    include 'assets/php/modal.php';
    ?>

    <div class="jumbotron-fluid bg-light" style='padding: 8px; margin-top: 32px'>
        <div class="container-fluid d-flex">
            <button class="btn btn-outline-primary ml-auto mt-5 mb-3" data-toggle="collapse" data-target="#controls">
                <span class="spinner-grow spinner-grow-sm"></span> Show/Hide Controls</button>
        </div>

        <div id="controls" class="collapse show"><div class="container"><form action="<?php $_PHP_SELF ?>" method="get" class="form">
        <div class="form-group row">
                        <input type="hidden" id='page' name='page' class="form-control-plaintext px-3" value="<?php echo $_GET['page'] ?>" hidden="hidden">
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-3"><input type="search" id='search' name='search' 
                        class="form-control-plaintext px-3" placeholder='Search Term' value="<?php echo isset($search)?$search:'';?>"></div>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-3"><select class="selectpicker" id='category' name='category[]' multiple='multiple'
                                data-live-search="true" title="Select a category..." data-selected-text-format="count > 3" data-width="100%" 
                                data-size="5" data-actions-box="true"  data-header="Select a category">
                                <?php foreach ($categories_distinct as $category_distinct){
                                    $category_selected = (in_array($category_distinct, $category))?"selected":"";
                                    echo "<option class='set-title' $category_selected>$category_distinct</option>"; 
                                }?>
                        </select></div>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-3"><select class="selectpicker" id='brand' name='brand[]' multiple='multiple'
                                data-live-search="true" title="Select a brand..." data-selected-text-format="count > 3" data-width="100%" 
                                data-size="5" data-actions-box="true"  data-header="Select a brand">
                                <?php while($brand_row = mysqli_fetch_row($brand_result)){ 
                                    $brand_selected = (in_array($brand_row[0], $brand))?"selected":"";
                                    echo "<option class='set-title' $brand_selected>$brand_row[0]</option>"; 
                                }?>
                        </select></div>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-3 form-inline"><div class="d-flex">
                            <div class="mr-auto">
                                <input type="number" class="form-control-plaintext px-3" id='price_min' name='price_min' placeholder='Min Price' 
                                min='0' value="<?php echo isset($price_min)?$price_min:'';?>" style="width: 100%">
                            </div>
                            <div class="mx-auto align-middle"><p class="px-2">to</p></div>
                            <div class="ml-auto">
                                <input type="number" class="form-control-plaintext px-3" id='price_max' name='price_max' placeholder='Max Price' 
                                min='0' value="<?php echo isset($price_min)?$price_min:'';?>" style="width: 100%"></div>
                        </div></div>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-3"><select class="selectpicker" id='saletype' name='saletype[]' multiple='multiple'
                                data-live-search="true" title="Select a sale type..." data-selected-text-format="count > 3" data-width="100%" 
                                data-size="5" data-actions-box="true"  data-header="Select a sale type">
                                <?php foreach ($saletypes_distinct as $saletype_distinct){ 
                                    $saletype_selected = (in_array($saletype_distinct, $saletype))?"selected":"";
                                    echo "<option class='set-title' $saletype_selected>$saletype_distinct</option>"; 
                                }?>
                        </select></div>
                        <div class="col-xs-12 col-sm-6 col-md-4 mb-3"><select class="selectpicker" id='status' name='status[]' multiple='multiple'
                                data-live-search="true" title="Select a status..." data-selected-text-format="count > 3" data-width="100%" 
                                data-size="5" data-actions-box="true"  data-header="Select a status">
                                <?php foreach ($statuses_distinct as $status_distinct){ 
                                    $status_selected = (in_array($status_distinct, $status))?"selected":"";
                                    echo "<option class='set-title' $status_selected>$status_distinct</option>";
                                }?>
                        </select></div>
                        <div class="col-xs-12 col-sm-6 col-md-6"><input type="reset" class="btn btn-outline-secondary btn-block"></div>
                        <div class="col-xs-12 col-sm-6 col-md-6"><input type="submit" class="btn btn-outline-primary btn-block"
                                id='filter' name='filter' value="Submit"></div>
    </div></form></div></div>

    <div class="album py-5 bg-light"><div class="container"><div class='row'>
            <?php
            /* 
                Available controls:
                - Sale Type
                - Status
                - Page (start, step)
            */
                while($set_row = mysqli_fetch_row($set_result)){
                    extract($_GET);
                    $product = $set_row[1];
                    $pr_brand = $set_row[2];
                    $pr_name = $set_row[3]; 
                    $pr_desc = $set_row[4];
                    $pr_price = (int) $set_row[6];
                    $saletype_array = explode(";", $set_row[7]);
                    $category_array = explode(";", $set_row[8]);
                    $tag_array = explode(";", $set_row[9]);
                    $status_array = explode(";", $set_row[10]);

                    $price_min = empty($price_min)?null:$price_min;
                    $price_max = empty($price_max)?null:$price_max;

                    if (isset($search)) if ((stripos($pr_brand, $search) === false) && (stripos($pr_name, $search) === false) && !in_array($search, $tag_array)) continue;
                    if (isset($brand)) if (!in_array($pr_brand, $brand)) continue;
                    if (isset($category)) if (sizeof(array_intersect($category_array, $category)) == 0) continue;
                    if (isset($price_min)) {$price_min = intval($price_min); if ($pr_price < $price_min) continue;}
                    if (isset($price_max)) {$price_max = intval($price_max); if ($pr_price > $price_max) continue;}
                    if (isset($saletype)) if (sizeof(array_intersect($saletype_array, $saletype)) == 0) continue;
                    if (isset($status)) if (sizeof(array_intersect($status_array, $status)) == 0) continue;

                    $wished_query = "SELECT * FROM wishlist WHERE user = '$user' AND product = '$product'";
                    $wished_result = mysqli_query($db, $wished_query) or die(mysqli_error());
                    $wished_count = mysqli_num_rows($wished_result);
                    $wished = ($wished_count == 1)?"fa":"far";
                    $wished_status = ($wished_count == 1)?"Added":"Add";
                    include 'assets/php/product.php';
                    include 'assets/php/details.php'; }?>
    </div></div></div>

    <ul class="pagination justify-content-center">
        <?php
            $page = $_GET['page'];
            $next = $page + 1;
            $prev = $page - 1;
            echo "<li class='page-item $prev_enabled'><a class='page-link' href='browse.php?&page=$prev'>Previous</a></li>";
            for($i=1; $i<=$pages; $i++){
                if ($i == $page) $current_page = "active";
                else $current_page = "";
                echo "<li class='page-item $current_page'><a class='page-link' href='browse.php?&page=$i'>$i</a></li>";
            }
            echo "<li class='page-item $next_enabled'><a class='page-link' href='browse.php?&page=$next'>Next</a></li>"
        ?>
    </ul> 
    <?php include 'assets/php/footer.php'; ?>

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap-select.min.js"></script>
    <script src="../js/webfont.js"></script>
    <script src="assets/js/main.js"></script>
    <?php include 'assets/php/_error.php'; ?>
</body>

</html>