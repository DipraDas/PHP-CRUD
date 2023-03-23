<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dipCrud/config.php');

use Seip\Banners;

$_banners = new Banners();
$banner = $_banners->edit();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <h1 class="text-center mb-4">Edit</h1>
                    <form action="update.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label for="inputTitle" class="col-sm-2 col-form-label">
                                <h5>Id:</h5>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputTitle" name="id" value="<?= $banner['id']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputTitle" class="col-sm-2 col-form-label">
                                <h5>Title:</h5>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputTitle" name="title" value="<?= $banner['title']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputlink" class="col-sm-2 col-form-label">
                                <h5>link:</h5>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputlink" name="link" value="<?= $banner['link']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="form-check-label col-sm-3" for="inputIsActive">
                                Is Active
                            </label>
                            <div class="col-sm-9">
                                <input class="form-check-input" type="checkbox" value="1" id="inputIsActive" <?= $banner['is_active'] ? 'checked' : '' ?> name="is_active">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="picture" class="col-sm-2 col-form-label">
                                <h5>Picture:</h5>
                            </label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="picture" name="picture" value="<?= $banner['picture']; ?>">
                                <img class="img-fluid" src="<?= $root ?>uploads/<?= $banner['picture'] ?>" alt="">
                                <input type="hidden" name="old_picture" value="<?= $banner['picture'] ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>