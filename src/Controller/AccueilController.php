<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\AccueilModel;


class AccueilController extends AbstractController
{
    public function index()
    {
        // On détermine sur quelle page on se trouve
        if (isset($_GET['p']) && !empty($_GET['p'])) {
            $currentPage = (int) strip_tags($_GET['p']);
        } else {
            $currentPage = 1;
        }
        var_dump($currentPage);
        
        $accueilModel = new AccueilModel();

        $accueils = $accueilModel->findAll($currentPage);
        // ma logique métier ici
        // exemple récupérer des données en BDD
        // traiter des formulaire
        // vérifier que l'utilisateur a les droits
        // etc...
        $articles = new AccueilModel();
        $this->render('accueil.php', [
            'accueils' => $accueils[0],
            'pages' => $accueils[1],
            'currentPage' => $currentPage
        ]);
    }

    // public function create()
    // {
    //     $boardModel = new BoardModel();

    //     // je récupère le name depuis le formulaire
    //     $board_name = trim($_POST['board_name']);

    //     if (!empty($board_name)) {
    //         // je crée un board
    //         $boardModel = new BoardModel();
    //         $board_id = $boardModel->create($board_name);
    //     }
    //     header('Location:http://localhost/kanban/Projet_Kanban/');
    //     exit();
    // }
}
