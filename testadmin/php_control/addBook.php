<?php
require('../dbConfig.php');
require('functions.php');

$judul = $_POST['title'];
$tahun = $_POST['year'];
$image = 'temp.jpg';

if ($judul === '' || $tahun === '') {
    alert('Title and year cannot be empty !');
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
$qryInsertBuku = "INSERT INTO buku VALUES ('', '$judul', '$tahun','$image')";
if ($conn->query($qryInsertBuku)) {
    echo true;
} else {
    echo $conn->error;
}