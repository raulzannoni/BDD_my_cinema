<?php 

ob_start(); 

if(isset($_SESSION['message'])) 
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

$directorDetail = $db_directorDetail->fetch();

?>

<div id="edit Director">
    <h2>Cinema_BDD</h2>
    <p>Edit Director</p>
</div>


<?= var_dump($db_directorList->fetchAll());?>

<?= var_dump($directorDetail);?>

<div class="p-2">
    <form class="row w-50 g-3 p-6 m-3 border" action="index.php?action=editDirector&id=<?= $directorDetail["id_person"]; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="col-md-6">
            <label for="first_name" class="form-label">Prenom :
                <input type="text" class="form-control" name="first_name" id="first_name" value="<?= $directorDetail["first_name_person"]; ?>">
            </label>
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Nom :
                <input type="text" class="form-control" name="name" id="name" value="<?= $directorDetail["name_person"]; ?>">
            </label>
        </div>
        <div class="col-md-6">
            <label for="birth" class="form-label">Date de naissance :
                <input type="date" class="form-control" name="birth" id="birth" value="<?= $directorDetail["birth_person"]; ?>">
            </label>
        </div>
        <div class="col-md-6">
            <label for="sexe" class="form-label">Genre :
                <select class="form-select" name="sexe" id="sexe">
                    <?php
                        switch($directorDetail["sex_person"])
                            {
                                case "Masculin":
                                    echo    "<option value='Masculin' selected>Masculin</option>
                                            <option value='Feminin'>Feminin</option>
                                            <option value='Autre'>Autre</option>";
                                    break;
                                case "Feminin":
                                    echo    "<option value='Masculin'>Masculin</option>
                                            <option value='Feminin' selected>Feminin</option>
                                            <option value='Autre'>Autre</option>";
                                    break;
                                case "Autre":
                                    echo    "<option value='Masculin'>Masculin</option>
                                            <option value='Feminin'>Feminin</option>
                                            <option value='Autre' selected>Autre</option>";
                                    break;
                            }
                    ?>
                </select>
            </label>
        </div>
        <div class="col-md-6">
            <label for="portrait" class="form-label">Portrait :
                <input type="file" class="form-control" name="portrait" id="portrait">
            </label>
        </div>
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Editer</button>
        </div>
    </form>
</div>

</div>


<?php
$title = "Edit Director";
$content = ob_get_clean();
require "view/template.php";
?>