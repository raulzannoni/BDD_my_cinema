<?php 

ob_start(); 

if(isset($_SESSION['message'])) 
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

?>

<div id="add Genre">
    <h2>Cinema_BDD</h2>
    <p>New Genre</p>
</div>

<div class="p-2">
    <form class="row w-50 g-3 p-6 m-3 border" action="index.php?action=addGenre" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="col-md-6">
            <label for="genre" class="form-label">Genre :
                <input type="text" class="form-control" name="firstname" id="firstname" value="required">
            </label>
        </div>
        <div class="col-md-6">
            <label for="description" class="form-label">Description :
                <input type="text" class="form-control" name="lastname" id="lastname">
            </label>
        </div>
        <div class="col-md-6">
            <label for="poster" class="form-label">Poster :
                <input type="file" class="form-control" name="portrait" id="portrait">
            </label>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</div>


<?php
$title = "new Genre";
$content = ob_get_clean();
require "view/template.php";
?>