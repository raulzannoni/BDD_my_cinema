<?php

ob_start();

if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

?>

<div id="genreList">
    <h2>Cinema_BDD</h2>
    <p>Genre List</p>
</div>

<div class="row m-3">
    <?php

        foreach ($db->fetchAll() as $genre) 
            { ?>
                <ul>
                    <li class="list-inline-item">
                        <a class="text-decoration-none text-reset fs-3" href="index.php?action=genre_detail&id=<?= $genre['id_type_film'] ?>">
                            <?= $genre['name_type_film'] ?>
                        </a>
                        (<?= $genre['count'] ?>)
                    </li>
                </ul>
    <?php   } ?>
</div>

<?php
$title = "Genres List";
$content = ob_get_clean();
require 'view/template.php';
?>

