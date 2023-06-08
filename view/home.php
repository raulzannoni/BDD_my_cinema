<?php 

ob_start(); 

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

?>

<div id="Home">
    <h2>Cinema_BDD</h2>
    <p>Welcome to the Home page!</p>

</div>
<?php
$title = "CINEMA_BDD";
$content = ob_get_clean();
require "template.php";
