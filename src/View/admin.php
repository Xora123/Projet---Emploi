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
                <a class="navbar-item" href="?page=projets&p=<?php echo $currentPage?>">
                    Accueil
                </a>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a href="?page=admin" class="btn btn-primary">Page Admin</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div id="h1" class="column is-centered">
        <div class="content">
            <h1>Liste des offres disponibles</h1>
        </div>
    </div>

    <div class="dropdown">
        <p>Filter par: </p>
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Departements
        </a>
        <?php foreach ($admins as $admin) : ?>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#"><?= $admin->getDepartement(); ?></a></li>
            </ul>
        <?php endforeach ?>
    </div>

    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Type
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">CDD</a></li>
            <li><a class="dropdown-item" href="#">CDI</a></li>
            <li><a class="dropdown-item" href="#">Interim</a></li>
            <li><a class="dropdown-item" href="#">Alternance</a></li>
        </ul>
    </div>
    <a class="btn btn-primary">Validé</a>
    <div class="btn-group">
    </div>
    <?php foreach ($admins as $admin) : ?>
        <div id="offre" class="list-group">
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                <div class="d-flex w-300 justify-content-between">
                    <h5 class="mb-4"><?= $admin->getTitle() ?></h5>
                    <small>Date de publication : <?= $admin->getDate_publication_article(); ?></small>
                    <small>Heure de publication :<?= $admin->getHeurePublicationArticle(); ?></small>
                    <small>Validité de l'offre :<?= $admin->getDate_valide(); ?></small>
                </div>
                <p class="mb-3"><?= $admin->getDescriptionArticles(); ?></p>
                <small><?= $admin->getDepartement(); ?></small>
                <small><?= $admin->getNumeroDepartement(); ?></small>
                <div>
                    <small><?= $admin->getType(); ?></small>
                </div>
                <div>

                </div>
                <div class="d-flex w-300 justify-content-end">
                    <button onclick="location.href='?page=delete&id=<?= $admin->getId(); ?>'">Supprimer</button>
                    <button onclick="location.href='?page=hide&id=<?= $admin->getId(); ?>&hide=<?= $admin->getHide(); ?>'">Afficher/cacher</button>
                    <a href="?page=article&id=<?= $admin->getId(); ?>" id="btn-voir" class="btn btn-primary">Voir plus</a>
                </div>

            </a>
        </div>
        <?php
    endforeach ?>
    <script type="text/javascript">
        function bascule(id) {
            if (document.getElementById(id).style.visibility == "hidden")
                document.getElementById(id).style.visibility = "visible";
            else document.getElementById(id).style.visibility = "hidden";
        }
    </script>
    </style>
    </head>

    <button id="button-add" class="btn btn-primary" onclick="bascule('header')">Ajouter une offre</button>

    <div id="header" style="visibility: hidden;">
        <form action="?page=insert" method="post">
            <p>Titre de l'article</p>
            <input type="text" name="nom" />
            <p>Description</p> <input type="textarea" name="description" />
            <p>Departement de l'offre</p><input type="text" name="offre" />
            <p>Numéro de Departement</p> <input type="number" name="numero" />
            <p>Date de publication</p> <input type="date" name="date" />
            <p>Heure de publication</p> <input type="time" name="heure" />
            <p>Date de validité de l'offre <input type="date" name="date_valide" /></p>
            <p>Type d'offre</p>
            <select name="Type" id="cars" multiple>
                <option name="Type" value="cdi">CDI</option>
                <option name="Type" value="CDD">CDD</option>
                <option name="Type" value="Alternance">Alternance</option>
                <option name="Type" value="Interim">Interim</option>
            </select>
            <p style="margin-left: 2%;"><input type="submit" value="Envoyé"></p>
        </form>
    </div>




</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>

</html>