<?php
require_once 'Controllers/PageLoginController.php';
require_once 'Controllers/GestionVehiculesController.php';
require_once 'Controllers/GestionMarquesController.php';
require_once 'Controllers/GestionAvisController.php';
require_once 'Controllers/GestionNewsController.php';
require_once 'Controllers/GestionUtilisateursController.php';
require_once 'Controllers/GestionParamsController.php';

session_start();
$request = $_SERVER['REQUEST_URI'];
$baseURL = strtok($request, '?');

if (isset($_GET['idVehicule'])) {
    $idVehicule = $_GET['idVehicule'];
}

if (isset($_GET['idMarque'])) {
    $idMarque = $_GET['idMarque'];
}

if (isset($_GET['idAvis'])) {
    $idAvis = $_GET['idAvis'];
}

if (isset($_GET['idNews'])) {
    $idNews = $_GET['idNews'];
}

if (isset($_GET['idUtilisateur'])) {
    $idUtilisateur = $_GET['idUtilisateur'];
}

if (isset($_GET['idParametres'])) {
    $idParametres = $_GET['idParametres'];
}

if (isset($_GET['failed'])) {
    $failed = $_GET['failed'];
} else {
    $failed = 0;
}

switch ($baseURL) {
    case "/cars-clash/admin/":
        $controller = new PageLoginController();
        $controller->showPageLogin($failed);
        break;
    case "/cars-clash/admin/login":
        $controller = new PageLoginController();
        $controller->showPageLogin($failed);
        break;
    case "/cars-clash/admin/gestion-vehicules":
        $controller = new GestionVehiculesController();
        $controller->showPageVehicule();
        break;
    case "/cars-clash/admin/gestion-marques":
        $controller = new GestionMarquesController();
        $controller->showPageMarques();
        break;
    case "/cars-clash/admin/edit-marque":
        $controller = new GestionMarquesController();
        $controller->showPageEditMarque($idMarque);
        break;
    case "/cars-clash/admin/gestion-avis":
        $controller = new GestionAvisController();
        $controller->showPageAvis();
        break;
    case "/cars-clash/admin/gestion-news":
        $controller = new GestionNewsController();
        $controller->showPageNews();
        break;
    case "/cars-clash/admin/gestion-utilisateurs":
        $controller = new GestionUtilisateurController();
        $controller->showPageUtilisateur();
        break;
    case "/cars-clash/admin/gestion-params":
        $controller = new GestionParamsController();
        $controller->showPageParams();
        break;
}
