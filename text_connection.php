<?php

$dsn = "mysql:host=localhost;dbname=script_cinema_rz";
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

$sql = "SELECT * FROM film
        ORDER BY title_film";

$d = $db->query($sql);

foreach($d as $data)
    {
        echo $data['title_film']."<br>";
    }


?>
