<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Model\AdminModel;


class AdminController extends AbstractController
{
    public function index()
    {
        $adminModel = new AdminModel();
        $admins = $adminModel->findAll();

        // ma logique métier ici
        // exemple récupérer des données en BDD
        // traiter des formulaire
        // vérifier que l'utilisateur a les droits
        // etc...
        $this->render('admin.php', [
            'admins' => $admins
        ]);
    }
    public function delete(){
        $id = $_GET["id"];
        $delete = new AdminModel(); 
        $delete->delete($id);
        header('Location: ?page=admin');
        }
    public function insert(){
        
        $nom = ($_POST["nom"]);
        $description = ($_POST["description"]);
        $offre =  ($_POST["offre"]);
        $numero = ($_POST["numero"]);
        $date = ($_POST["date"]);
        $heure = ($_POST["heure"]);
        $type = ($_POST["Type"]);

        $insert = new AdminModel();
        $insert->insert($nom, $description, $offre, $numero, $date, $heure, $type);
        header('Location: ?page=admin');
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
