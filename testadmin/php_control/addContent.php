<?php
require('../dbConfig.php');
require('functions.php');

$title = $_POST['title'];
$content = $_POST['content'];
$image = 'temp.jpg';

if ($title === '' || $content === '') {
    alert('Title and Content cannot be empty!');
    refresh();
    return;
}

// upload foto
if (isset($_FILES['image']) && $_FILES['image']['error'] !== 4) {
    $image = uploadImage($_FILES['image'], '../images/');
    if (!$image) {
        alert('Gagal mengupload gambar!');
        refresh();
        return;
    }
}

// insert
$qryInsertContent = "INSERT INTO tb_content VALUES ('', '$title', '$content','$image')";
if ($conn->query($qryInsertContent)) {
    echo true;
} else {
    echo $conn->error;
}