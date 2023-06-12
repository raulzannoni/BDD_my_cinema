<?php

ob_start();

if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

?>

<div id="directorList">
    <h2>Cinema_BDD</h2>
    <p>Directors List</p>
</div>

<div class="row m-3">
    <?php

        foreach ($db_directorList->fetchAll() as $director) 
            { ?>
            <div class="col-lg-2">
                <a class="text-decoration-none text-reset" href="index.php?action=directorDetail&id=<?= $director['id_director'] ?>">
                    <img src="public/img/placeholder.png" alt="portrait <?= $director['first_name_person']." ".$director['name_person'] ?>" style="width: 200px; height: 300px; object-fit: cover;">
                    <h5 class="text-center fw-semibold"><?= $director['first_name_person']." ".$director['name_person'] ?></h5>
                </a>
            </div>
    <?php   } ?>
</div>

<?php
$title = "Directors List";
$content = ob_get_clean();
require 'view/template.php';
?>

