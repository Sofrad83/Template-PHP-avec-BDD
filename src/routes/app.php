<?php
use App\Controller\MonController;
use App\Database\DatabaseConfig;
use App\Database\DatabaseConnection;
use App\Database\DatabaseQuery;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//Base de données
$config = new DatabaseConfig('localhost', 'pvmp', 'root', '');
// Connexion à la base de données
$dbConnection = new DatabaseConnection($config);
// Récupération de l'objet PDO
$pdo = $dbConnection->getPdo();
// Création de l'objet DatabaseQuery
$dbQuery = new DatabaseQuery($pdo);

$app->get('/', function (Request $request, Response $response) use($dbQuery){
    $page = new MonController("index", $request, $response, $dbQuery);
    return $page->response;
});