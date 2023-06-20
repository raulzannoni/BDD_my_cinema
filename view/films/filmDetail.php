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
                        <?php
                            foreach ($db_genresFilm->fetchAll() as $genre) { ?>
                                <a class="text-decoration-none text-reset" href="index.php?action=genreDetail&id=<?= $genre['id_type_film'] ?>"><?= $genre['genre'] ?></a>
                    <?php } ?>
                    <p></p>
                    <p class="card-text fw-bold lh-1">Duration :</p>
                        <p><?= $filmDetail['length_film'] ?></p>
                    <p class="card-text fw-bold lh-1">Director :</p>
                        <p><a class="text-decoration-none text-reset" href="index.php?action=directorDetail&id=<?= $filmDetail['id_person'] ?>"><?= $filmDetail['director'] ?></a></p>
                    <p class="card-text fw-bold lh-1">Rating :</p>
                        <div class="mt-0 d-flex  justify-content-between align-items-center">
                            <div class="small-ratings">
                                <?php
                                    $stars_yellow = array_fill(0, $filmDetail['star'], 'yellow_star');
                                    $stars_black = array_fill($filmDetail['star'], 5 - $filmDetail['star'], 'black_star');
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
                            </div>
                        </div>
                    <p class="card-text fw-bold lh-1" style="margin-top: 16px">Synopsis :</p>
                        <p><?= $filmDetail['plot']?></p>
                    <p class="card-text fw-bold lh-1">Edit : <a class="text-decoration-none text-reset" href="index.php?action=editFilm&id=<?= $filmDetail['id_film'] ?>"><i class="fa-regular fa-pen-to-square"></i></a></p>
                    <p class="card-text fw-bold lh-1">Delete : <a class="text-decoration-none text-reset" href="index.php?action=deleteFilm&id=<?= $filmDetail['id_film'] ?>"><i class="fa-regular fa-trash-can"></i></a></p>
                </div>
            </div>
        </div>
    </div>
    <p class="fs-4">Casting :</p>
    <div class="row m-3">
        <?php
            foreach ($db_castingDetail->fetchAll() as $casting) 
                { ?>
                <div class="col-lg-2">
                    <a class="text-decoration-none text-reset" href="index.php?action=actorDetail&id=<?=$casting['id_person']?>">
                        <img src="public/img/placeholder.png" alt="poster <?= $casting['actor'] ?>" class="img-thumbnail">
                        <h5 class="text-center fw-semibold"><?= $casting['actor'] ?> (<?= $casting['role']  ?>)</h5>
                    </a>
                </div>
        <?php   } ?>
    </div>
</div>

<?php

$content = ob_get_clean();
$title = $filmDetail['title_film'];
require 'view/template.php';

?>