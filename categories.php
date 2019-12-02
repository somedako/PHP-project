<?php
require_once 'templates/header.php';
$conn = connect();
$row = info($conn);
$cat = getAllCategories($conn);
$inf = infoMain($conn);
close($conn);
?>
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-9">
            <div class="row" style="margin-right: -70px">
                <?php foreach ($row as $v) {?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card" style="width: 18rem;">
                            <img src="img/<?php echo $v['img']?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $v['title']?></h5>
                                <p class="card-text"><?php echo mb_substr($v['Descr'], 0, 160, 'utf8')?>...</p>
                                <a href="article.php?id=<?php echo $v['id']?>" class="btn btn-primary">Подробнее</a>
                                <?php $art_cat = false; foreach ($cat as $categories) {
                                    if ($categories['id'] == $v['categorie_id']) {
                                        $art_cat = $categories;
                                        break;
                                    }
                                }?>

                                <small>Категория: <a href="categorie.php?id=<?php echo $art_cat['id']?>" class="" style="font-size: 11px"> <?php echo $art_cat['title']?></a></small>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-lg-3 mt-3">
            <div class="list-group">
                <?php foreach ($cat as $categories) {?>
                    <a class="list-group-item list-group-item-action" href="categorie.php?id=<?php echo $categories['id']?>
" style="margin-left: 65px"><?php echo $categories['title']?></a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php require_once 'templates/footer.php'?>


