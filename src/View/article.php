<?php

namespace App;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

//connexion base de donnée
use App\Database;

$db = new Database();
$db->Connect();


?>
<!DOCTYPE html>
<html lang="en" class="html">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>

<body class="body">
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="logo.svg">
                <img src="logo.svg" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="?page=projets">
                    Accueil
                </a>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button">
                            <strong>Connexion</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div id="h1" class="column is-centered">
        <?php foreach ($articles as $article) : ?>
            <div class="content">
                <h1><?= $article->getTitle() ?></h1>
            </div>
    </div>
<?php endforeach ?>
</div>
<?php foreach ($articles as $article) : ?>
    <div id="offre" class="list-group">
        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
            <div class="d-flex w-300 justify-content-between">
                <h5 class="mb-3"><?= $article->getTitle() ?></h5>
                <small>Date de publication : <?= $article->getDate_publication_article(); ?></small>
                <small>Heure de publication :<?= $article->getHeure_publication_article(); ?></small>
            </div>
            <p class="mb-3"><?= $article->getDescription_article(); ?></p>

            <small><?= $article->getDepartement_article(); ?></small>
            <small><?= $article->getNumero_departement(); ?></small>
            <form action="?page=insert_text&id=<?= $article->getId_article(); ?>" method="post">
                <p>Postuler pour l'offre : <input type="text" name="reponse" /></p>
                <input type="hidden" name="post_id" value="<?php $article->getId_article() ?>" />
                <p><input type="submit" value="OK"></p>
            </form>
        </a>
    </div>
<?php endforeach ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>

</html>