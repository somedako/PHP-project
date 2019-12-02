<?php
session_start();
$flash ='';
if(isset($_COOKIE['bd_create_success']) && $_COOKIE['bd_create_success'] != '') {
        if ($_COOKIE['bd_create_success'] == 1) {
        setcookie('bd_create_success', 1, time()-10);
        $flash ='New record created successfully';
    }
}
require_once 'core/config.php';
require_once 'core/function.php';
$conn = connect();
$nav = menu($conn);
if ($_POST['unlogin']) {
    session_destroy();
    header('Location: index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">

    <title><?php echo $config['title']?></title>
</head>
<body>
<div class="wrap">
    <div class="content">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="/"><?php echo $config['title']?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/"><span class="sr-only">Главная</span></a>
                        </li>
                        <?php foreach ($nav as $value) {?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $value['pages']?>"><?php echo $value['title']?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

                <nav class="navbar navbar-dark bg-dark">
                    <form class="form-inline" method="post">
                        <div class="input-group">
                            <input type="submit" name="unlogin" class="btn badge-primary ml-1" value="Выйти">
                        </div>
                    </form>
                </nav>
            </nav>
        </header>

