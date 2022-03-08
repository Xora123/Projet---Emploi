<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\ArticleModel;


class ArticleController extends AbstractController
{
    public function index()
    {
        $articleModel = new ArticleModel();

        $articles = $articleModel->findAll();
        // ma logique métier ici
        // exemple récupérer des données en BDD
        // traiter des formulaire
        // vérifier que l'utilisateur a les droits
        // etc...
        $this->render('article.php', [
            'articles' => $articles
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