<?php

session_start();

use Controller\CinemaController;
use Controller\GenreController;


// spl_autoload_register(function ($class_name) {
//     //var_dump($class_name);
//     include 'controller/'.$class_name .'.php';
// });

require_once "controller/CinemaController.php";
require_once "controller/GenreController.php";

$ctrlCinema = new CinemaController();
$ctrlGenre = new GenreController();


$id = (isset($_GET['id'])) ? $_GET['id'] : null;

if(isset($_GET["action"]))
    {
        
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        switch($_GET["action"])
            {
                /*----------------*/
                /*----- HOME -----*/
                /*----------------*/
                case "home" : $ctrlCinema->home(); break;

                /*-----------------*/
                /*----- FILMS -----*/
                /*-----------------*/
                case "filmList" : $ctrlCinema->filmList(); break;
                case "filmDetail" : $ctrlCinema->filmDetail($id); break;
                case "addFilm" : $ctrlCinema->addFilm(); break;
                case "deleteFilm" : $ctrlCinema->deleteFilm($id); break;
                case "editFilm" : $ctrlCinema->editFilm($id); break;

                /*------------------*/
                /*----- ACTORS -----*/
                /*------------------*/
                case "actorList" : $ctrlCinema->actorList(); break;
                case "actorDetail" : $ctrlCinema->actorDetail($id); break;
                case "addActor" : $ctrlCinema->addActor(); break;
                case "deleteActor" : $ctrlCinema->deleteActor($id); break;
                case "editActor" : $ctrlCinema->editActor($id); break;

                /*---------------------*/
                /*----- DIRECTORS -----*/
                /*---------------------*/
                case "directorList" : $ctrlCinema->directorList(); break;
                case "directorDetail" : $ctrlCinema->directorDetail($id); break;
                case "addDirector" : $ctrlCinema->addDirector(); break;
                case "deleteDirector" : $ctrlCinema->deleteDirector($id); break;
                case "editDirector" : $ctrlCinema->editDirector($id); break;

                /*------------------*/
                /*----- GENRES -----*/
                /*------------------*/
                case "genreList" : $ctrlGenre->genreList(); break;
                case "genreDetail" : $ctrlCinema->genreDetail($id); break;
                case "addGenre" : $ctrlCinema->addGenre(); break;
                case "deleteGenre" : $ctrlCinema->deleteGenre($id); break;
                case "editGenre" : $ctrlCinema->editGenre($id); break;

                /*-------------------*/
                /*----- CASTING -----*/
                /*-------------------*/
                case "editCasting" : $ctrlCinema->editCasting($id); break;

            }
    }
else
    {
        /*----------------*/
        /*----- HOME -----*/
        /*----------------*/
        $ctrlCinema->home();
    }
    