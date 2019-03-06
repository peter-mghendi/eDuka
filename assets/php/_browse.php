<?php
    $step = 20; # Number of products per page
    if (!isset($_GET['page']) || $_GET['page'] <= 0) header("location: browse.php?&page=1");
    extract($_GET);
    $start = $step*($page-1);

    $all_query = "SELECT * FROM products";
    $all_result = mysqli_query($db, $all_query);
    $all_count = mysqli_num_rows($all_result);

    $set_query = "SELECT * FROM products LIMIT $start, $step";
    $set_result = mysqli_query($db, $set_query) or die(mysqli_error($db));

    $pages = ceil($all_count/$step);
    $pages = $pages==0?1:$pages;
    $prev_enabled = $page==1?"disabled":"";
    $next_enabled = $page==$pages?"disabled":"";

    $brand_query = "SELECT DISTINCT brand FROM products";
    $brand_result = mysqli_query($db, $brand_query);

    $category_query = "SELECT DISTINCT category FROM products";
    $category_result = mysqli_query($db, $category_query);
    $categories_distinct = array();
    while($category_row = mysqli_fetch_row($category_result)){
        $category_list = explode(";", $category_row[0]);
        foreach ($category_list as $category_list_item) {
            if (!in_array($category_list_item, $categories_distinct)) array_push($categories_distinct, $category_list_item);
        }
    }

    $saletype_query = "SELECT DISTINCT saletype FROM products";
    $saletype_result = mysqli_query($db, $saletype_query);
    $saletypes_distinct = array();
    while($saletype_row = mysqli_fetch_row($saletype_result)){
        $saletype_list = explode(";", $saletype_row[0]);
        foreach ($saletype_list as $saletype_list_item) {
            if (!in_array($saletype_list_item, $saletypes_distinct)) array_push($saletypes_distinct, $saletype_list_item);
        }
    }

    $status_query = "SELECT DISTINCT status FROM products";
    $status_result = mysqli_query($db, $status_query);
    $statuses_distinct = array();
    while($status_row = mysqli_fetch_row($status_result)){
        $status_list = explode(";", $status_row[0]);
        foreach ($status_list as $status_list_item) {
            if (!in_array($status_list_item, $statuses_distinct)) array_push($statuses_distinct, $status_list_item);
        }
    }