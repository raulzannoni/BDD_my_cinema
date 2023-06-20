<?php 

ob_start(); 

if(isset($_SESSION['message'])) 
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

$filmDetail = $db_filmDetail->fetch();

?>

<div id="edit Film">
    <h2>Cinema_BDD</h2>
    <p>edit Film <?= $filmDetail['title_film']?></p>
</div>

<div class="p-2">
    <form class="row w-50 g-3 p-6 m-3 border" action="index.php?action=filmDetail&id=<?= $filmDetail['id_film']?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="col-md-6">
            <label for="title" class="form-label">Title :
                <input type="text" class="form-control" name="title" id="title" value=<?= $filmDetail['title_film']?>>
            </label>
        </div>
        <div class="col-md-6">
            <label for="director" class="form-label">Director :
                <select name="director" id="director">
                    <?php
                        foreach($db_directorList->fetchAll() as $directors) 
                            { 
                                if($directors['director'] == $filmDetail['director'])
                                    { ?>
                                        <option value="<?= $directors['director']?>" selected><?= $directors['director']?></option>
                            <?php   }
                                else
                                    {   ?>
                                        <option value="<?= $directors['director']?>"><?= $directors['director']?></option>
                            <?php   }
                            }?>
                </select>
            </label>
            <p class="card-text fw-bold lh-1">New director ? <a class="text-decoration-none text-reset" href="index.php?action=addDirector"><i class="fa-regular fa-plus"></i></a></p>
        </div>
        <div class="col-md-6">
            <fieldset>
                <label for="genre" class="form-label">Genre(s) : </label>
                <div>
                    <?php
                        foreach($db_genreList->fetchAll() as $genres) 
                            { 
                                foreach()
                                    {?>
                                <input type="checkbox" name="<?=$genres['genre']?>" id="<?= $genres['genre']?>">  
                                <label for="<?= $genres['genre']?>"><?= $genres['genre']?></label></br>
                                <?php   }
                            }?>
                </div>
            </fieldset>
            <p class="card-text fw-bold lh-1">New genre ? <a class="text-decoration-none text-reset" href="index.php?action=addGenre"><i class="fa-regular fa-plus"></i></a></p>
        </div>
        <div class="col-md-6">
            <label for="year" class="form-label">Date de sortie :
                <select class="form-select" name="year" id="year">
                    <?php
                    for($i = 0; $i < 124; $i++)
                        {
                            if($filmDetail['year_film'] == 1900+$i)
                                {
                                    echo '<option value='.(1900+$i).' selected>'.(1900+$i).'</option>';
                                }
                            else
                                {
                                    echo '<option value='.(1900+$i).'>'.(1900+$i).'</option>';
                                }
                        }
                    ?>
                </select>
            </label>
        </div>
        <div class="col-md-6">
            <label for="duration" class="form-label">Duration film :
                <input value="<?= $filmDetail['length_film']?>" type="time" class="form-control" name="duration" id="duration">
            </label>
        </div>
        <div class="col-md-6">
            <label for="rating" class="form-label">Rating :
                <select class="form-select" name="rating" id="rating">
                    <?php
                    for($i = 1; $i < 6; $i++)
                        {
                            if($i == $filmDetail['star_film'])
                                { ?>
                                    <option value="<?=$i?>" selected><?=$i?></option>
                        <?php   }
                            else
                                { ?>
                                    <option value="<?=$i?>"><?=$i?></option>
                        <?php   }
                        } ?>
                </select>
            </label>
        </div>
        <div class="col-md-6">
            <label for="plot" class="form-label">Plot :
                <input type="text" value="<?=$filmDetail['plot_film']?>" class="form-control" name="plot" id="plot">
            </label>
        </div>
        <div class="col-md-6">
            <label for="poster" class="form-label">Poster :
                <input type="file" class="form-control" name="poster" id="poster">
            </label>
        </div>
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Modifier</button>
        </div>
    </form>
</div>

</div>


<?php
$title = "Edit Film ".$filmDetail['title_film'];
$content = ob_get_clean();
require "view/template.php";
?>