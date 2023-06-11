<?php

ob_start();

$filmDetail = $db_filmDetail->fetch();

?>

<div class="m-3">
    <div class="card mb-3" style="max-width: 1024px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="public/img/placeholder.png" alt="poster <?= $filmDetail['title_film'] ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title"><?= $filmDetail['title_film'] ?> (<?= $filmDetail['year_film'] ?>)</h2><br>
                    <p class="card-text fw-bold lh-1">Genre(s) :</p>
                        <p><?= $filmDetail['genres'] ?></p>
                    <p class="card-text fw-bold lh-1">Duration :</p>
                        <p><?= $filmDetail['length_film'] ?></p>
                    <p class="card-text fw-bold lh-1">Director :</p>
                        <p><a class="text-decoration-none text-reset" href="index.php?action=directorDetail&id=<?= $filmDetail['id_director'] ?>"><?= $filmDetail['director'] ?></a></p>
                    <p class="card-text">
                        <a class="text-decoration-none" href="">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <p class="fs-4">Casting :</p>
    <?php

    foreach ($db_castingDetail->fetchAll() as $casting) {
    ?>
        <ul>
            <a class="text-decoration-none text-reset" href="index.php?action=actorDetail&id=<?= $casting['id_actor'] ?>">
                <li><span class="fw-bold"><?= $casting['actor'] . "</span> (" . $casting['role'] . ") " ?></li>
            </a>
        </ul>
    <?php } ?>

</div>

<?php

$content = ob_get_clean();
$title = $filmDetail['title_film'];
require 'view/template.php';

?>