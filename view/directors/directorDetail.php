<?php

ob_start();

$actorDetail = $db_actorDetail->fetch();

?>

<div class="m-3">
    <div class="card mb-3" style="max-width: 1024px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="public/img/placeholder.png" alt="portrait <?= $actorDetail['actor'] ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title"><?= $actorDetail['actor'] ?></h2><br>
                    <p class="card-text fw-bold lh-1">Birth Date :</p>
                        <p><?= $actorDetail['birth'] ?></p>
                    <p class="card-text fw-bold lh-1">Genre :</p>
                        <p><?= $actorDetail['sex'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <p class="fs-4">Movie played :</p> 

    <?php

    foreach ($db_filmsActor->fetchAll() as $filmsActor) {
    ?>
        <p class="lh-1">
            <a class="text-decoration-none text-reset fw-bold" href="index.php?action=filmDetail&id=<?= $filmsActor['id_film'] ?> "><?= $filmsActor['film'] ?></a><?= " (".$filmsActor['year_film'].")"?>
            <span class="fw-bold">Role : </span> <?= $filmsActor['role'] ?>
        </p>
    <?php } ?>

</div>

<?php

$content = ob_get_clean();
$title = $actorDetail['actor'];
require 'view/template.php';

?>