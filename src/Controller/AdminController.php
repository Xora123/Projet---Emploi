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

          // On détermine sur quelle page on se trouve
          if (isset($_GET['p']) && !empty($_GET['p'])) {
            $currentPage = (int) strip_tags($_GET['p']);
        } else {
            $currentPage = 1;
        }
        // ma logique métier ici
        // exemple récupérer des données en BDD
        // traiter des formulaire
        // vérifier que l'utilisateur a les droits
        // etc...
        $this->render('admin.php', [
            'admins' => $admins,
            'currentPage' => $currentPage
        ]);
    }
    public function delete()
    {
        $id = $_GET["id"];
        $delete = new AdminModel();
        $delete->delete($id);
        header('Location: ?page=admin');
    }

    public function hide()
    {
        $id = $_GET["id"];
        $hide =$_GET["hide"];
        $hidden = new AdminModel();
        $hidden->hide($hide, $id);
        header('Location: ?page=admin');
    }

    public function insert()
    {

        $nom = ($_POST["nom"]);
        $description = ($_POST["description"]);
        $offre =  ($_POST["offre"]);
        $numero = ($_POST["numero"]);
        $date = ($_POST["date"]);
        $heure = ($_POST["heure"]);
        $date_valide = ($_POST["date_valide"]);
        $type = ($_POST["Type"]);

        $insert = new AdminModel();
        $insert->insert($nom, $description, $offre, $numero, $date, $heure, $date_valide, $type);
        header('Location: ?page=admin');
    }

}
