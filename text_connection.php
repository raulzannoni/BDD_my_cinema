<?php

$dsn = "mysql:host=localhost:3306;dbname=script_cinema_rz";
$username = "root";
$password = "";

try{
    $db = new PDO($dsn, $username, $password);
    echo "Connection!!!<br>";
}
catch(PDOException $e){
    $error = $e->getMessage();
    echo $error;
    exit();
}

$sql = "INSERT INTO type_film (name_type_film)
        VALUES (?)";

$d = $db->prepare($sql);
$d->execute(["Comique"]);



?>
