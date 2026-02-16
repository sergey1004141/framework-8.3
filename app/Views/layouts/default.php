<?php
/**
 * @var $title string //Заголовок страницы
 * @var $this \Framework\View
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= APP_NAME ?> - <?= $title ?></title>
    <link rel="icon" href="<?= base_url('/favicon.png') ?>">
    <link rel="stylesheet" href="<?= base_url('/assets/bootstrap/css/bootstrap.min.css') ?>">
    <?php $this->renderCSS(); ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/register">Регистрация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/login">Авторизоваться</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?= $this->content ?>
<script src="<?= base_url('/assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<?php $this->renderJS(); ?>
</body>
</html>
