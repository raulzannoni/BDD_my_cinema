<?php

namespace Controller;
session_start();
use Model\Connect;

require "model/Connect.php";

class CinemaController  
    {
        /*--- HOME ---*/
        public function home()
            {
                $pdo = Connect::dbConnect();
                require "view/home.php";
            }
        /*--- FILMS ---*/
        public function filmList()
            {
                $pdo = Connect::dbConnect();
                $sql =  "SELECT id_film, title_film, YEAR(year_film) as year_film
                        FROM film";
                $db = $pdo->query($sql);
                require "view/films/filmList.php";
            }
        public function filmDetail($id)
            {
                $pdo = Connect::dbConnect();
            }
        public function addFilm($id)
            {
                $pdo = Connect::dbConnect();
            }
        public function modifyFilm($id)
            {
                $pdo = Connect::dbConnect();
            }
        public function deleteFilm($id)
            {
                $pdo = Connect::dbConnect();
            }
        /*--- ACTORS ---*/
        public function actorList()
            {
                $pdo = Connect::dbConnect();
                $sql =  "SELECT * FROM person p, actor a
                        WHERE p.id_person = a.id_person";
                $db = $pdo->query($sql);
                require "view/actors/actorList.php";
            }
        public function actorDetail()
            {
                $pdo = Connect::dbConnect();
            }
        public function addActor()
            {
                $pdo = Connect::dbConnect();
            }
        public function modifyActor()
            {
                $pdo = Connect::dbConnect();
            }
        public function deleteActor()
            {
                $pdo = Connect::dbConnect();
            }
        /*--- DIRECTORS ---*/
        public function directorList()
            {
                $pdo = Connect::dbConnect();
                $sql =  "SELECT * FROM person p, director d
                        WHERE p.id_person = d.id_person";
                $db = $pdo->query($sql);
                require "view/directors/directorList.php";
            }
        public function directorDetail()
            {
                $pdo = Connect::dbConnect();
            }
        public function addDirector()
            {
                $pdo = Connect::dbConnect();
            }
        public function modifyDirector()
            {
                $pdo = Connect::dbConnect();
            }
        public function deleteDirector()
            {
                $pdo = Connect::dbConnect();
            }
        /*--- GENRES ---*/
        public function genreList()
            {
                $pdo = Connect::dbConnect();
                $sql = "SELECT tp.id_type_film, tp.name_type_film, COUNT(f.title_film) AS count
                        FROM type_film tp, film f, talk t
                        WHERE t.id_type_film = tp.id_type_film AND t.id_film = f.id_film
                        GROUP BY tp.id_type_film, tp.name_type_film
                        ORDER BY COUNT(f.title_film) DESC";
                $db = $pdo->query($sql);
                require "view/type_films/genreList.php";
            }
        public function genreDetail()
            {
                $pdo = Connect::dbConnect();
            }
        public function addGenre()
            {
                $pdo = Connect::dbConnect();
            }
        public function modifyGenre()
            {
                $pdo = Connect::dbConnect();
            }
        public function deleteGenre()
            {
                $pdo = Connect::dbConnect();
            }
        /*--- ROLES ---*/
        public function addRole()
            {
                $pdo = Connect::dbConnect();
            }
        public function modifyRole()
            {
                $pdo = Connect::dbConnect();
            }
        public function deleteRole()
            {
                $pdo = Connect::dbConnect();
            }
        


    }



?>