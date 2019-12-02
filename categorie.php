<?php
require_once 'templates/header.php';
$conn = connect();
$inf = infoMain($conn);
$countPage = paginationCount($conn);
$cat = getAllCategories($conn);
$art = getArticles($conn);
close($conn);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-9 mt-3">
            <div class="row" style="margin-right: -70px">
                <?php foreach ($art as $value) {?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card" style="width: 18rem;">
                            <img src="img/<?php echo $value['img']?>" class="card-img-top" alt="<?php echo $value['img']?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $value['title']?></h5>
                                <p class="card-text"><?php echo mb_substr($value['Descr'], 0, 160, 'utf8')?>...</p>
                                <a href="article.php?id=<?php echo $value['id']?>" class="btn btn-primary">Подробнее</a>
                                <?php $art_cat = false; foreach ($cat as $categories) {
                                    if ($categories['id'] == $value['categorie_id']) {
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
                    <a class="list-group-item list-group-item-action" href="/
" style="margin-left: 65px">Назад</a>

            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for ($i=0; $i < $countPage; $i++) {$j = $i+1?>
                <li class="page-item"><a class="page-link" href="index.php?page=<?=$i?>"><?php echo $j?></a></li>
            <? } ?>
            <a class="page-link" href="" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>

        </ul>
    </nav>
</div>
<?php require_once 'templates/footer.php'?>

