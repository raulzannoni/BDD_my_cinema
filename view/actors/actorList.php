<?php

ob_start();

if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

?>

<div id="actorList">
    <h2>Cinema_BDD</h2>
    <p>Actor List</p>
</div>

<div class="row m-3">
    <?php

        foreach ($db_actorList->fetchAll() as $actor) 
            { ?>
            <div class="col-lg-2">
                <a class="text-decoration-none text-reset" href="index.php?action=actorDetail&id=<?= $actor['id_actor'] ?>">
                    <img src="public/img/placeholder.png" alt="portrait <?= $actor['first_name_person']." ".$actor['name_person'] ?>" style="width: 200px; height: 300px; object-fit: cover;">
                    <h5 class="text-center fw-semibold"><?= $actor['first_name_person']." ".$actor['name_person'] ?></h5>
                </a>
            </div>
    <?php   } ?>
</div>

<?php
$title = "Actors List";
$content = ob_get_clean();
require 'view/template.php';
?>

