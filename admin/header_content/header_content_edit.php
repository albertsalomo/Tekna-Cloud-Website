<?php 
    // include ('../config.php');
    include ('../_framework/header.php');

    //Ketika tombol SUBMIT
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    if(!empty($id)){
        $action = "edit";
        $sql = "UPDATE tb_header_content SET title='$title', description='$description' WHERE id='$id'";
    }
    $result = mysqli_query($conn, $sql);
    // header('location: header_content_table.php', true, 301);
} 

?>

<?php 
// Edit
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_header_content WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    // redirect to table
}
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-center mt-5">Header Content Data</h1>
            <a href="header_content_table.php" class="btn btn-warning">Back</a>

            <form action="" method="POST" class="mt-3">
                <input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>" >
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="<?php if(isset($row['title'])) echo $row['title']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="8"><?php if(isset($row['description'])) echo $row['description']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-success" value="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>