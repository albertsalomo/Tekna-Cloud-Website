<?php

include('../dbConfig.php');
require('../php_control/functions.php');

$send = [];

$judul = $_POST['title'];
$tahun = $_POST['year'];
$image = '';
$bookId = $_POST['tempId'];

if ($judul === '' || $tahun === '') {
    alert('Title and year cannot be empty !');
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
    $qryUpdateBuku = "UPDATE buku SET judul='$judul', tahun = '$tahun' WHERE id = '$bookId'";
}
else{
    $qryUpdateBuku = "UPDATE buku SET judul='$judul', tahun = '$tahun', image = '$image' WHERE id = '$bookId'";
}

if ($conn->query($qryUpdateBuku)) {
    echo true;
} else {
    echo $conn->error;
}
?>