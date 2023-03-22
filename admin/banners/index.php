<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/dipCrud/config.php');
use Seip\Banners;
$_banners = new Banners();
$banners = $_banners->index();
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
                <div class="col-sm-8">
                    <h1 class="text-center mb-4">Lists</h1>
                    <ul class="nav justify-content-center fw-bold fs-4">
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="create.php">Add an item</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-secondary" href="trash_index.php">Trash item</a>
                        </li>
                    </ul>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">link</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($banners) > 0) :
                                foreach ($banners as $banner) :
                            ?>

                                    <tr>
                                        <td><?= $banner['title']; ?></td>
                                        <td><?= $banner['link']; ?></td>
                                        <td><?= $banner['is_active'] ? "Active" : "Inactive"; ?></td>
                                        <td>
                                            <a href="show.php?id=<?= $banner['id']; ?>">Show</a> | <a href="edit.php?id=<?= $banner['id']; ?>">Edit</a> | <a href="trash.php?id=<?= $banner['id']; ?>">Trash</a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                            else :
                                ?>
                                <tr>
                                    <td colspan="2">No banner is avaiable. <a href="create.php">Click here to add one.</a> </td>
                                </tr>
                            <?php
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>