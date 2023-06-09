<?php

use Model\Connect;

require "model/Connect.php";
/*
abstract class Connect 
    {
        const HOST = "localhost";
        const DB = "script_cinema_rz";
        const USER = "root";
        const PASS = "";

        public static function dbConnect()
            {
                try
                    {
                        $dsn = "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8";
                        $username = self::USER;
                        $password = self::PASS;
                        return new \PDO($dsn, $username, $password);
                    }
                catch(\PDOException $e)
                    {
                        return $e->getMessage();
                    }
            }
    }
*/
$sql = "SELECT * FROM film
        ORDER BY title_film";
$sql2 =  "SELECT id_film, title_film, YEAR(year_film) as year
FROM film
ORDER BY title_film";

$pdo = Connect::dbConnect();

$d = $pdo->query($sql2);

foreach($d as $data)
    {
        echo $data['id_film']." ".$data['title_film']." ".$data['year_film']."<br>";
    }


?>
