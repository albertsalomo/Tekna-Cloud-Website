<?php
$id = $_GET['id'];
$sql = "SELECT a.id, judul, b.nama AS pengarang, c.nama AS penerbit, tahun, image FROM buku a 
                                LEFT JOIN pengarang b ON a.id_pengarang = b.id
                                LEFT JOIN penerbit c ON a.id_penerbit = c.id
                                WHERE a.id = $id";
$row = $conn->query($sql)->fetch_assoc();

if (isset($_POST['submit'])) {
    $sql_delete = "DELETE FROM buku WHERE id = $id";
    if ($conn->query($sql_delete)) {
        header("location: admin.php");
    } else {
        var_dump($conn->error);
    }
}
?>

<h1>Delete Book</h1>
<hr>
<div class="row">
    <a href="admin.php">
        < Back to admin page
    </a>
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlInput1">Judul Buku</label>
            <input readonly="true" type="text" class="form-control" name="title" value="<?= $row['judul'] ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="selectAuthor">Pengarang</label>
            <input readonly="true" type="text" class="form-control" name="author" value="<?= $row['pengarang'] ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="selectAuthor">Penerbit</label>
            <input readonly="true" type="text" class="form-control" name="publisher" value="<?= $row['penerbit'] ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlInput1">Tahun</label>
            <input readonly="true" type="number" class="form-control" name="year" value="<?= $row['tahun'] ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="bookImage">Book Image</label>
            <br>
            <?php
                if ($row['image'] != '') {
                    echo '<img id="output" src="' . $row['image'] . '" width="200" height="300"/>';
                } else {
                    echo '<img id="output" src="images/temp.jpg" width="200" height="300"/>';
                }
            ?>
        </div>
        <br>
        <button type="submit" class="btn btn-danger" name="submit">Delete</button>
    </form>
</div>