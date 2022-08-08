<?php

namespace App\Model;

use PDO;
use App\database\Database;

class AccueilModel
{

    protected $currentPage;

    protected $pdo;

    protected $id_article;

    protected $titre_article;

    protected $description_article;

    protected $departement_article;

    protected $numero_departement;

    protected $date_publication_article;

    protected $heure_publication_article;

    protected $date_valide;

    protected $type_article;

    protected $hide;



    const TABLE_NAME = 'article';

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getPDO();
    }

    // fonction pour la tabulation 
    public function findAll($currentPage, $date1, $date2, $search, $type)
    {
        // // On détermine le nombre total d'articles
        $sql = 'SELECT COUNT(*) AS nb_articles FROM `article` WHERE `hide` = "1"';

        // On prépare la requête
        $query = $this->pdo->prepare($sql);

        // On exécute
        $query->execute();

        // On récupère le nombre d'articles
        $result = $query->fetch();

        $nbArticles = (int) $result['nb_articles'];

        // On détermine le nombre d'articles par page
        $parPage = 3;

        // On calcule le nombre de pages total
        $pages = ceil($nbArticles / $parPage);


        // Calcul du 1er article de la page
        $premier = ($currentPage * $parPage) - $parPage;


        $sql = "SELECT * FROM `article` WHERE `hide` = '1' ";

        if (isset($date1) & isset($date2)) {
            $sql .= 'AND WHERE date(`date_publication_article`) BETWEEN :date1 AND :date2';
        }
        if (isset($search)) {
            $sql .= 'AND `titre_article` LIKE :search';
        }
        if (isset($type)) {

            $sql .= 'AND `Type` LIKE :type';
        }
        if ($premier != null) {
            $sql .= 'AND ORDER BY `id_article` DESC LIMIT :parPage OFFSET :premier';
        }



        $pdoStatement = $this->pdo->prepare($sql);

        if (isset($date1) & isset($date2)) {
            $pdoStatement->bindValue(':date1', $date1);
            $pdoStatement->bindValue(':date2', $date2);
        }
        if (isset($search)) {
            $pdoStatement->bindValue(':search', $search);
        }
        if ($type != null) {
            $pdoStatement->bindValue(':type', $type);
        }
        if ($premier != null) {
            $pdoStatement->bindValue(':premier', (int) $premier, PDO::PARAM_INT);
            $pdoStatement->bindValue(':parPage', (int) $parPage, PDO::PARAM_INT);
        }

        echo $sql;
        $pdoStatement->execute();

        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return [$result, $pages];
    }
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id_article;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id_article)
    {
        $this->id_article = $id_article;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getTitle()
    {
        return $this->titre_article;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName(String $titre_article)
    {
        $this->titre_article = $titre_article;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getDescriptionArticles()
    {
        return $this->description_article;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setDescritpionArticle(string $description_article)
    {
        $this->description_article = $description_article;

        return $this;
    }


    /**
     * Get the value of content
     */
    public function getDepartement()
    {
        return $this->departement_article;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setDepartement(string $departement_article)
    {
        $this->departement_article = $departement_article;

        return $this;
    }

    /**
     * Get the value of color
     */
    public function getNumeroDepartement()
    {
        return $this->numero_departement_article;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */
    public function setNumeroDepartement($numero_departement_article)
    {
        $this->numero_departement_article = $numero_departement_article;

        return $this;
    }

    /**
     * Get the value of list_id
     */
    public function getDatePublicationArticle()
    {
        return $this->date_publication_article;
    }

    /**
     * Set the value of list_id
     *
     * @return  self
     */
    public function setDatePublicationArticle($date_publication_article)
    {
        $this->date_publication_article = $date_publication_article;

        return $this;
    }

    /**
     * Get the value of list_id
     */
    public function getHeurePublicationArticle()
    {
        return $this->heure_publication_article;
    }

    /**
     * Set the value of list_id
     *
     * @return  self
     */
    public function setHeurePublicationArticle($heure_publication_article)
    {
        $this->heure_publication_article = $heure_publication_article;

        return $this;
    }
    /**
     * Get the value of id_article
     */
    public function getType_article()
    {
        return $this->type_article;
    }

    /**
     * Set the value of id_article
     *
     * @return  self
     */
    public function setType_article($type_article)
    {
        $this->id_article = $type_article;

        return $this;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * Set the value of id_article
     *
     * @return  self
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;

        return $this;
    }

    /**
     * Get the value of date_valide
     */
    public function getDate_valide()
    {
        return $this->date_valide;
    }

    /**
     * Set the value of date_valide
     *
     * @return  self
     */
    public function setDate_valide($date_valide)
    {
        $this->date_valide = $date_valide;

        return $this;
    }

    /**
     * Get the value of hide
     */
    public function getHide()
    {
        return $this->hide;
    }

    /**
     * Set the value of hide
     *
     * @return  self
     */
    public function setHide($hide)
    {
        $this->hide = $hide;

        return $this;
    }
}
