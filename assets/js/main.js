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