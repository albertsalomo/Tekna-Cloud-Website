
<?php

    include ('../config.php');
    //Hapus
    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_header_content WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql = "DELETE FROM tb_header_content WHERE id='$id'";

    //redirect to table
    header('location: header_content_table.php', true, 301);
?>