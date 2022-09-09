<?php
$id = $_GET['id'];
$sql = "SELECT * FROM buku WHERE id = $id";
$row = $conn->query($sql)->fetch_assoc();

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $year = $_POST['year'];
    $file = $_FILES['file']['name'];
    $sql_update = "UPDATE buku SET judul = '$title', id_pengarang = '$author', 
                        id_penerbit = '$publisher', tahun = '$year', image = '' WHERE id = $id";
    $result = mysqli_query($conn, $sql_update);
    if ($result && $file) {
        $file_tmp = $_FILES['file']['tmp_name'];
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $bytes = random_bytes(20);
        bin2hex($bytes);
        $filename = 'MyFile-' . bin2hex($bytes) . '.' . $ext;
        $parent_path = 'C:/xampp/htdocs/20212_wp2/Minggu 7/';
        $upload_path = 'images/' . $filename;
        $path = $parent_path . $upload_path;
        
        if (move_uploaded_file($file_tmp, $path)) {
            $sql = "UPDATE buku SET image='$upload_path' WHERE id=$id";
            if (mysqli_query($conn, $sql))
                echo "<script>console.log('Update successfully with file')</script>";
            else
                echo "Something wrong! " . mysqli_error($conn);
        } else
            echo "Not uploaded because of error #" . $_FILES["file"]["error"];
    } else if ($result && !$file)
        echo "Update successfully but no file";
    else
        echo "Something wrong! " . mysqli_error($conn);
    header("location: admin.php");
}
?>

<h1>Edit Book</h1>
<hr>
<div class="row">
    <a href="admin.php">
        < Back to admin page
    </a>
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlInput1">Judul Buku</label>
            <input type="text" class="form-control" name="title" value="<?= $row['judul'] ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="selectAuthor">Pengarang</label>
            <select id="selectAuthor" class="form-control" name="author">
                <?php
                $sql2 = "SELECT id, nama FROM pengarang";
                $result2 = $conn->query($sql2);
                while ($row2 = $result2->fetch_assoc()) {
                ?>
                    <?php
                    if ($row['id_pengarang'] == $row2['id']) {
                    ?>
                        <option selected value="<?= $row2['id'] ?>"><?= $row2['nama'] ?></option>
                    <?php
                    } else { ?>
                        <option value="<?= $row2['id'] ?>"><?= $row2['nama'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="selectPublisher">Penerbit</label>
            <select id="selectPublisher" class="form-control" name="publisher">
                <?php
                $sql3 = "SELECT id, nama FROM penerbit";
                $result3 = $conn->query($sql3);
                while ($row3 = $result3->fetch_assoc()) {
                ?>
                    <?php
                    if ($row['id_penerbit'] == $row3['id']) {
                    ?>
                        <option selected value="<?= $row3['id'] ?>"><?= $row3['nama'] ?></option>
                    <?php
                    } else { ?>
                        <option value="<?= $row3['id'] ?>"><?= $row3['nama'] ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="exampleFormControlInput1">Tahun</label>
            <input type="number" class="form-control" name="year" value="<?= $row['tahun'] ?>">
        </div>
        <br>
        <div class="form-group">
            <label for="bookImage">Book Image</label>
            <br><br>
            <input type="file" class="form-control-file" id="bookImage" name="file" accept="image/*">
            <script src="framework/image.js"></script>
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
        <button type="submit" class="btn btn-warning" name="submit">Edit</button>
    </form>
</div>
