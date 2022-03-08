<?php
namespace App;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

//connexion base de donnée
use App\Database;

$db = new Database();
$db->Connect();
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
<?php foreach ($articles as $article) :?>
    <p><?= $article->getDepartement_article()?></p>
    <?php endforeach ?>

</body>
</html>