<?php

namespace App\Model;

use PDO;
use App\database\Database;

class ArticleModel{
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

#Pour trouver une question par son ID
public function findById($id){
        
    $sql = 'SELECT * FROM ' . self::TABLE_NAME . ' WHERE id_article = '.$id;

    $pdoStatement = $this->pdo->query($sql);
    
    $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
    
    return $result;
}


    /**
     * Get the value of id_article
     */ 
    public function getId_article()
    {
        return $this->id_article;
    }

    /**
     * Set the value of id_article
     *
     * @return  self
     */ 
    public function setId_article($id_article)
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
     * Get the value of pdo
     */ 
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * Set the value of pdo
     *
     * @return  self
     */ 
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;

        return $this;
    }

    /**
     * Get the value of description_article
     */ 
    public function getDescription_article()
    {
        return $this->description_article;
    }

    /**
     * Set the value of description_article
     *
     * @return  self
     */ 
    public function setDescription_article($description_article)
    {
        $this->description_article = $description_article;

        return $this;
    }

    /**
     * Get the value of departement_article
     */ 
    public function getDepartement_article()
    {
        return $this->departement_article;
    }

    /**
     * Set the value of departement_article
     *
     * @return  self
     */ 
    public function setDepartement_article($departement_article)
    {
        $this->departement_article = $departement_article;

        return $this;
    }

    /**
     * Get the value of numero_departement
     */ 
    public function getNumero_departement()
    {
        return $this->numero_departement;
    }

    /**
     * Set the value of numero_departement
     *
     * @return  self
     */ 
    public function setNumero_departement($numero_departement)
    {
        $this->numero_departement = $numero_departement;

        return $this;
    }

    /**
     * Get the value of heure_publication_article
     */ 
    public function getHeure_publication_article()
    {
        return $this->heure_publication_article;
    }

    /**
     * Set the value of heure_publication_article
     *
     * @return  self
     */ 
    public function setHeure_publication_article($heure_publication_article)
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