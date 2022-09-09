<?php 
    // include ('../config.php');
    include ('../_framework/header.php');

    $sql = "SELECT id, title, description FROM tb_header_content";
    $result = mysqli_query($conn, $sql);
?>

<h1 class="text-center my-5">Landing Page Header</h1>

<div class="container">
    <div class="row">
        <div class="col">
            <!-- Add Button -->
            <a class="btn btn-success mb-2" href="header_content_add.php">Add Data</a>

            <!-- Table -->
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                    $num = 1;
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                    <td><?= $num++ ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td>
                        <a href="header_content_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a>
                        <!-- <a href="header_content_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a> -->
                    </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            <!-- End of Table -->
        </div>
    </div>
</div>
