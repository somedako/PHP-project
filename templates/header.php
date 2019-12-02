<?php
session_start();
require_once 'core/config.php';
require_once 'core/function.php';
$conn = connect();
$nav = menu($conn);
$data = logOut($conn);
if ($_POST['login']) {
    foreach ($data as $info) {
        if ($_POST['login'] == $info['login'] && $_POST['password'] == $info['password']) {
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
            header('Location: admin.php');
            if (!$_SESSION['login'] || !$_SESSION['password']) {
                header('Location: index.php');
                die;
            }
        }
    }
}
close($conn);
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
                            <input type="text" class="form-control mr-1" name="login" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                            <input type="submit" class="btn badge-primary ml-1" value="Войти">
                        </div>
                    </form>
                </nav>
            </nav>
        </header>
