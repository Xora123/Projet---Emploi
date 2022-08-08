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

        $date1 = null;
        $date2 = null;

        if (isset($_GET['date1']) && !empty($_GET['date2'])) {

            $date1 = date("Y-m-d", strtotime($_GET['date1']));

            $date2 = date("Y-m-d", strtotime($_GET['date2']));
        }

        $search = null;

        if (isset($_GET['search'])) {

            $search = $_GET['search'];
        }

        $type = null;

        if (isset($_GET['type'])) {

            $type = $_GET['type'];
        }

        $accueilModel = new AccueilModel();

        $accueils = $accueilModel->findAll($currentPage, $date1, $date2, $search, $type);

        $articles = new AccueilModel();
        $this->render('accueil.php', [
            'accueils' => $accueils[0],
            'pages' => $accueils[1],
            'currentPage' => $currentPage,
            'date1' => $date1,
            'date2' => $date2,
            'search' => $search,
            'type' => $type,
        ]);
    }
}
