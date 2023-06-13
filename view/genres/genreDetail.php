<?php

ob_start();

$genreDetail = $db_genreDetail->fetch();

?>

<div id="genreDetail">
    <h2>Cinema_BDD</h2>
    <p><?= $genreDetail['genre'] ?> films</p>
</div>

<div class="row">
    <?php

        foreach ($db_filmsGenre->fetchAll() as $film) 
            { ?>
                <div class="col-lg-2">
                    <a class="text-decoration-none text-reset fs-3" href="index.php?action=filmDetail&id=<?= $film['id_film'] ?>">
                        <figure>
                            <img src="public\img\placeholder.png" alt="poster <?= $film['film']?>" class="img-thumbnail">
                            <figcaption class="text-center fw-semibold">
                                <?= $film['film']?> (<?= $film['year_film']?>)
                            </figcaption>
                            <div class="mt-0 d-flex  justify-content-between align-items-center">
                                <div class="small-ratings">
                                    <?php
                                        $stars_yellow = array_fill(0, $film['star'], 'yellow_star');
                                        $stars_black = array_fill($film['star'], 5 - $film['star'], 'black_star');
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
                        </figure>
                    </a>
                </div>
    <?php   } ?>
</div>

<?php
$title = $genreDetail['genre'];
$content = ob_get_clean();
require 'view/template.php';
?>

