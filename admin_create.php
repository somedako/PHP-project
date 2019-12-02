<?php
require_once 'core/config.php';
require_once 'core/function.php';
$conn = connect();
$nav = menu($conn);

if (isset($_POST['title']) && $_POST['title'] != '') {
    $title = $_POST['title'];
    $des = $_POST['description'];
    $cat = $_POST['cat'];

    //move_uploaded_file($_FILES['image']['tmp_name'], 'img/'.$_FILES['image']['name']);

    $conn = connect();
    $sql= "INSERT INTO info (title, Descr, categorie_id, img) VALUES ('".$title."', '".$des."', '".$cat."', '".$_FILES['image']['name']."')";
    if (mysqli_query($conn, $sql)) {
        setcookie('bd_create_success', 1, time()+10);
        header('Location: admin.php');

    } else {
        echo "Error: ".$sql . "<br>" . mysqli_error($conn);
    }
    close($conn);
}
require_once 'templates/header_admin.php';
?>
<div class="container">
    <div class="row">
    <div class="col-lg-12 mt-5">
        <h2 class="mt-3">Create post</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" id="description"></textarea>
            </div>

            <div class="form-group">
                <input type="file" name="image" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="cat">Cat:</label>
                <input type="text" name="cat" class="form-control" value="<?php echo $row['categorie_id']?>">
            </div>

            <div class="form-group text-right">
                <input type="submit" class="btn btn-success" value="create article">
            </div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </form>
    </div>
    </div>
</div>
<?php require_once 'templates/footer.php'?>
