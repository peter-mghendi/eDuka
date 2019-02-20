<?php 
    include 'assets/php/_connect.php';
    if (session_status() == PHP_SESSION_NONE) session_start();
    if (isset($_SESSION['token'])){
        include 'assets/php/account/edit.php';
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
    <title>Home | eDuka</title>
    <?php include 'assets/php/_css.php'; ?>
</head>
<body>
<?php 
    include 'assets/php/_nav.php';
    include 'assets/php/content.php';
    include 'assets/php/modal.php';
    include 'assets/php/footer.php'
?> 
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/webfont.js"></script>
<script> 
"use strict";
$(document).on("click", ".product-btn", function(){
    var productId = $(this).data('id');
})

let dropbox;
dropbox = document.getElementById("preview");
const preview = document.getElementById("preview");

dropbox.addEventListener("dragenter", dragenter, false);
dropbox.addEventListener("dragover", dragover, false);
dropbox.addEventListener("drop", drop, false);

function dragenter(e) {
    e.stopPropagation();
    e.preventDefault();
}

function dragover(e) {
    e.stopPropagation();
    e.preventDefault();
}

function drop(e) {
    e.stopPropagation();
    e.preventDefault();
    const dt = e.dataTransfer;
    const files = dt.files;
    document.querySelector('#new_pic').files = files;
    handleFiles(files);
}

function handleFiles(files) {
    const file = files[0];
    const old_img = document.getElementById("preview_img");
    preview.removeChild(old_img);
    const img = document.createElement("img");
    img.classList.add("obj");
    img.classList.add("mx-auto", "img-fluid", "rounded-circle", "profile-img");
    img.file = file;
    img.id = "preview_img";
    preview.appendChild(img);

    preview.classList.remove("preview-empty");
    preview.classList.add("preview-uploaded");

    const reader = new FileReader();
    reader.onload = (function(aImg) {return function(e) {aImg.src = e.target.result; }; })(img);
    reader.readAsDataURL(file);
}
</script>
<?php include 'assets/php/_error.php'; ?>
</body>
</html>