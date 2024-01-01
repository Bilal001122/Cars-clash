<?php
require_once 'Controllers/GestionLoginController.php';
require_once 'Controllers/GestionAccueilController.php';
require_once 'Controllers/GestionMarquesController.php';
require_once 'Controllers/GestionNewsController.php';
require_once 'Controllers/GestionAvisController.php';
require_once 'Controllers/GestionGuideAchatController.php';
require_once 'Controllers/GestionContactsController.php';
require_once 'Controllers/GestionComparaisonController.php';

session_start();
$request = $_SERVER['REQUEST_URI'];
$baseURL = strtok($request, '?');

if (isset($_GET['idNews'])) {
    $idNews = $_GET['idNews'];
}

if (isset($_GET['idMarque'])) {
    $idMarque = $_GET['idMarque'];
}

if (isset($_GET['idVehicule'])) {
    $idVehicule = $_GET['idVehicule'];
}

if (isset($_GET['idClient'])) {
    $idClient = $_GET['idClient'];
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

    case '/cars-clash/client/car-details':
        $controller = new GestionMarquesController();
        $controller->showPageCarDetails($idClient, $idMarque, $idVehicule);
        break;

    case '/cars-clash/client/avis':
        $controller = new GestionAvisController();
        $controller->showPageAvis();
        break;

    case '/cars-clash/client/guide-achat':
        $controller = new GestionGuideAchatController();
        $controller->showPageGuideAchat();
        break;

    case '/cars-clash/client/contact':
        $controller = new GestionContactsController();
        $controller->showPageContacts();
        break;

    case '/cars-clash/client/register':
        $controller = new GestionLoginController();
        $controller->showPageRegister();
        break;

    case '/cars-clash/client/comparaison':
        $comparaisonController = new GestionComparaisonController();
        $comparaisonController->showPageComparaison();
        break;

    case '/cars-clash/client/comparaison2':
        $comparaisonController = new GestionComparaisonController();
        $comparaisonController->showPageComparaison2();
        break;

    case '/cars-clash/client/comparaison3':
        $comparaisonController = new GestionComparaisonController();
        $comparaisonController->showPageComparaison3();
        break;

    case '/cars-clash/client/comparaison4':
        $comparaisonController = new GestionComparaisonController();
        $comparaisonController->showPageComparaison4();
        break;
}
