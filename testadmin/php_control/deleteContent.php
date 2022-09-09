<?php

include('../dbConfig.php');

$send = [];
$contentId = $_POST['id'];

// UPDATE
$qryDeleteContent = "DELETE from tb_content WHERE id = '$contentId'";

if ($conn->query($qryDeleteContent)) {
    echo true;
} else {
    echo $conn->error;
}
?>