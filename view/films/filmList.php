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

    <div class="row">
        <?php

            foreach ($db_filmList->fetchAll() as $film) 
                { ?>
                <div class="col-lg-2">
                    <a class="text-decoration-none text-reset" href="index.php?action=filmDetail&id=<?=$film['id_film']?>">
                        <img src="public/img/placeholder.png" alt="poster <?= $film['title_film'] ?>" class="img-thumbnail">
                        <h5 class="text-center fw-semibold"><?= $film['title_film'] ?> (<?= $film['year_film']  ?>)</h5>
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
                    </a>
                </div>
        <?php   } ?>
    </div>

<?php
$title = "Films List";
$content = ob_get_clean();
require 'view/template.php';
?>

