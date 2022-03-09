<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\AccueilModel;


class AccueilController extends AbstractController
{
    public function index()
    {
        $accueilModel = new AccueilModel();

        $accueils = $accueilModel->findAll();
        // ma logique métier ici
        // exemple récupérer des données en BDD
        // traiter des formulaire
        // vérifier que l'utilisateur a les droits
        // etc...
        $articles = new AccueilModel(); 
        $articles->page();
        $this->render('accueil.php', [
            'accueils' => $accueils,
            'articles' => $articles,
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
