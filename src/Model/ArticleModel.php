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
}