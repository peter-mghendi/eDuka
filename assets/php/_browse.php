<?php
    $step = 20; # Number of products per page
    if (!isset($_GET['page'])) header("location: browse.php?&page=1");
    extract($_GET);
    $start = 10*($page-1);

    $set_query = "SELECT * FROM products LIMIT $start, $step";
    $set_result = mysqli_query($db, $set_query) or die(mysqli_error($db));

    /* 
        Available controls:
        - Search term
        - Brand
        - Price (min, max)
        - Category
        - Sale Type
        - Status
        - Page (start, step)
    */