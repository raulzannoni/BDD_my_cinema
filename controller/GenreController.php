<?php

namespace Controller;
//session_start();
use Model\Connect;



class GenreController  
    {
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
    }