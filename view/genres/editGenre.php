<?php 

ob_start(); 

if(isset($_SESSION['message'])) 
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

$genreDetail = $db_genreDetail->fetch();

?>

<div id="Edit Genre">
    <h2>Cinema_BDD</h2>
    <p>Edit Genre</p>
</div>

<?= var_dump($genreDetail) ?> 
<div class="p-2">
    <form class="row w-50 g-3 p-6 m-3 border" action="index.php?action=editGenre&id=<?= $genreDetail['id_type_film']?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="col-md-6">
            <label for="genre" class="form-label">Genre :
                <input type="text" class="form-control" name="genre" id="genre" value="<?= $genreDetail['name_type_film']; ?>">
            </label>
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label">Description :
                <input type="text" class="form-control" name="description" id="description" value="<?= $genreDetail['description_type_film']; ?>">
            </label>
        </div>
        <div class="col-md-6">
            <label for="poster" class="form-label">Poster :
                <input type="file" class="form-control" name="poster" id="poster" value="<?= $genreDetail['poster_type_film']; ?>">
            </label>
        </div>
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Update : </button>
        </div>
    </form>
</div>


<?php
$title = "Edit Genre";
$content = ob_get_clean();
require "view/template.php";
?>