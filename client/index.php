<?php
require_once 'Controllers/GestionLoginController.php';
require_once 'Controllers/GestionAccueilController.php';
require_once 'Controllers/GestionMarquesController.php';
require_once 'Controllers/GestionNewsController.php';
session_start();
$request = $_SERVER['REQUEST_URI'];
$baseURL = strtok($request, '?');

if (isset($_GET['idNews'])) {
    $idNews = $_GET['idNews'];
}

if (isset($_GET['idMarque'])) {
    $idMarque = $_GET['idMarque'];
}

if (isset($_GET['failed'])) {
    $failed = $_GET['failed'];
} else {
    $failed = 0;
}

switch ($baseURL) {
    case '/cars-clash/client/':
        $controller = new GestionLoginController();
        $controller->showPageLogin($failed);
        break;
    case '/cars-clash/client/login':
        $controller = new GestionLoginController();
        $controller->showPageLogin($failed);
        break;
    case '/cars-clash/client/accueil':
        $controller = new GestionAccueilController();
        $controller->showPageAccueil();
        break;
    case '/cars-clash/client/marque':
        $controller = new GestionMarquesController();
        $controller->showPageMarque($idMarque);
        break;

    case '/cars-clash/client/marques':
        $controller = new GestionMarquesController();
        $controller->showPageMarques();
        break;

    case '/cars-clash/client/news':
        $controller = new GestionNewsController();
        $controller->showPageNews();
        break;

    case '/cars-clash/client/news-odd':
        $controller = new GestionNewsController();
        $controller->showPageNewsOdd($idNews);
        break;

}
