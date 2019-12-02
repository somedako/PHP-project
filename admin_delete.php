<?php
require_once 'templates/header_admin.php';
$conn = connect();
$data = deleteArticle($conn, $_GET['id']);
close($conn);
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-9">
               <?php if ($data === true) {
                   echo "<div class=\"alert alert-success\" style=\"margin: 150px 0 205px 0;\" role=\"alert\">
                    Article was deleted!</div>"; }  else {
                        echo "<div class=\"alert alert-danger\" role=\"alert\">
                            ERROR!</div>";
                   }
               ?>

        </div>
        <div class="col-lg-3" style="margin-top: 150px">
            <div class="list-group">
                <a class="list-group-item list-group-item-action" href="admin.php" style="margin-left: 65px">Назад</a>
            </div>
        </div>
    </div>
</div>
<?php require_once 'templates/footer.php'?>

