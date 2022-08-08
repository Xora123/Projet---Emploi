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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                <a class="navbar-item" href="?page=projets&p=<?php echo $currentPage ?>">
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

    <hr style="border-top:1px dotted #000;" />

    <form class="form-inline" method="GET" action="">
        <libellé>Trier par Type</libellé>
        <select name="type">
            <option valeur="cdi">CDI</option>
            <option valeur="cdd">CDD</option>
            <option valeur="Alternance">Alternance</option>
            <option valeur="interim">Interim</option>
        </select>
        <button class="btn btn-success" action="?page=projets&p=<?= $pages ?>&type=<?php echo $type ?>">Chercher</button>
    </form>

    <hr style="border-top:1px dotted #000;" />

    <form class="form-inline" method="GET" action="">

        Search: <input type="text" name="search" /><br />
        <label>Date:</label>
        <input type="date" class="form-control" name="date1" value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : '' ?>" />
        <label>A</label>
        <input type="date" class="form-control" name="date2" value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : '' ?>" />

        <button class="btn btn-success" action="?page=projets&p=<?= $pages ?>&date1=<?php echo $date1 ?>&date2=<?php echo $date2 ?>&search=<?php echo $search ?>&type=<?php echo $type ?>">Chercher</button>
        <a href="?page=projets&p=<?= $pages ?>" type="button" class="btn btn-danger">
            <span class="glyphicon glyphicon-refresh">Recharger<span>
        </a>
    </form>

    <?php foreach ($accueils as $accueil) :

        $current_date = date('Y-m-d');

        // Get the custom field
        $post_date = $accueil->getDate_valide();

        $hide = $accueil->getHide();

        // If older than current date, don't show it
        if ($post_date > $current_date && $hide == 1) :
    ?>
            <div id="offre" class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    <div class="d-flex w-300 justify-content-between">
                        <h5 class="mb-3"><?= $accueil->getTitle() ?></h5>
                        <small>Date de publication : <?= $accueil->getDatePublicationArticle(); ?></small>
                        <small>Heure de publication :<?= $accueil->getHeurePublicationArticle(); ?></small>
                        <small>Validité de l'offre :<?= $accueil->getDate_valide(); ?></small>
                    </div>
                    <p class="mb-3"><?= $accueil->getDescriptionArticles(); ?></p>

                    <small><?= $accueil->getDepartement(); ?></small>
                    <small><?= $accueil->getNumeroDepartement(); ?></small>
                    <small><?= $accueil->getType_article(); ?></small>
                    <div class="d-flex w-300 justify-content-end">
                        <a href="?page=article&id=<?= $accueil->getId(); ?>" class="btn btn-primary">Voir plus</a>
                        <!-- <button onclick="location.href='?page=article&id=<?= $accueil->getId(); ?>'" >Voir plus</button> -->
                    </div>
                </a>
            </div>
    <?php
        endif;
    endforeach; ?>
    <ul class="pagination">
        <?php for ($page = 1; $page <= $pages; $page++) : ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="?page=projets&p=<?= $pages ?>&date1=<?php echo $date1 ?>&date2=<?php echo $date2 ?>" class="page-link"><?= $page ?></a>
            </li>
        <?php endfor ?>
    </ul>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>

</html>