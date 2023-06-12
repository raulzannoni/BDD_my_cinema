<?php

ob_start();

$directorDetail = $db_directorDetail->fetch();

?>

<div class="m-3">
    <div class="card mb-3" style="max-width: 1024px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="public/img/placeholder.png" alt="portrait <?= $directorDetail['director'] ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title"><?= $directorDetail['director'] ?></h2><br>
                    <p class="card-text fw-bold lh-1">Birth Date :</p>
                        <p><?= $directorDetail['birth'] ?></p>
                    <p class="card-text fw-bold lh-1">Genre :</p>
                        <p><?= $directorDetail['sex'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <p class="fs-4">Movie(s) directed :</p> 

    <?php

    foreach ($db_filmsDirector->fetchAll() as $filmsDirector) {
    ?>
        <p class="lh-1">
            <a class="text-decoration-none text-reset fw-bold" href="index.php?action=filmDetail&id=<?= $filmsDirector['id_film'] ?> "><?= $filmsDirector['film'] ?></a><?= " (".$filmsDirector['year_film'].")"?>
        </p>
    <?php } ?>

</div>

<?php

$content = ob_get_clean();
$title = $directorDetail['director'];
require 'view/template.php';

?>