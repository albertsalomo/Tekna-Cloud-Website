<!DOCTYPE html>

<head>
    <?php
    $counter = 0;
    include('framework/html_head.php');
    include('dbConfig.php');
    $result = $conn->query("SELECT a.id, judul, b.nama AS pengarang, c.nama AS penerbit, tahun, image  FROM buku a 
                                LEFT JOIN pengarang b ON a.id_pengarang = b.id
                                LEFT JOIN penerbit c ON a.id_penerbit = c.id");
    ?>
    <title>MySQL Website</title>
</head>

<body>
    <div class="container">
        <?php if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            switch ($page) {
                case 'add.php':
                    include 'add.php';
                    break;
                case 'edit.php':
                    include 'edit.php';
                    break;
                case 'delete.php':
                    include 'delete.php';
                    break;
            }
        } else {
        ?>
            <h1>Books List</h1>
            <hr>
            <td>
                <button type="button" class="btn btn-success">
                    <i class="fas fa-plus"></i>
                    <i class="fas fa-user"></i>
                    <a href="<?= $_SERVER['REQUEST_URI'] ?>?page=<?= 'add.php' ?>" 
                    style="color: white; text-decoration: none;">
                        Add Data
                    </a>
                </button>

                <!-- Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Modal title</h5>
                            <button type="button" id="btnCloseModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" id="formAddBook" class="modal-body" enctype="multipart/form-data">
                            <div class="row pt-5">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3 text-center">
                                        <div class="container-imgpreview mx-auto d-flex justify-content-center position-relative">
                                            <div class="position-absolute w-100 h-100 rounded img-overlay d-flex justify-content-around align-items-center">
                                                <h3>Change Picture</h3>
                                            </div>
                                            <img src="images/book.png" alt="image" id="imgPreview" class="w-100 h-100 object-fit-cover rounded mb-3" />
                                        </div>
                                        <label for="foto">Foto</label>
                                        <input type="file" name="foto" id="imgInput" class="form-control d-none">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" name="judul">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="tahun">Tahun</label>
                                        <input type="number" class="form-control" name="tahun">
                                    </div>
                                    <div class="form-group mb-3 position-relative">
                                        <label>Penulis</label>
                                        <div class="form-check-inline mx-1">
                                            <input type="checkbox" class="form-check-input" id="chkNewAuthor" name="chkNewAuthor">
                                            <label class="form-check-label" for="chkNewAuthor">Penulis Baru</label>
                                        </div>
                                        <div id="listPenulis" class="">
                                            <?php $arrIdPenulis = $conn->query("SELECT id, nama FROM penulis"); ?>
                                            <select class="form-select" aria-label="id_penulis" name="id_penulis" id="id_penulis">
                                                <!-- isi pke jquery ajax -->
                                            </select>
                                        </div>
                                        <div class="row invisible" id="txtPenulis">
                                            <div class="col">
                                                <input type="text" class="form-control" name="penulis_fname" placeholder="Nama depan">
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" name="penulis_lname" placeholder="Nama belakang">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="id_penerbit">Penerbit</label>
                                        <select class="form-select" aria-label="id_penerbit" name="id_penerbit">
                                            <?php $arrIdPenerbit = $conn->query("SELECT id, nama FROM penerbit"); ?>
                                            <?php foreach ($arrIdPenerbit as $row) : ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <section id="modal-footer" class="modal-footer form-group mb-3 d-flex justify-content-end">
                            <button id="btnSubmit" name="submit" class="btn btn-success mt-2 rounded p-2 px-3">Submit</button>
                        </section>
                    </div>
                </div>
            </div>
            <!--Modal-->
            </td><br><br>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $counter+=1 ?></td>
                            <td><?= $row['judul'] ?></td>
                            <td><?= $row['pengarang'] ?></td>
                            <td><?= $row['penerbit'] ?></td>
                            <td><?= $row['tahun'] ?></td>
                            <td>
                                <?php
                                    if($row['image']!=''){
                                        echo '<img src="'.$row['image'].'" width="100" height="150"/>';
                                    }
                                    else{
                                        echo '<img src="images/temp.jpg" width="100" height="150"/>';
                                    }
                                ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                    <a href="<?= $_SERVER['REQUEST_URI'] ?>?page=edit.php&id=<?= $row['id'] ?>" 
                                    style="color: black; text-decoration: none;">
                                        Edit
                                    </a>
                                </button>
                                <button type="button" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                    <a href="<?= $_SERVER['REQUEST_URI'] ?>?page=delete.php&id=<?= $row['id'] ?>" 
                                    style="color: white; text-decoration: none;">
                                        Delete
                                    </a>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</body>
</html>
