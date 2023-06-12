<?php

session_start();

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

require "controller/CinemaController.php";

$ctrlCinema = new CinemaController();

$id = (isset($_GET['id'])) ? $_GET['id'] : null;

if(isset($_GET["action"]))
    {
        /*
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_film = filter_input(INPUT_GET, "id_film", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_role = filter_input(INPUT_GET, "id_role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_type_film = filter_input(INPUT_GET, "id_type_film", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_actor = filter_input(INPUT_GET, "id_actor", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
        $id_director = filter_input(INPUT_GET, "id_director", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        */

        switch($_GET["action"])
            {
                case "home" : $ctrlCinema->home(); break;

                /*---- FILMS ----*/
                case "filmList" : $ctrlCinema->filmList(); break;
                case "filmDetail" : $ctrlCinema->filmDetail($id); break;
                case "addFilm" : $ctrlCinema->addFilm($id); break;
                case "deleteFilm" : $ctrlCinema->deleteFilm($id); break;

                /*---- ACTORS ----*/
                case "actorList" : $ctrlCinema->actorList(); break;
                case "actorDetail" : $ctrlCinema->actorDetail($id); break;
                case "addActor" : $ctrlCinema->addActor($id); break;
                case "deleteActor" : $ctrlCinema->deleteActor($id); break;

                /*---- DIRECTORS ----*/
                case "directorList" : $ctrlCinema->directorList(); break;
                case "directorDetail" : $ctrlCinema->directorDetail($id); break;
                case "addDirector" : $ctrlCinema->addDirector($id); break;
                case "deleteDirector" : $ctrlCinema->deleteDirector($id); break;

                /*---- TYPE FILMS ----*/
                case "genreList" : $ctrlCinema->genreList(); break;

            }
        
    }
else
    {
        $ctrlCinema->Home();
    }
    