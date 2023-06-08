<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});


$ctrlCinema = new CinemaController();

$id = (isset($_GET['id'])) ? $_GET['id'] : null;

if(isset($_GET["action"]))
    {
        /*
        $id_film = filter_input(INPUT_GET, "id_film", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_role = filter_input(INPUT_GET, "id_role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_type_film = filter_input(INPUT_GET, "id_type_film", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_actor = filter_input(INPUT_GET, "id_actor", FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
        $id_director = filter_input(INPUT_GET, "id_director", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        */

        switch($_GET["action"])
            {
                case "Home" : $ctrlCinema->Home(); break;
                //case "Films" : $ctrlCinema->Films(); break;
                
            }
        
    }
else
    {
        $ctrlCinema->Home();
    }
    