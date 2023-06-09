<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>
<body>
    <div id="global">
        <header>
            <div id="header">
                
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a href="index.php?action=home">Accueil</a>
                    <a href="index.php?action=filmList">Films</a>
                    <a href="index.php?action=actorList">Acteurs</a>
                    <a href="index.php?action=directorList">Réalisateurs</a>
                    <a href="index.php?action=genreList">Genres</a>
                    <button><a href="index.php?action=Connexion">Connexion</a></button>
                </nav>
                
            </div>
        </header>
        <main>
            <?php //getMessages(); ?>
            <?= $content ?>
        </main> 
        <footer id="pied">
            MVC_cinema appli créé par le stagiaire ELAN Raul ZANNONI
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> 
</body>
</html>