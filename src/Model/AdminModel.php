<?php

namespace App\Model;

use PDO;
use App\database\Database;

class AdminModel
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

    protected $type;

    protected $hide;


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
                ,`date_valide`
                ,`hide`
                ,`Type` as type
                FROM ' . self::TABLE_NAME . '
                ORDER BY `date_publication_article` DESC;
        ';

        $pdoStatement = $this->pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }
    public function delete($id)
    {
        $sql =
            'DELETE FROM ' . self::TABLE_NAME . ' 
            WHERE id_article = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function insert($nom, $description, $offre, $numero, $date, $heure, $date_valide, $type)
    {
        $sql = "INSERT INTO `article`(`titre_article`, `description_article`, `departement_article`, `numero_departement_article`, `date_publication_article`, `heure_publication_article`, `date_valide`, `Type`) 
        VALUES ('$nom','$description','$offre','$numero','$date','$heure', '$date_valide', '$type')";
        echo $sql;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }

    public function hide($hide, $id)
    {
        if ($hide == 1) {
            $sql = "UPDATE (`article`) SET `hide` = '2' WHERE id_article = :id";
        } else {
            $sql = "UPDATE (`article`) SET `hide` = '1' WHERE id_article = :id";
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
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
     * Get the value of id
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

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
     * Get the value of date_publication_article
     */
    public function getDate_publication_article()
    {
        return $this->date_publication_article;
    }

    /**
     * Set the value of date_publication_article
     *
     * @return  self
     */
    public function setDate_publication_article($date_publication_article)
    {
        $this->date_publication_article = $date_publication_article;

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

    /**
     * Get the value of currentPage
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * Set the value of currentPage
     *
     * @return  self
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;

        return $this;
    }
}
