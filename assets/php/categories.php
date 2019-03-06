<?php 
	$category_query = "SELECT DISTINCT category FROM products";
    $category_result = mysqli_query($db, $category_query);
    $categories_distinct = array();
    while($category_row = mysqli_fetch_row($category_result)){
        $category_list = explode(";", $category_row[0]);
        foreach ($category_list as $category_list_item) {
            if (!in_array($category_list_item, $categories_distinct)) array_push($categories_distinct, $category_list_item);
        }
    }
?>
<div id="category_bar" class="container-fluid collapse bg-dark">
    <ul class="list-group">
      <?php foreach ($categories_distinct as $category_disinct) {
      	echo "<li class='list-group-item sub-item set-title'><a class='btn text-light' href='browse.php?&category=$category_disinct'>$category_disinct</a></li>"; 
      } ?>
    </ul>
</div>