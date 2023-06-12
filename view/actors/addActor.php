<?php 

ob_start(); 

if(isset($_SESSION['message'])) 
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

?>

<div id="add Actor">
    <h2>Cinema_BDD</h2>
    <p>New Actor</p>
</div>

<div class="p-2">
    <form class="row w-50 g-3 p-6 m-3 border" action="index.php?action=addActor" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="col-md-6">
            <label for="firstname" class="form-label">Prenom :
                <input type="text" class="form-control" name="firstname" id="firstname" value="required">
            </label>
        </div>
        <div class="col-md-6">
            <label for="lastname" class="form-label">Nom :
                <input type="text" class="form-control" name="lastname" id="lastname" value="required">
            </label>
        </div>
        <div class="col-md-6">
            <label for="birthday" class="form-label">Date de naissance :
                <input type="date" class="form-control" name="birthday" id="birthday" value="required">
            </label>
        </div>
        <div class="col-md-6">
            <label for="gender" class="form-label">Genre :
                <select class="form-select" name="gender" id="gender">
                    <option value="Genre" selected disabled>Genre</option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                    <option value="Autre">Autre</option>
                </select>
            </label>
        </div>
        <div class="col-md-6">
            <label for="portrait" class="form-label">Portrait :
                <input type="file" class="form-control" name="portrait" id="portrait">
            </label>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
</div>

</div>


<?php
$title = "new Actor";
$content = ob_get_clean();
require "view/template.php";
?>