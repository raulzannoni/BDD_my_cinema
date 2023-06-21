<?php 

ob_start(); 

if(isset($_SESSION['message'])) 
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

?>

<div id="add Film">
    <h2>Cinema_BDD</h2>
    <p>New Film</p>
</div>

<div class="p-2">
    <form class="row w-50 g-3 p-6 m-3 border" action="index.php?action=addFilm" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="col-md-6">
            <label for="title" class="form-label">Title :
                <input type="text" class="form-control" name="title" id="title" value="required">
            </label>
        </div>
        <div class="col-md-6">
            <label for="director" class="form-label">Director :
                <select name="director" id="director">
                    <option value="">-- Choose Director --</option>
                    <?php
                        foreach($db_directorList->fetchAll() as $directors) 
                            { ?>
                                <option value="<?= $directors['director']?>"><?= $directors['director']?></option>
                    <?php   }?>
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
                            { ?>
                                <input type="checkbox" name="<?=$genres['genre']?>" id="<?= $genres['genre']?>">  
                                <label for="<?= $genres['genre']?>"><?= $genres['genre']?></label></br>
                    <?php   }?>
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
                            echo '<option value='.(1900+$i).'>'.(1900+$i).'</option>';
                        }
                    ?>
                </select>
            </label>
        </div>
        <div class="col-md-6">
            <label for="duration" class="form-label">Duration film :
                <input value="00:00:00" type="time" class="form-control" name="duration" id="duration">
            </label>
        </div>
        <div class="col-md-6">
            <label for="rating" class="form-label">Rating :
                <select class="form-select" name="rating" id="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </label>
        </div>
        <div class="col-md-6">
            <label for="plot" class="form-label">Plot :
                <input type="text" class="form-control" name="plot" id="plot">
            </label>
        </div>
        <div class="col-md-6">
            <label for="poster" class="form-label">Poster :
                <input type="file" class="form-control" name="poster" id="poster">
            </label>
        </div>
        <div class="col-md-6">
            <label for="Casting" class="form-label">Casting :
                <button id='addCasting' type='submit' formaction="index.php?action=addCasting"><i class='fa-regular fa-plus'></i></button>
            </label>
        </div>
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
        </div>
        
    </form>
</div>

</div>


<?php
$title = "new Film";
$content = ob_get_clean();
require "view/template.php";
?>