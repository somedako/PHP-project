<?php
require_once 'templates/header.php';
$conn = connect();
$inf = infoMain($conn);
$countPage = paginationCount($conn);
$cat = getAllCategories($conn);
close($conn);
?>
<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">PORTFOLIO</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
        </div>
    </div>

    <div class="container">
    <div class="row">
    <div class="col-lg-9">
        <div class="row" style="margin-right: -70px">
            <?php foreach ($inf as $value) {?>
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
    <div class="col-lg-3">
        <div class="list-group">
            <?php foreach ($cat as $categories) {?>
            <a class="list-group-item list-group-item-action" href="categorie.php?id=<?php echo $categories['id']?>
" style="margin-left: 65px"><?php echo $categories['title']?></a>
            <?php } ?>
        </div>
    </div>
    </div>
        <nav aria-label="Page navigation example" class="mt-2">
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

