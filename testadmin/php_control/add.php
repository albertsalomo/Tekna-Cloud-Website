<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $year = $_POST['year'];
    $file = $_FILES['file']['name'];
    $statement = "INSERT INTO buku VALUES ('', '$title', '$author', '$publisher', '$year', '')";
    $result = mysqli_query($conn, $statement);

    if ($result && $file) {
        $last_id = mysqli_insert_id($conn);
        $file_tmp = $_FILES['file']['tmp_name'];
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $bytes = random_bytes(20);
        bin2hex($bytes);
        $filename = 'MyFile-' . bin2hex($bytes) . '.' . $ext;
        $parent_path = 'C:/xampp/htdocs/20212_wp2/Minggu 7/';
        $upload_path = 'images/' . $filename;
        $path = $parent_path . $upload_path;
        
        if (move_uploaded_file($file_tmp, $path)) {
            $sql3 = "UPDATE buku SET image='$upload_path' WHERE id=$last_id";
            if (mysqli_query($conn, $sql3))
                echo "Insert successfully with file";
            else
                echo "Something wrong! " . mysqli_error($conn);
        } else
            echo "Not uploaded because of error #" . $_FILES["file"]["error"];
    } 
    else if ($result && !$file)
        echo "Insert successfully but no file";
    else
        echo "Something wrong! " . mysqli_error($conn);

    header("location: admin.php");
}
?>

<h1>Add New Book</h1>
<hr>
<div class="row">
    <a href="admin.php">
        < Back to admin page
    </a>
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlInput1">Judul Buku</label>
            <input type="text" class="form-control" name="title">
        </div>
        <br>
        <div class="form-group">
            <label for="selectAuthor">Pengarang</label>
            <select id="selectAuthor" class="form-control" name="author">
                <?php
                $sql = "SELECT id, nama FROM penulis";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="selectPublisher">Penerbit</label>
            <select id="selectPublisher" class="form-control" name="publisher">
                <?php
                $sql2 = "SELECT id, nama FROM penerbit";
                $result2 = $conn->query($sql2);
                while ($row = $result2->fetch_assoc()) {
                ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlInput1">Tahun</label>
            <input type="number" class="form-control" name="year">
        </div>
        <br>
        <div class="form-group">
            <label for="bookImage">Book Image</label>
            <br><br>
            <input type="file" class="form-control-file" id="bookImage" name="file" accept="image/*">
            <br>
            <script src="framework/image.js"></script>
            <img id="output" src="images/temp.jpg" width="200" height="300"/>
        </div>
        <br>
        <button type="submit" class="btn btn-success" name="submit">Add Book</button>
    </form>
</div>



