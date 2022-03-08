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
                FROM ' . self::TABLE_NAME . '
                ORDER BY `date_publication_article` DESC;
        ';

        $pdoStatement = $this->pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
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
        $this->titre_article= $titre_article;

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
}