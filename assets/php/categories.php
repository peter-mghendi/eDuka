<?php $cat_query = "SELECT * FROM categories"; $cat_result = mysqli_query($db, $cat_query); ?>
<div id="category_bar" class="container-fluid collapse bg-dark">
    <ul class="list-group">
      <?php while($category = mysqli_fetch_row($cat_result)[1]) echo "<li class='list-group-item sub-item set-title'>$category</li>"; ?>
    </ul>
</div>