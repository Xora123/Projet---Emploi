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
                    <a href="?page=admin" class="btn btn-primary">Page Admin</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div id="h1"class="column is-centered">
        <div class="content">
            <h1>Liste des offres disponibles</h1>
        </div>
    </div>

<div class="dropdown">
<p>Filter par: </p>
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
    Departements
  </a>
  <?php foreach ($accueils as $accueil) : ?>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="#"><?= $accueil->getDepartement();?></a></li>
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
<button>Validé</button>
    <?php foreach ($accueils as $accueil) : ?>
    <div id="offre" class="list-group">
  <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    <div class="d-flex w-300 justify-content-between">
      <h5 class="mb-3"><?= $accueil->getTitle() ?></h5>
      <small>Date de publucation : <?= $accueil->getDate_publication_article();?></small>
      <small>Heure de publication :<?= $accueil->getHeurePublicationArticle();?></small>
    </div>
    <p class="mb-3"><?= $accueil->getDescriptionArticles();?></p>
    
    <small><?= $accueil->getDepartement();?></small>
    <small><?=$accueil->getNumeroDepartement();?></small>
    <small><?=$accueil->getType_article();?></small>
    <div class="d-flex w-300 justify-content-end">
    <a href="?page=article&id=<?=$accueil->getId();?>" class="btn btn-primary">Voir plus</a>
        <!-- <button onclick="location.href='?page=article&id=<?=$accueil->getId();?>'" >Voir plus</button> -->
    </div>
  </a>
  
</div>
    <?php endforeach ?>
    <nav>
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for($page = 1; $page <= $pages; $page++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
        <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
            <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>

</nav>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
</html>