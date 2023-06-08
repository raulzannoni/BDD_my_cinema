<?php

ob_start();

if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

?>

<div>
    <?php
        foreach($sql->fetchAll() as $film)
            {   ?>
                <div class="col-lg-2">
                    <a class="text-decoration-none text-reset" href="index.php?action=movie_detail&id=<?= $movie['id_movie'] ?>">
                        <img src="public/img/posters/<?= $movie['poster'] ?>" alt="poster <?= $movie['title'] ?>" style="width: 200px; height: 300px; object-fit: cover;">
                        <h5 class="text-center fw-semibold"><?= $movie['title'] ?> (<?= $movie['release_date'] ?>)</h5>
                    </a>
                </div>
    <?php   }   ?>
</div>

<?php

$content = ob_get_clean();
$title = "Films";
require 'view/template.php';

?>

