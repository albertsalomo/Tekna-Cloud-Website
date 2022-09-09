<?php

include('../dbConfig.php');

$send = [];
$bookId = $_POST['id'];

// UPDATE
$qryDeleteBuku = "DELETE from buku WHERE id = '$bookId'";

if ($conn->query($qryDeleteBuku)) {
    echo true;
} else {
    echo $conn->error;
}
?>