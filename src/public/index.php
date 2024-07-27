<?php

use Slim\Factory\AppFactory;
use Dotenv\Dotenv;

require __DIR__ . '/../../vendor/autoload.php';

//dotenv

$dotenv = Dotenv::createImmutable(__DIR__. '/../../');
$dotenv->load();

// Instantiate App
$app = AppFactory::create();

// Add error middleware
if($_ENV["ENV"] == "dev"){
    $app->addErrorMiddleware(true, true, true);
}else{
    $app->addErrorMiddleware(false, false, false);
}

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates/');
$twig = new Twig\Environment($loader, [
    'debug' => true,
    'cache' => false,
]);

$twig->addExtension(new \Twig\Extension\DebugExtension());

//Liste des routes
include_once(__DIR__ . '/../routes/app.php');

$app->run();
