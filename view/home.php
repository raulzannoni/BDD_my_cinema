<?php 

ob_start(); 

if(isset($_SESSION['message'])) 
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

?>

<div id="Home">
    <h2>Cinema_BDD</h2>
    <p>Welcome to the Home page!</p>
</div>

<p class="lh-1">
    <a class="text-decoration-none text-reset fw-bold" href="index.php?action=addActor">Ajouter Acteur/Actrice </a><br>
    <a class="text-decoration-none text-reset fw-bold" href="index.php?action=deleteActor">Supprimer Acteur/Actrice </a><br>
    <a class="text-decoration-none text-reset fw-bold" href="index.php?action=editActor">Changer Acteur/Actrice </a><br>
        <a></a><br>
    <a class="text-decoration-none text-reset fw-bold" href="index.php?action=addDirector">Ajouter Directeur/Directrice </a><br>
    <a class="text-decoration-none text-reset fw-bold" href="index.php?action=deleteDirector">Supprimer Directeur/Directrice </a><br>
    <a class="text-decoration-none text-reset fw-bold" href="index.php?action=editDirector">Changer Directeur/Directrice </a><br>
        <a></a><br>
    <a class="text-decoration-none text-reset fw-bold" href="index.php?action=addFilm">Ajouter Film </a><br>
    <a class="text-decoration-none text-reset fw-bold" href="index.php?action=deleteFilm">Supprimer Film </a><br>
    <a class="text-decoration-none text-reset fw-bold" href="index.php?action=editFilm">Changer Film </a><br>
        <a></a><br>
    <a class="text-decoration-none text-reset fw-bold" href="index.php?action=addGenre">Ajouter Genre </a><br>
    <a class="text-decoration-none text-reset fw-bold" href="index.php?action=deleteGenre">Supprimer Genre </a><br>
    <a class="text-decoration-none text-reset fw-bold" href="index.php?action=editGenre">Changer Genre </a><br>
</p>

<?php
$title = "CINEMA_BDD";
$content = ob_get_clean();
require "template.php";
?>