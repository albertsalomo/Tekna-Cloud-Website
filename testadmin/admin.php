<!DOCTYPE html>

<head>
    <?php
    $counter = 0;
    include('framework/html_head.php');
    include('dbConfig.php');
    $result = $conn->query("SELECT id, judul, tahun, image FROM buku");
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal" id="btnNew">
                    <i class="fas fa-plus"></i>
                    <i class="fas fa-user"></i>
                    Add book
                </button>
            </td><br><br>

            <div class="modal" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titleModal">

                            </h5>
                            <!-- Close Button Modal -->
                            <button type="button" id="btnCloseModal" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span>
                                    <i class="fas fa-times"></i>
                                </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="formAddBook" enctype="multipart/form-data" class="container">
                                <div class="row">
                                    <div class="col-lg-12" style="text-align:center;">
                                        <img id="output" src="images/book.png" width="200" height="200" style="border: none;" />
                                    </div>
                                </div>
                                <input type="hidden" name="tempId" id="tempId">
                                <div class="row mt-3" style="text-align:center;">
                                    <h5>Change Picture</h5>
                                    <div class="col-lg-12">
                                        <input type="file" name="image" id="bookImage" class="form-control">
                                    </div>
                                </div>
                                <script src="framework/image.js"></script>
                                <div class="row mt-3" style="text-align:center;">
                                    <h5>Title</h5>
                                    <input type="text" name="title" id="title" class="form-control">
                                </div>
                                <div class="row mt-3" style="text-align:center;">
                                    <h5>Content</h5>
                                    <input type="number" name="year" id="year" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="submit" class="btn btn-primary" id="btnSubmit" >Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>     
                <tbody>

                </tbody>
            </table>
        <?php } ?>
    </div>
    <script src="buku.js"></script>
</body>

</html>