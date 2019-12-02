<?php
require_once 'templates/header.php';
$conn = connect();
$inf = selectArticle($conn);
$cat = getAllCategories($conn);
close($conn);
?>
<body>
    <div class="container">
    <div class="row">
    <div class="col-lg-9">
        <div class="card mt-3" style="width: 55rem;">
        <img src="img/<?php echo $inf['img']?>" class="card-img-top w-100" alt="<?php echo $inf['img']?>">
        <div class="card-body">
            <h1 class="card-title"><?php echo $inf['title']?></h1>
            <p class="card-text"><?php echo $inf['Descr']?></p>
            <?php $art_cat = false; foreach ($cat as $categories) {
                if ($categories['id'] == $inf['categorie_id']) {
                    $art_cat = $categories;
                    break;
                }
            }?>
            <small>Категория: <a href="article.php?id=<?php echo $art_cat['id']?>" class="mt-2" style="font-size: 11px"> <?php echo $art_cat['title']?></a></small>
        </div>
        </div>
    </div>
        <div class="col-lg-3">
            <div class="list-group mt-5">
                    <a class="list-group-item list-group-item-action" href="/" style="margin-left: 65px">Назад</a>
            </div>
        </div>
    </div>
    </div>
    <?php require_once 'templates/footer.php'?>

