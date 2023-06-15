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
                    <p class="card-text fw-bold lh-1">Edit : <a class="text-decoration-none text-reset" href="index.php?action=editActor&id=<?= $actorDetail['id_person'] ?>"><i class="fa-regular fa-pen-to-square"></i></a></p>
                    <p class="card-text fw-bold lh-1">Delete : <a class="text-decoration-none text-reset" href="index.php?action=deleteActor&id=<?= $actorDetail['id_person'] ?>"><i class="fa-regular fa-trash-can"></i></a></p>
                </div>
            </div>
        </div>
    </div>

    <p class="fs-4">Movie(s) played :</p> 

    <?php

    foreach ($db_filmsActor->fetchAll() as $filmsActor) {
    ?>
        <p class="lh-1">
            <a class="text-decoration-none text-reset fw-bold" href="index.php?action=filmDetail&id=<?= $filmsActor['id_film'] ?> "><?= $filmsActor['film'] ?></a><?= " (".$filmsActor['year_film'].")"?>
            <?php
                $stars_yellow = array_fill(0, $filmsActor['star'], 'yellow_star');
                $stars_black = array_fill($filmsActor['star'], 5 - $filmsActor['star'], 'black_star');
                $stars = array_merge($stars_yellow, $stars_black);
                foreach($stars as $key => $value) 
                    {
                        if($value == 'yellow_star')
                            { ?>
                                <i class="fa fa-star rating-color" style="color: #fbc634"></i>
                    <?php   }
                        else
                            {   ?>
                                <i class="fa fa-star "></i>
                    <?php   }
                            }?>
            <span class="fw-bold">Role : </span> <?= $filmsActor['role'] ?>
        </p>
    <?php } ?>

</div>

<?php

$content = ob_get_clean();
$title = $actorDetail['actor'];
require 'view/template.php';

?>