<?php

include('../dbConfig.php');
require('../php_control/functions.php');

$send = [];

$title = $_POST['title'];
$content = $_POST['content'];
$image = '';
$contentId = $_POST['tempId'];

if ($title === '' || $content === '') {
    alert('Title and Content cannot be empty !');
    refresh();
    return;
}

if (isset($_FILES['image']) && $_FILES['image']['error'] !== 4) {
    $image = uploadImage($_FILES['image'], '../images/');
    if (!$image) {
        alert('Gagal mengupload gambar!');
        refresh();
        return;
    }
}

// UPDATE

if($image == ''){
    $qryUpdateContent = "UPDATE tb_content SET title='$title', content = '$content' WHERE id = '$contentId'";
}
else{
    $qryUpdateContent = "UPDATE tb_content SET title='$title', content = '$content', image = '$image' WHERE id = '$contentId'";
}

if ($conn->query($qryUpdateContent)) {
    echo true;
} else {
    echo $conn->error;
}
?>