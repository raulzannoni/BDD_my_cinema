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
        <br>
    <a class="text-decoration-none text-reset fw-bold" href="index.php?action=addDirector">Ajouter Directeur/Directrice </a><br>
        <br>
    <a class="text-decoration-none text-reset fw-bold" href="index.php?action=addFilm">Ajouter Film </a><br>
        <br>
    <a class="text-decoration-none text-reset fw-bold" href="index.php?action=addGenre">Ajouter Genre </a><br>
</p>

<?php
$title = "CINEMA_BDD";
$content = ob_get_clean();
require "template.php";
?>