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
                    <p class="card-text fw-bold lh-1">Edit : <a class="text-decoration-none text-reset" href="index.php?action=editDirector&id=<?= $directorDetail['id_person'] ?>"><i class="fa-regular fa-pen-to-square"></i></a></p>
                    <p class="card-text fw-bold lh-1">Delete : <a class="text-decoration-none text-reset" href="index.php?action=deleteDirector&id=<?= $directorDetail['id_person'] ?>"><i class="fa-regular fa-trash-can"></i></a></p>
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
            <?php
                $stars_yellow = array_fill(0, $filmsDirector['star'], 'yellow_star');
                $stars_black = array_fill($filmsDirector['star'], 5 - $filmsDirector['star'], 'black_star');
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
        </p>
    <?php } ?>

</div>

<?php

$content = ob_get_clean();
$title = $directorDetail['director'];
require 'view/template.php';

?>