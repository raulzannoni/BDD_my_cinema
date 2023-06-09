<?php

namespace Controller;
session_start();
use Model\Connect;

require "model/Connect.php";

class CinemaController  
    {
        public function Home()
            {
                $pdo = Connect::dbConnect();
                require "view/home.php";
            }
        public function Films()
            {
                $pdo = Connect::dbConnect();
                $sql =  "SELECT id_film, title_film, YEAR(year_film) as year_film
                        FROM film";

                $d = $pdo->query($sql);
                require "view/films/Films.php";
                foreach($d as $data)
                    {
                        echo $data['id_film']." ".$data['title_film']." ".$data['year_film']."<br>";
                    }
            }
    }



?>