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

