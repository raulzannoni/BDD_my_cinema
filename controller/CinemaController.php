<?php

namespace Controller;
//session_start();
use Model\Connect;

require "model/Connect.php";

class CinemaController  
    {
        /*----------------*/
        /*----- HOME -----*/
        /*----------------*/
        public function home()
            {
                $pdo = Connect::dbConnect();
                require "view/home.php";
            }
        /*-----------------*/
        /*----- FILMS -----*/
        /*-----------------*/
        public function filmList()
            {
                $pdo = Connect::dbConnect();
                $sql =  "SELECT id_film, title_film, YEAR(year_film) AS year_film, star_film AS star
                        FROM film";
                $db_filmList = $pdo->query($sql);
                require "view/films/filmList.php";
            }
        public function filmDetail($id)
            {
                $pdo = Connect::dbConnect();
                $sql_filmDetail =   "SELECT  f.title_film, 
                                    YEAR(f.year_film) AS year_film, 
                                    f.duration_film AS length_film,
                                    GROUP_CONCAT(tp.name_type_film SEPARATOR ' ') AS genres,
                                    CONCAT_WS(' ', p.first_name_person, p.name_person) AS director,
                                    f.star_film AS star,
                                    f.plot_film AS plot,
                                    f.id_director
                                    FROM film f, person p, director d, talk t, type_film tp
                                    WHERE p.id_person = d.id_person
                                    AND f.id_director = d.id_director 
                                    AND tp.id_type_film = t.id_type_film
                                    AND t.id_film = f.id_film
                                    AND f.id_film = :id";
                $db_filmDetail = $pdo->prepare($sql_filmDetail);
                $db_filmDetail->execute(["id" => $id]);

                $sql_genresFilm =   "SELECT f.title_film AS title, tp.name_type_film AS genre, tp.id_type_film
                                    FROM type_film tp, talk t, film f
                                    WHERE tp.id_type_film = t.id_type_film
                                    AND t.id_film = f.id_film
                                    AND f.id_film = :id";
                $db_genresFilm = $pdo->prepare($sql_genresFilm);
                $db_genresFilm->execute(["id" => $id]); 

                $sql_castingDetail =   "SELECT CONCAT_WS(' ', p.first_name_person, p.name_person) AS actor, a.id_actor, r.name_role AS role
                                        FROM person p, actor a, film f, casting c, role r
                                        WHERE f.id_film = c.id_film
                                        AND a.id_actor = c.id_actor
                                        AND r.id_role = c.id_role
                                        AND p.id_person = a.id_person
                                        AND f.id_film = :id";
                $db_castingDetail = $pdo->prepare($sql_castingDetail);
                $db_castingDetail->execute(["id" => $id]);

                require "view/films/filmDetail.php";
                
            }
        public function addFilm($id)
            {
                $pdo = Connect::dbConnect();
                $sql_addFilm = "INSERT INTO film (title_film, id_director, year_film, duration_film, plot_film, star_film, poster_film)
                                VALUES (:title_film, :id_director, :year_film, :duration_film, :plot_film, :star_film, :poster_film)";
                $db_addFilm = $pdo->prepare($sql_addFilm);
                
                $db_addFilm->bindValue(':title_film', $title_film);
                $db_addFilm->bindValue(':id_director', $id_director);
                $db_addFilm->bindValue(':year_film', $year_film);
                $db_addFilm->bindValue(':duration_film', $duration_film);
                $db_addFilm->bindValue(':plot_film', $plot_film);
                $db_addFilm->bindValue(':star_film', $star_film);
                $db_addFilm->bindValue(':poster_film', $poster_film);

                $db_addFilm->execute();
            }
        public function modifyFilm($id)
            {
                $pdo = Connect::dbConnect();
            }
        public function deleteFilm($id)
            {
                $pdo = Connect::dbConnect();
            }
        /*------------------*/
        /*----- ACTORS -----*/
        /*------------------*/
        public function actorList()
            {
                $pdo = Connect::dbConnect();
                $sql_actorList =   "SELECT * FROM person p, actor a
                                    WHERE p.id_person = a.id_person";
                $db_actorList = $pdo->query($sql_actorList);
                require "view/actors/actorList.php";
            }
        public function actorDetail($id)
            {
                $pdo = Connect::dbConnect();
                $sql_actorDetail =  "SELECT  CONCAT_WS(' ', p.first_name_person, p.name_person) AS actor, p.id_person, a.id_actor, p.birth_person AS birth, p.sex_person AS sex  
                                    FROM person p, actor a
                                    WHERE p.id_person = a.id_person
                                    AND a.id_actor = :id";
                $db_actorDetail = $pdo->prepare($sql_actorDetail);
                $db_actorDetail->execute(["id" => $id]);

                $sql_filmsActor =   "SELECT f.title_film AS film, YEAR(f.year_film) AS year_film, r.name_role AS role, f.id_film
                                    FROM film f, casting c, role r, actor a
                                    WHERE f.id_film = c.id_film
                                    AND a.id_actor = c.id_actor
                                    AND r.id_role = c.id_role
                                    AND a.id_actor = :id";
                $db_filmsActor = $pdo->prepare($sql_filmsActor);
                $db_filmsActor->execute(["id" => $id]);
                require "view/actors/actorDetail.php";
            }
        public function addActor()
            {
                if(isset($_POST['submit']))
                    {
                        $first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $birth = filter_input(INPUT_POST, "birth");
                        $sexe =  filter_input(INPUT_POST, "sexe");
                        $checkActor =  filter_input(INPUT_POST, "checkActor", FILTER_VALIDATE_BOOL);

                        if(isset($_FILES['portrait']))
                            {
                                $imgTmpName = $_FILES['portrait']['tmp_name'];
                                $imgName = $_FILES['portrait']['name'];
                                $imgSize = $_FILES['portrait']['size'];
                                $imgError = $_FILES['portrait']['error'];
                                
                                //on va a prendre le dernier element de le nome de le file (l'extension)
                                $tabExtension = explode('.', $imgName);
                                $extension = strtolower(end($tabExtension));
        
                                //on va a verifier que l'extension de le file ajouté soit effectivement d'une image
                                $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                                $maxSize = 500000000;
                                
                                //pour envoyer l'image dans notre dossier, on doit verifier que l'estension soit correct, 
                                //qu'il n'y ait pas des errors et que le dimension de l'image soit raisonnable
                                if(in_array($extension, $extensions) && $imgSize <= $maxSize && $imgError == 0)
                                    {
                                        //uniqid va à créer un ID unique et aleatoire
                                        $uniqueName = uniqid('', true);
                                        
                                        //on va à créer la variable img = ID + extension
                                        $portrait = $uniqueName.'.'.$extension;

                                        //On doit exprimer le chemin de le dossier où les images doivent etré stockées (sur le Mac)
                                        $path = "/Applications/XAMPP/xamppfiles/htdocs/raul_ZANNONI/BDD_my_cinema/public/img/person";

                                        //fonction poutr envoyer l'image dans le dossier upload
                                        move_uploaded_file($imgTmpName, './public/img/person/'.$portrait);
                                        
                                        //si le chargement n'est pas marché, on utilise le PATH complet de le dossier "upload"
                                        if(!move_uploaded_file($imgTmpName, './public/img/person/'.$portrait))
                                            {
                                                move_uploaded_file($imgTmpName, $path.$portrait);
                                            }
                                    }
                                else
                                    {
                                        $_SESSION['message'] = "<p class='insuccess fadeOut'>Mauvaise extension ou image trop volumineuse!</p>";
                                    }
                            }
                    }
                $pdo = Connect::dbConnect();
                $sql_actorData = "";
                require "view/actors/addActor.php";
            }
        public function modifyActor()
            {
                $pdo = Connect::dbConnect();
            }
        public function deleteActor()
            {
                $pdo = Connect::dbConnect();
            }
        /*---------------------*/
        /*----- DIRECTORS -----*/
        /*---------------------*/
        public function directorList()
            {
                $pdo = Connect::dbConnect();
                $sql =  "SELECT * FROM person p, director d
                        WHERE p.id_person = d.id_person";
                $db_directorList = $pdo->query($sql);
                require "view/directors/directorList.php";
            }
        public function directorDetail($id)
            {
                $pdo = Connect::dbConnect();
                $sql_directorDetail =  "SELECT CONCAT_WS(' ', p.first_name_person, p.name_person) AS director, p.id_person, d.id_director, p.birth_person AS birth, p.sex_person AS sex  
                                        FROM person p, director d
                                        WHERE p.id_person = d.id_person
                                        AND d.id_director = :id";
                $db_directorDetail = $pdo->prepare($sql_directorDetail);
                $db_directorDetail->execute(["id" => $id]);

                $sql_filmsDirector =   "SELECT f.title_film AS film, YEAR(f.year_film) AS year_film, f.id_film
                                        FROM film f, director d
                                        WHERE f.id_director = d.id_director
                                        AND d.id_director = :id";
                $db_filmsDirector = $pdo->prepare($sql_filmsDirector);
                $db_filmsDirector->execute(["id" => $id]);
                require "view/directors/directorDetail.php";
            }
        public function addDirector()
            {
                $pdo = Connect::dbConnect();
                require "view/directors/addDirector.php";
            }
        public function modifyDirector()
            {
                $pdo = Connect::dbConnect();
            }
        public function deleteDirector()
            {
                $pdo = Connect::dbConnect();
            }
        /*------------------*/
        /*----- GENRES -----*/
        /*------------------*/
        public function genreList()
            {
                $pdo = Connect::dbConnect();
                $sql_genreList =   "SELECT tp.id_type_film, tp.name_type_film, COUNT(f.title_film) AS count
                                    FROM type_film tp, film f, talk t
                                    WHERE t.id_type_film = tp.id_type_film AND t.id_film = f.id_film
                                    GROUP BY tp.id_type_film, tp.name_type_film
                                    ORDER BY COUNT(f.title_film) DESC";
                $db_genreList = $pdo->query($sql_genreList);
                require "view/genres/genreList.php";
            }
        public function genreDetail($id)
            {
                $pdo = Connect::dbConnect();
                $sql_genreDetail = "SELECT tp.id_type_film, tp.name_type_film AS genre
                                    FROM type_film tp
                                    WHERE tp.id_type_film = :id";
                $db_genreDetail = $pdo->prepare($sql_genreDetail);
                $db_genreDetail->execute(["id" => $id]);

                $sql_filmsGenre =  "SELECT tp.id_type_film, f.id_film,  f.title_film AS film, YEAR(f.year_film) AS year_film
                                    FROM type_film tp, film f, talk t
                                    WHERE tp.id_type_film = t.id_type_film 
                                    AND t.id_film = f.id_film
                                    AND tp.id_type_film = :id
                                    ORDER BY YEAR(f.year_film) DESC";
                
                $db_filmsGenre = $pdo->prepare($sql_filmsGenre);
                $db_filmsGenre->execute(["id" => $id]);
                require "view/genres/genreDetail.php";
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
        /*-----------------*/
        /*----- ROLES -----*/
        /*-----------------*/
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