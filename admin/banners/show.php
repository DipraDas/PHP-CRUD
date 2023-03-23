<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dipCrud/config.php');
use Seip\Banners;
$_banners = new Banners();
$banner = $_banners->show();
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=deviceo-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <h1 class="text-center mb-4">Show</h1>
                    <dl class="row">
                        <dt class="col-sm-3">ID:</dt>
                        <dd class="col-sm-9"><?= $banner['id'] ?></dd>
                        <dt class="col-sm-3">Title:</dt>
                        <dd class="col-sm-9"><?= $banner['title'] ?></dd>
                        <dt class="col-sm-3">link:</dt>
                        <dd class="col-sm-9"><?= $banner['link'] ?></dd>
                        <dt class="col-sm-3">created_at:</dt>
                        <dd class="col-sm-9"><?= $banner['created_at'] ?></dd>
                        <dt class="col-sm-3">modified_at:</dt>
                        <dd class="col-sm-9"><?= $banner['modified_at'] ?></dd>
                        <dt class="col-sm-3">Is active:</dt>
                        <dd class="col-sm-9">
                            <?= $banner['is_active'] ? "Active" : "Inactive"; ?>
                        </dd>
                        <dt class="col-sm-3">Picture:</dt>
                        <dd class="col-sm-9"><img class="img-fluid" src="<?= $root ?>uploads/<?= $banner['picture'] ?>" alt=""></dd>
                    </dl>
                </div>
            </div>
        </div>
    </section>