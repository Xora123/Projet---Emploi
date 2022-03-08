<?php

class Database
{   
    private $config;
    private $pdo;

    /**
     * THE CONSTRUCTOR
     */
    public function __construct()
    {
        $this->getconfig();
        $this->connect();
    }

    /**
     * Retrieve the config from the config.ini file
     */
    private function getconfig()
    {
        // On récupere les identifiants de la Base de données
        $config = parse_ini_file('config.ini', true);
        // Erreur pour vor si le fichier n'existe pas 
        if (!$config) {
            throw new \Exception("Le fichier config.ini n'existe pas");
        }
        $this->config = $config;
    }

    /**
     * Connect to the DataBase
     */
    private function connect()
    {
        $dbh ='';
        // Connexion a la base de données 
        try {
            $dbh = new PDO('mysql:host=' . $this->config["DB_HOST"] . ';dbname=' . $this->config["DB_NAME"], $this->config["DB_USERNAME"], $this->config["DB_PASSWORD"]);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Échec lors de la connexion : ' . $e->getMessage();
        }
        $this->pdo = $dbh;
    }
    public function getPDO(){
        return $this->pdo;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php foreach ($articles as $article) : ?>
      <small><?= $article->getDescription_article();?></small>
    <?php endforeach ?>

</body>
</html>