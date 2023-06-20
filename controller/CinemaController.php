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
                $sql_filmList =  "SELECT id_film, title_film, YEAR(year_film) AS year_film, star_film AS star
                                FROM film";
                $db_filmList = $pdo->query($sql_filmList);
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
                                    f.id_director,
                                    p.id_person,
                                    f.id_film
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

                $sql_castingDetail =   "SELECT CONCAT_WS(' ', p.first_name_person, p.name_person) AS actor, a.id_actor, p.id_person, r.name_role AS role
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
        public function addFilm()
            {
                $pdo = Connect::dbConnect();
                $sql_filmList = "SELECT id_film, title_film
                                FROM film";
                $db_filmList = $pdo->query($sql_filmList);

                $sql_directorList = "SELECT d.id_director, p.id_person,
                                    CONCAT_WS(' ', p.first_name_person, p.name_person) AS director
                                    FROM person p, director d
                                    WHERE p.id_person = d.id_person
                                    ORDER BY p.name_person";

                $db_directorList = $pdo->query($sql_directorList);

                $sql_directorDetail =   "SELECT d.id_director, p.id_person
                                        FROM person p, director d
                                        WHERE p.first_name_person = :first_name_director
                                        AND p.name_person = :name_director
                                        AND p.id_person = d.id_person";

                $db_directorDetail = $pdo->prepare($sql_directorDetail);

                $sql_genreList =   "SELECT tp.id_type_film, tp.name_type_film AS genre
                                    FROM type_film tp";

                $db_genreList = $pdo->query($sql_genreList);

                $sql_genreDetail = "SELECT tp.id_type_film
                                    FROM type_film tp
                                    WHERE tp.name_type_film";


                
                if(isset($_POST['submit']))
                {
                    $title_film = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $year_film = filter_input(INPUT_POST, "year", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $star_film = filter_input(INPUT_POST, "rating");
                    $duration_film = filter_input(INPUT_POST, "duration");
                    $plot_film =  filter_input(INPUT_POST, "plot", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $director_film = filter_input(INPUT_POST, "director", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    
                    foreach($db_genreList->fetchAll() as $key => $genres)
                        {
                            $trim_genres[] = str_replace(" ", "_", $genres["genre"]);
                            if($_POST[$trim_genres[$key]] == "on")
                            {
                                $genre_film[] = $genres["genre"];
                            }
                        }
                    
                    
                                
                    //var_dump($genre_film);

                    
                    $poster_film = NULL;
                    
                    
                    /*
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
                        else
                            {
                                $portrait = NULL; 
                            }
                        */
                        $filmExist = FALSE;

                        foreach($db_filmList->fetchAll() as $films)
                            {
                                if(strtolower($films['title_film']) == strtolower($title_film))
                                    {
                                        $filmExist = TRUE;
                                    }
                            }
                        
                        if($filmExist)
                            {
                                $_SESSION['message'] = "<p class='insuccess fadeOut'>Le film ajouté exist déjà...</p>";
                                header("Location:index.php?action=addFilm");
                            }
                        else
                            { 
                                $directorName = explode(" ", $director_film);
                                
                                $db_directorDetail->bindValue(":first_name_director", $directorName[0]);
                                $db_directorDetail->bindValue(":name_director", $directorName[1]);

                                $db_directorDetail->execute();

                                $directorDetail = $db_directorDetail->fetch();


                                $sql_addFilm =  "INSERT INTO film (title_film, id_director, year_film, duration_film, plot_film, star_film)
                                                VALUES (:title_film, :id_director, :year_film, :duration_film, :plot_film, :star_film)";
                                $db_addFilm = $pdo->prepare($sql_addFilm);
                                
                                $year_film = $year_film."-01-01";               

                                $db_addFilm->bindValue(":title_film", $title_film);
                                $db_addFilm->bindValue(":id_director", $directorDetail["id_director"]);
                                $db_addFilm->bindValue(":year_film", $year_film);
                                $db_addFilm->bindValue(":duration_film", $duration_film);
                                $db_addFilm->bindValue(":plot_film", $plot_film);
                                $db_addFilm->bindValue(":star_film", $star_film);
                                //$db_addFilm->bindValue(":poster_film", $poster_film);
                                
                                $db_addFilm->execute();

                                $sql_addGenres =   "INSERT INTO talk (id_film, id_type_film) 
                                                    VALUES ((SELECT id_film FROM film WHERE title_film = :title_film), 
                                                            (SELECT id_type_film FROM type_film WHERE name_type_film = :genre_film))";
                                $db_addGenres = $pdo->prepare($sql_addGenres);
                                $db_addGenres->bindValue(":title_film", $title_film);
                                
                                foreach($genre_film as $genre)
                                    {
                                        $db_addGenres->bindValue(":genre_film", $genre);
                                        $db_addGenres->execute();
                                    }
                                
                            }
                    }
                require "view/films/addFilm.php";
            }
        public function editFilm($id)
            {
                $pdo = Connect::dbConnect();
                $sql_filmList = "SELECT * FROM film";
                $db_filmList = $pdo->query($sql_filmList);

                $sql_filmDetail =   "SELECT  f.title_film, 
                                    YEAR(f.year_film) AS year_film, 
                                    f.duration_film AS length_film,
                                    GROUP_CONCAT(tp.name_type_film SEPARATOR ' ') AS genres,
                                    CONCAT_WS(' ', p.first_name_person, p.name_person) AS director,
                                    f.star_film AS star,
                                    f.plot_film AS plot,
                                    f.id_director,
                                    p.id_person,
                                    f.id_film
                                    FROM film f, person p, director d, talk t, type_film tp
                                    WHERE p.id_person = d.id_person
                                    AND f.id_director = d.id_director 
                                    AND tp.id_type_film = t.id_type_film
                                    AND t.id_film = f.id_film
                                    AND f.id_film = :id";
                $db_filmDetail = $pdo->prepare($sql_filmDetail);
                $db_filmDetail->bindParam(':id', $id);
                $db_filmDetail->execute();

                $sql_directorList = "SELECT d.id_director, p.id_person,
                                    CONCAT_WS(' ', p.first_name_person, p.name_person) AS director
                                    FROM person p, director d
                                    WHERE p.id_person = d.id_person
                                    ORDER BY p.name_person";

                $db_directorList = $pdo->query($sql_directorList);

                $sql_directorDetail =   "SELECT d.id_director, p.id_person
                                        FROM person p, director d
                                        WHERE p.first_name_person = :first_name_director
                                        AND p.name_person = :name_director
                                        AND p.id_person = d.id_person";

                $db_directorDetail = $pdo->prepare($sql_directorDetail);

                $sql_genreList =   "SELECT tp.id_type_film, tp.name_type_film AS genre
                                    FROM type_film tp";

                $db_genreList = $pdo->query($sql_genreList);

                $sql_genreDetail = "SELECT tp.id_type_film
                                    FROM type_film tp
                                    WHERE tp.name_type_film";


            
                if(isset($_POST['submit']))
                    {
                        $title_film = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $year_film = filter_input(INPUT_POST, "year", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $star_film = filter_input(INPUT_POST, "rating");
                        $duration_film = filter_input(INPUT_POST, "duration");
                        $plot_film =  filter_input(INPUT_POST, "plot", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $director_film = filter_input(INPUT_POST, "director", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                            
                        foreach($db_genreList->fetchAll() as $key => $genres)
                            {
                                $trim_genres[] = str_replace(" ", "_", $genres["genre"]);
                                if($_POST[$trim_genres[$key]] == "on")
                                    {
                                        $genre_film[] = $genres["genre"];
                                    }
                            }
                            
                            
                                        
                        //var_dump($genre_film);

                            
                        $poster_film = NULL;
                            
                        
                        $filmExist = FALSE;

                        foreach($db_filmList->fetchAll() as $films)
                                {
                                    if($films['id_film'] == $id)
                                        {
                                            continue;
                                        }
                                    else
                                        {
                                            if(strtolower($films['title_film']) == strtolower($title_film))
                                                {
                                                    $filmExist = TRUE;
                                                }
                                        }
                                }
                                
                        if($filmExist)
                                {
                                    $_SESSION['message'] = "<p class='insuccess fadeOut'>Le film ajouté exist déjà...</p>";
                                    header("Location:index.php?action=addFilm");
                                }
                        else                            
                                { 
                                        $directorName = explode(" ", $director_film);
                                        
                                        $db_directorDetail->bindValue(":first_name_director", $directorName[0]);
                                        $db_directorDetail->bindValue(":name_director", $directorName[1]);

                                        $db_directorDetail->execute();

                                        $directorDetail = $db_directorDetail->fetch();

                                        $sql_editFilm = "UPDATE film 
                                                        SET title_film = :title_film, 
                                                        id_director = :id_director, 
                                                        year_film = :year_film, 
                                                        duration_film = :duration_film, 
                                                        plot_film = :plot_film, 
                                                        star_film = :star_film
                                                        WHERE id_film = :id_film";
                                        $db_editFilm = $pdo->prepare($sql_editFilm);
                                        
                                        $year_film = $year_film."-01-01";               

                                        $db_editFilm->bindValue(":title_film", $title_film);
                                        $db_editFilm->bindValue(":id_director", $directorDetail["id_director"]);
                                        $db_editFilm->bindValue(":year_film", $year_film);
                                        $db_editFilm->bindValue(":duration_film", $duration_film);
                                        $db_editFilm->bindValue(":plot_film", $plot_film);
                                        $db_editFilm->bindValue(":star_film", $star_film);
                                        //$db_addFilm->bindValue(":poster_film", $poster_film);
                                        
                                        $db_editFilm->execute();

                                        $sql_deleteTalk =   "DELETE FROM talk
                                                            WHERE id_film = :id";
                                        $db_deleteTalk = $pdo->prepare($sql_deleteTalk);
                                        $db_deleteTalk->bindParam(":id", $id);
                                        $db_deleteTalk->execute();

                                        $sql_addGenres =   "INSERT INTO talk (id_film, id_type_film) 
                                                            VALUES ((SELECT id_film FROM film WHERE title_film = :title_film), 
                                                                    (SELECT id_type_film FROM type_film WHERE name_type_film = :genre_film))";
                                        $db_addGenres = $pdo->prepare($sql_addGenres);
                                        $db_addGenres->bindValue(":title_film", $title_film);
                                        
                                        foreach($genre_film as $genre)
                                            {
                                                $db_addGenres->bindValue(":genre_film", $genre);
                                                $db_addGenres->execute();
                                            }
                                        
                                }
                    }

                require "view/films/editFilm.php";
            }
        public function deleteFilm($id)
            {
                $pdo = Connect::dbConnect();

                $sql_deleteTalk =   "DELETE FROM talk
                                    WHERE id_film = :id";
                $db_deleteTalk = $pdo->prepare($sql_deleteTalk);
                $db_deleteTalk->bindParam(":id", $id);
                $db_deleteTalk->execute();

                $sql_deleteFilm =   "DELETE FROM film
                                    WHERE id_film = :id";
                $db_deleteFilm = $pdo->prepare($sql_deleteFilm);
                $db_deleteFilm->bindParam(":id", $id);
                $db_deleteFilm->execute();

                header("Location:index.php?action=filmList");
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
                                    AND a.id_person = :id";
                $db_actorDetail = $pdo->prepare($sql_actorDetail);
                $db_actorDetail->execute(["id" => $id]);

                $sql_filmsActor =   "SELECT f.title_film AS film, YEAR(f.year_film) AS year_film, r.name_role AS role, f.id_film, f.star_film AS star
                                    FROM film f, casting c, role r, actor a
                                    WHERE f.id_film = c.id_film
                                    AND a.id_actor = c.id_actor
                                    AND r.id_role = c.id_role
                                    AND a.id_person = :id";
                $db_filmsActor = $pdo->prepare($sql_filmsActor);
                $db_filmsActor->execute(["id" => $id]);
                require "view/actors/actorDetail.php";
            }
        public function addActor()
            {
                $pdo = Connect::dbConnect();
                $sql_actorList =   "SELECT * FROM person p, actor a
                                    WHERE p.id_person = a.id_person";
                $db_actorList = $pdo->query($sql_actorList);
                if(isset($_POST['submit']))
                {
                    
                    $first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $birth = filter_input(INPUT_POST, "birth");
                    $sexe =  filter_input(INPUT_POST, "sexe");
                    $portrait = NULL;
                        
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
                        else
                            {
                                $portrait = NULL; 
                            }
                        
                        $actorExist = FALSE;

                        foreach($db_actorList->fetchAll() as $actors)
                            {
                                if(strtolower($actors['first_name_person']) == strtolower($first_name) && strtolower($actors['name_person']) == strtolower($name))
                                    {
                                        $actorExist = TRUE;
                                    }
                            }
                        
                        if($actorExist)
                            {
                                $_SESSION['message'] = "<p class='insuccess fadeOut'>L'acteur ajouté exist déjà...</p>";
                                header("Location:index.php?action=addActor");
                            }
                        else
                            { 
                                $sql_addActor =    "INSERT INTO person (first_name_person, name_person, sex_person, birth_person, portrait_person)
                                                    VALUES (:first_name_person, :name_person, :sex_person, :birth_person, :portrait_person);
                                                    SET @last_id_person = LAST_INSERT_ID();
                                                    INSERT INTO actor (id_person)
                                                    VALUES (@last_id_person);";
                                $db_addActor = $pdo->prepare($sql_addActor);

                                $db_addActor->bindValue(":first_name_person", $first_name);
                                $db_addActor->bindValue(":name_person", $name);
                                $db_addActor->bindValue(":sex_person", $sexe);
                                $db_addActor->bindValue(":birth_person", $birth);
                                $db_addActor->bindValue(":portrait_person", $portrait);
                                
                                $db_addActor->execute();
                                
                            }
                    }
                require "view/actors/addActor.php";
            }
        public function editActor($id)
            {
                $pdo = Connect::dbConnect();
                $sql_actorList =   "SELECT * FROM person p, actor a
                                    WHERE p.id_person = a.id_person";
                $db_actorList = $pdo->query($sql_actorList);

                $sql_actorDetail =  "SELECT * FROM person p, actor a
                                    WHERE p.id_person = a.id_person
                                    AND a.id_person = :id";
                $db_actorDetail = $pdo->prepare($sql_actorDetail);
                $db_actorDetail->execute(["id" => $id]);

                // var_dump($db_directorDetail->fetch());
                if(isset($_POST['submit']))
                {
                    $first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $birth = filter_input(INPUT_POST, "birth");
                    $sexe =  filter_input(INPUT_POST, "sexe");
                    $portrait = NULL;

                /*
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
                    else
                        {
                            $portrait = NULL; 
                        }
                    */
                    $actorExist = FALSE;
                    
                    foreach($db_actorList->fetchAll() as $actors)
                        {
                            if($actors['id_person'] == $id)
                                {
                                    continue;
                                }
                            else
                                {
                                    if(strtolower($actors['first_name_person']) == strtolower($first_name) && strtolower($actors['name_person']) == strtolower($name))
                                        {
                                            $actorExist = TRUE;
                                        }
                                }
                        }
                    
                    if($actorExist)
                        {
                            $_SESSION['message'] = "<p class='insuccess fadeOut'>L'acteur ajouté exist déjà...</p>";
                            header("Location:index.php?action=directorList");
                        }
                    else
                        { 
                            $sql_editActor =    "UPDATE person
                                                SET  first_name_person = :first_name_person, 
                                                name_person = :name_person, 
                                                sex_person = :sex_person, 
                                                birth_person = :birth_person,
                                                portrait_person = :portrait_person
                                                WHERE id_person = :id";
                            $db_editActor = $pdo->prepare($sql_editActor);

                            $db_editActor->bindValue(":first_name_person", $first_name);
                            $db_editActor->bindValue(":name_person", $name);
                            $db_editActor->bindValue(":sex_person", $sexe);
                            $db_editActor->bindValue(":birth_person", $birth);
                            $db_editActor->bindValue(":portrait_person", $portrait);
                            $db_editActor->bindValue(":id",$id);
                            
                            $db_editActor->execute();
                            header("Location:index.php?action=actorList");
                            
                        }
                }
                require "view/actors/editActor.php";
            }
        public function deleteActor($id)
            {
                $pdo = Connect::dbConnect();
                
                $sql_deleteActor = "DELETE FROM person
                                    WHERE id_person = :id";
                $db_deleteActor = $pdo->prepare($sql_deleteActor);
                $db_deleteActor->bindParam(":id", $id);
                $db_deleteActor->execute();

                $sql_deletePerson =    "DELETE FROM person
                                        WHERE id_person = :id";
                $db_deletePerson = $pdo->prepare($sql_deletePerson);
                $db_deletePerson->bindParam(":id", $id);
                $db_deletePerson->execute();

                header("Location:index.php?action=actorList");
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
                                        AND d.id_person = :id";
                $db_directorDetail = $pdo->prepare($sql_directorDetail);
                $db_directorDetail->execute(["id" => $id]);

                $sql_filmsDirector =   "SELECT f.title_film AS film, YEAR(f.year_film) AS year_film, f.id_film, f.star_film AS star
                                        FROM film f, director d
                                        WHERE f.id_director = d.id_director
                                        AND d.id_person = :id";
                $db_filmsDirector = $pdo->prepare($sql_filmsDirector);
                $db_filmsDirector->execute(["id" => $id]);
                require "view/directors/directorDetail.php";
            }
        public function addDirector()
            {
                $pdo = Connect::dbConnect();
                $sql_directorList =    "SELECT * FROM person p, director d
                                        WHERE p.id_person = d.id_person";
                $db_directorList = $pdo->query($sql_directorList);
                if(isset($_POST['submit']))
                {

                    $first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $birth = filter_input(INPUT_POST, "birth");
                    $sexe =  filter_input(INPUT_POST, "sexe");
                    $portrait = NULL;
                    
                    /*
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
                    else
                        {
                            $portrait = NULL; 
                        }
                    */
                    $directorExist = FALSE;

                    foreach($db_directorList->fetchAll() as $directors)
                        {
                            if(strtolower($directors['first_name_person']) == strtolower($first_name) && strtolower($directors['name_person']) == strtolower($name))
                                {
                                    $directorExist = TRUE;
                                }
                        }
                    
                    if($directorExist)
                        {
                            $_SESSION['message'] = "<p class='insuccess fadeOut'>L'acteur ajouté exist déjà...</p>";
                            header("Location:index.php?action=addDirector");
                        }
                    else
                        { 
                            $sql_addDirector =    "INSERT INTO person (first_name_person, name_person, sex_person, birth_person, portrait_person)
                                                VALUES (:first_name_person, :name_person, :sex_person, :birth_person, :portrait_person);
                                                SET @last_id_person = LAST_INSERT_ID();
                                                INSERT INTO director (id_person)
                                                VALUES (@last_id_person);";
                            $db_addDirector = $pdo->prepare($sql_addDirector);

                            $db_addDirector->bindValue(":first_name_person", $first_name);
                            $db_addDirector->bindValue(":name_person", $name);
                            $db_addDirector->bindValue(":sex_person", $sexe);
                            $db_addDirector->bindValue(":birth_person", $birth);
                            $db_addDirector->bindValue(":portrait_person", $portrait);
                            
                            $db_addDirector->execute();
                            
                        }
                }
                require "view/directors/addDirector.php";
            }
        public function editDirector($id)
            {
                $pdo = Connect::dbConnect();
                $sql_directorList = "SELECT * FROM person p, director d
                                    WHERE p.id_person = d.id_person";
                $db_directorList = $pdo->query($sql_directorList);

                $sql_directorDetail =  "SELECT * FROM person p, director d
                                        WHERE p.id_person = d.id_person
                                        AND d.id_person = :id";
                $db_directorDetail = $pdo->prepare($sql_directorDetail);
                $db_directorDetail->execute(["id" => $id]);
                
                // var_dump($db_directorDetail->fetch());
                if(isset($_POST['submit']))
                    {
                        $first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $birth = filter_input(INPUT_POST, "birth");
                        $sexe =  filter_input(INPUT_POST, "sexe");
                        $portrait = NULL;
                    
                    /*
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
                        else
                            {
                                $portrait = NULL; 
                            }
                        */
                        $directorExist = FALSE;
                        
                        foreach($db_directorList->fetchAll() as $directors)
                            {
                                if($directors['id_person'] == $id)
                                    {
                                        continue;
                                    }
                                else
                                    {
                                        if(strtolower($directors['first_name_person']) == strtolower($first_name) && strtolower($directors['name_person']) == strtolower($name))
                                            {
                                                $directorExist = TRUE;
                                            }
                                    }
                            }
                        
                        if($directorExist)
                            {
                                $_SESSION['message'] = "<p class='insuccess fadeOut'>Le realisateur ajouté exist déjà...</p>";
                                header("Location:index.php?action=directorList");
                            }
                        else
                            { 
                                $sql_editDirector = "UPDATE person
                                                    SET  first_name_person = :first_name_person, 
                                                    name_person = :name_person, 
                                                    sex_person = :sex_person, 
                                                    birth_person = :birth_person,
                                                    portrait_person = :portrait_person
                                                    WHERE id_person = :id";
                                $db_editDirector = $pdo->prepare($sql_editDirector);

                                $db_editDirector->bindValue(":first_name_person", $first_name);
                                $db_editDirector->bindValue(":name_person", $name);
                                $db_editDirector->bindValue(":sex_person", $sexe);
                                $db_editDirector->bindValue(":birth_person", $birth);
                                $db_editDirector->bindValue(":portrait_person", $portrait);
                                $db_editDirector->bindValue(":id",$id);
                                
                                $db_editDirector->execute();
                                header("Location:index.php?action=directorList");
                                
                            }
                }
                require "view/directors/editDirector.php";
            }
        public function deleteDirector($id)
            {
                $pdo = Connect::dbConnect();

                $sql_deleteDirector =  "DELETE FROM director
                                        WHERE id_person = :id";
                $db_deleteDirector = $pdo->prepare($sql_deleteDirector);
                $db_deleteDirector->bindParam(":id", $id);
                $db_deleteDirector->execute();


                $sql_deletePerson =    "DELETE FROM person
                                        WHERE id_person = :id";
                $db_deletePerson = $pdo->prepare($sql_deletePerson);
                $db_deletePerson->bindParam(":id", $id);
                $db_deletePerson->execute();

                header("Location:index.php?action=directorList");
            }
        /*------------------*/
        /*----- PERSON -----*/
        /*------------------*/
        public function checkPerson($id)
            {
                $pdo = Connect::dbConnect();
                $sql_checkPerson = "SELECT * FROM person
                                    WHERE id_person = :id";
                $db_checkPerson = $pdo->prepare($sql_checkPerson);
                $db_checkPerson->execute(["id" => $id]);
                $personExist = $db_checkPerson->fetch();
                
                if (!empty($personExist)) {$result = TRUE;}
                else {$result = FALSE;}
                
                return $result;
            }
        /*------------------*/
        /*----- GENRES -----*/
        /*------------------*/
        public function genreList()
            {
                $pdo = Connect::dbConnect();
                $sql_genreList =   "SELECT tp.id_type_film, tp.name_type_film, COUNT(f.title_film) AS count
                                    FROM type_film tp, film f, talk t
                                    WHERE t.id_type_film = tp.id_type_film 
                                    AND t.id_film = f.id_film
                                    OR tp.id_type_film NOT IN
                                    (SELECT t.id_type_film
                                    FROM talk t)
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

                $sql_filmsGenre =  "SELECT tp.id_type_film, f.id_film,  f.title_film AS film, YEAR(f.year_film) AS year_film, f.star_film AS star
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
                $sql_genreList = "SELECT * FROM type_film tp";
                $db_genreList = $pdo->query($sql_genreList);
                
                if(isset($_POST['submit']))
                    {
                        $genre = filter_input(INPUT_POST, "genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        
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
                                        $poster = $uniqueName.'.'.$extension;

                                        //On doit exprimer le chemin de le dossier où les images doivent etré stockées (sur le Mac)
                                        $path = "/Applications/XAMPP/xamppfiles/htdocs/raul_ZANNONI/BDD_my_cinema/public/img/person";

                                        //fonction poutr envoyer l'image dans le dossier upload
                                        move_uploaded_file($imgTmpName, './public/img/person/'.$poster);
                                        
                                        //si le chargement n'est pas marché, on utilise le PATH complet de le dossier "upload"
                                        if(!move_uploaded_file($imgTmpName, './public/img/person/'.$poster))
                                            {
                                                move_uploaded_file($imgTmpName, $path.$poster);
                                            }
                                    }
                                else
                                    {
                                        $poster = NULL; 
                                        $_SESSION['message'] = "<p class='insuccess fadeOut'>Mauvaise extension ou image trop volumineuse!</p>";
                                    }
                            }
                        else
                            {
                                $poster = NULL; 
                            }
                        
                        $genreExist = FALSE;

                        foreach($db_genreList->fetchAll() as $genres)
                            {
                                if(strtolower($genres['name_type_film']) == strtolower($genre))
                                    {
                                        $genreExist = TRUE;
                                    }
                            }
                        
                        if($genreExist)
                            {
                                $_SESSION['message'] = "<p class='insuccess fadeOut'>Le genre de film ajouté exist déjà...</p>";
                                header("Location:index.php?action=addGenre");
                            }
                        else
                            {  
                                if(!$description)
                                    {
                                        $description = NULL;
                                    }
                        
                                $sql_addGenre = "INSERT INTO type_film (name_type_film, poster_type_film, description_type_film)
                                                VALUES (:name_type_film, :poster_type_film, :description_type_film)";
                                $db_addGenre = $pdo->prepare($sql_addGenre);

                                $db_addGenre->bindValue(":name_type_film", $genre);
                                $db_addGenre->bindValue(":poster_type_film", $poster);
                                $db_addGenre->bindValue(":description_type_film", $description);

                                $db_addGenre->execute();

                                header("Location:index.php?action=addGenre");
                            }
                    }
                require "view/genres/addGenre.php";
            }
        public function editGenre($id)
            {
                $pdo = Connect::dbConnect();
                $sql_genreList = "SELECT * FROM type_film tp";
                $db_genreList = $pdo->query($sql_genreList);

                $sql_genreDetail = "SELECT * FROM type_film tp
                                    WHERE tp.id_type_film = :id";
                $db_genreDetail = $pdo->prepare($sql_genreDetail);
                $db_genreDetail->execute(["id" => $id]);

                if(isset($_POST['submit']))
                    {
                        $genre = filter_input(INPUT_POST, "genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        
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
                                        $portrait = NULL; 
                                        $_SESSION['message'] = "<p class='insuccess fadeOut'>Mauvaise extension ou image trop volumineuse!</p>";
                                    }
                            }
                        else
                            {
                                $portrait = NULL; 
                            }
                        
                        $genreExist = FALSE;

                        foreach($db_genreList->fetchAll() as $genres)
                            {
                                if($genres['id_type_film'] == $id)
                                    {
                                        continue;
                                    }
                                else
                                    {
                                        if(strtolower($genres['name_type_film']) == strtolower($genre))
                                            {
                                                $genreExist = TRUE;
                                            }
                                    }
                            }
                        
                        if($genreExist)
                            {
                                $_SESSION['message'] = "<p class='insuccess fadeOut'>Le genre de film ajouté exist déjà...</p>";
                                header("Location:index.php?action=editGenre&id=".$id);
                            }
                        else
                            {  
                                if(!$description)
                                    {
                                        $description = NULL;
                                    }
                        
                                $sql_editGenre =    "UPDATE type_film
                                                    SET name_type_film = :name_type_film, 
                                                        poster_type_film = :poster_type_film, 
                                                        description_type_film = :description_type_film
                                                    WHERE id_type_film = :id";
                                $db_editGenre = $pdo->prepare($sql_editGenre);

                                $db_editGenre->bindValue(":name_type_film", $genre);
                                $db_editGenre->bindValue(":poster_type_film", $portrait);
                                $db_editGenre->bindValue(":description_type_film", $description);
                                $db_editGenre->bindValue(":id", $id);
                                
                                $db_editGenre->execute();
                                header("Location:index.php?action=genreList");
                            }
                    }


                require "view/genres/editGenre.php";
            }
        public function deleteGenre($id)
            {
                $pdo = Connect::dbConnect();
                $sql_deleteGenre = "DELETE FROM type_film
                                    WHERE id_type_film = :id";
                $db_deleteGenre = $pdo->prepare($sql_deleteGenre);
                $db_deleteGenre->bindParam(":id", $id);

                $db_deleteGenre->execute();

                header("Location:index.php?action=genreList");
            }
        public function checkGenre($id)
            {
                $pdo = Connect::dbConnect();
                $sql_checkGenre =  "SELECT * FROM type_film
                                    WHERE id_type_film = :id";
                $db_checkGenre = $pdo->prepare($sql_checkGenre);
                $db_checkGenre->bindParam(":id", $id);

                $db_checkGenre->execute();
                $genreExist = $db_checkGenre->fetch();
                
                if (!empty($genreExist)) {$result = TRUE;}
                else {$result = FALSE;}
                
                return $result;
            }
        /*-----------------*/
        /*----- ROLES -----*/
        /*-----------------*/
        public function addRole()
            {
                $pdo = Connect::dbConnect();
            }
        public function editRole()
            {
                $pdo = Connect::dbConnect();
            }
        public function deleteRole()
            {
                $pdo = Connect::dbConnect();
            }
    }



?>