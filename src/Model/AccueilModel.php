<?php

namespace App\Model;

use PDO;
use App\database\Database;

class AccueilModel
{
    protected $pdo;

    protected $id_article;

    protected $titre_article;

    protected $description_article;

    protected $departement_article;

    protected $numero_departement;

    protected $date_publication_article;

    protected $heure_publication_article;

    protected $type_article;


    const TABLE_NAME = 'article';

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getPDO();
    }

    public function findAll()
    {

        $sql = 'SELECT
                `id_article`
                ,`titre_article`
                ,`description_article`
                ,`departement_article`
                ,`numero_departement_article`
                ,`date_publication_article`
                ,`heure_publication_article`
                ,`type`
                FROM ' . self::TABLE_NAME . '
                ORDER BY `date_publication_article` DESC LIMIT 0, 5;
        ';

        $pdoStatement = $this->pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public function Page()
    {
        // On détermine sur quelle page on se trouve
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $currentPage = (int) strip_tags($_GET['page']);
        } else {
          
        }
        $currentPage = 1;
        $sql = 'SELECT COUNT(*) AS nb_article FROM `article`';

        $pdoStatement = $this->pdo->query($sql);

        // On prépare la requete
        $query = $this->pdo->prepare($sql);
        $query->execute();

        
        // On récupère le nombre d'articles
        $result = $pdoStatement->fetch();
        
        var_dump($result);

        $nbArticles = (int) $result['nb_article'];

        // On détermine le nombre d'articles par page
        $parPage = 10;

        // On calcule le nombre de pages total
        $pages = ceil($nbArticles / $parPage);

        // Calcul du 1er article de la page
        $premier = ($currentPage * $parPage) - $parPage;
        $sql = 'SELECT * FROM `article` ORDER BY `date_publication_article` DESC LIMIT :premier, :parpage;';

        // On prépare la requête
        $query = $this->pdo->prepare($sql);

        $query->bindValue(':premier', $premier, PDO::PARAM_INT);
        $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);

        // On exécute
        $query->execute();

        // On récupère les valeurs dans un tableau associatif
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);
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
        return $this->DatePublicationArticle;
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
}
