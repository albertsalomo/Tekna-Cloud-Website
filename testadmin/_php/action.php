<?php

include('../dbConfig.php');

$req = $_GET['req'];
$send = [];

if($req == 'rows'){
    $result = $conn->query("SELECT id, title, content, image FROM tb_content");

    while($row = $result->fetch_assoc()){
        $send[] = $row;
    }
}

if($req == 'edit'){
    $book_id = $_GET['id'];
    $result = $conn->query("SELECT id, title, content, image FROM tb_content");

    while($row = $result->fetch_assoc()){
        $send[] = $row;
    }
}

echo json_encode($send);
?>