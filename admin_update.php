<?php
require_once 'core/config.php';
require_once 'core/function.php';
$conn = connect();
$nav = menu($conn);
if (isset($_POST['title']) && $_POST['title'] != '') {
    $title = $_POST['title'];
    $des = $_POST['description'];
    $cat = $_POST['cat'];

    $conn = connect();
    if ($_FILES['image']['name']!='') {
        move_uploaded_file($_FILES['image']['tmp_name'], 'img/'.$_FILES['image']['name']);
        $sql= "UPDATE info set title = '".$title."', Descr = '".$des."', categorie_id = '".$cat."', img = '".$_FILES['image']['name']."' WHERE id=".$_GET['id'];
    } else {
        $sql= "UPDATE info set title = '".$title."', Descr = '".$des."', categorie_id = '".$cat."' WHERE id=".$_GET['id'];
    }

    $conn = connect();

    if (mysqli_query($conn, $sql)) {
        setcookie('bd_create_success', 1, time()+10);
        header('Location: /admin.php');

    } else {
        echo "Error: ".$sql . "<br>" . mysqli_error($conn);
    }
    close($conn);
}
?>
<?php
$conn = connect();
$sql = 'SELECT * FROM info WHERE id='.$_GET['id'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
close($conn);
require_once 'templates/header_admin.php';
?>
<h2 class="text-center">Update post=<?php echo $_GET['id']?></h2>
<div class="container">
    <div class="row">
    <div class="col-lg-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" id="title" value="<?php echo $row['title']?>">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" id="description"><?php echo $row['Descr']?></textarea>
            </div>
            <div class="form-group">
                <img class="w-75" src="/img/<?php echo $row['img']?>">
            </div>

            <div class="form-group">
                <label for="image">Photo:</label>
                <input type="file" name="image" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="cat">Cat:</label>
                <input type="text" name="cat" class="form-control" value="<?php echo $row['categorie_id']?>">
            </div>

            <div class="form-group text-right">
                <input type="submit" class="btn btn-success" value="update article">
            </div>
        </form>
    </div>
    </div>
    </div>
    <?php require_once 'templates/footer.php'?>
