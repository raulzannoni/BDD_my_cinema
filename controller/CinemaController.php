<?php

namespace Controller;
session_start();
use Model\Connect;

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
                $sql =  "SELECT id_film, title_film, YEAR(year_film)
                        FROM film";

                $data = $pdo->query($sql);
                    
                require "view/films/Films.php";
            }
    }



?>