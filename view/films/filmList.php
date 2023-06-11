<?php

ob_start();

if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

?>

<div id="filmList">
    <h2>Cinema_BDD</h2>
    <p>Film List</p>
</div>

<div class="row m-3">
    <?php

        foreach ($db_filmList->fetchAll() as $film) 
            { ?>
            <div class="col-lg-2">
                <a class="text-decoration-none text-reset" href="index.php?action=filmDetail&id=<?=$film['id_film']?>">
                    <img src="public/img/placeholder.png" alt="poster <?= $film['title_film'] ?>" style="width: 200px; height: 300px; object-fit: cover;">
                    <h5 class="text-center fw-semibold"><?= $film['title_film'] ?> (<?= $film['year_film']  ?>)</h5>
                </a>
            </div>
    <?php   } ?>
</div>

<?php
$title = "Films List";
$content = ob_get_clean();
require 'view/template.php';
?>

