<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->include("bootstrap") ?>
    <link rel="stylesheet" href="<?= base_url('public/assets/css/main.css') ?>">
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <?= $this->include('navbar.php') ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>Welcome to admin dashboard</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <div class="list-group">
                    <a href="<?= base_url("admin/users") ?>" class="list-group-item">Users</a>
                    <a href="<?= base_url("admin/product_categories") ?>" class="list-group-item">Product categories</a>
                </div>
            </div>
            <div class="col-sm-10">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>

    <script src="<?= base_url('public/assets/js/main.js') ?>" async defer></script>
</body>

</html>