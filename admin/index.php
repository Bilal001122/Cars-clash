<?php
require_once 'Controllers/GestionLoginController.php';
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

if (isset($_GET['idGuide'])) {
    $idGuide = $_GET['idGuide'];
}

if (isset($_GET['idDiapo'])) {
    $idDiapo = $_GET['idDiapo'];
}
if (isset($_GET['idContact'])) {
    $idContact = $_GET['idContact'];
}
if (isset($_GET['failed'])) {
    $failed = $_GET['failed'];
} else {
    $failed = 0;
}

switch ($baseURL) {
    case "/cars-clash/admin/":
        $controller = new GestionLoginController();
        $controller->showPageLogin($failed);
        break;
    case "/cars-clash/admin/login":
        $controller = new GestionLoginController();
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
    case "/cars-clash/admin/add-marque":
        $controller = new GestionMarquesController();
        $controller->showPageAddMarque();
        break;
    case "/cars-clash/admin/edit-vehicule":
        $controller = new GestionVehiculesController();
        $controller->showPageEditVehicule($idVehicule);
        break;

    case "/cars-clash/admin/details-vehicule":
        $controller = new GestionVehiculesController();
        $controller->showPageDetailsVehicule($idVehicule);
        break;

    case "/cars-clash/admin/add-vehicule":
        $controller = new GestionVehiculesController();
        $controller->showPageAddVehicule();
        break;
    case "/cars-clash/admin/edit-news":
        $controller = new GestionNewsController();
        $controller->showPageEditNews($idNews);
        break;
    case "/cars-clash/admin/add-news":
        $controller = new GestionNewsController();
        $controller->showPageAddNews();
        break;
    case "/cars-clash/admin/guide-achat":
        $controller = new GestionParamsController();
        $controller->showPageGuideAchat();
        break;
    case "/cars-clash/admin/edit-guide":
        $controller = new GestionParamsController();
        $controller->showPageEditGuide($idGuide);
        break;
    case "/cars-clash/admin/add-guide":
        $controller = new GestionParamsController();
        $controller->showPageAddGuide();
        break;

    case "/cars-clash/admin/diaporama":
        $controller = new GestionParamsController();
        $controller->showPageDiaporama();
        break;

    case "/cars-clash/admin/edit-diaporama":
        $controller = new GestionParamsController();
        $controller->showPageEditDiaporama($idDiapo);
        break;

    case "/cars-clash/admin/add-diaporama":
        $controller = new GestionParamsController();
        $controller->showPageAddDiaporama();
        break;

    case "/cars-clash/admin/contacts":
        $controller = new GestionParamsController();
        $controller->showPageContacts();
        break;

    case "/cars-clash/admin/add-contact":
        $controller = new GestionParamsController();
        $controller->showPageAddContacts();
        break;

    case "/cars-clash/admin/edit-contact":
        $controller = new GestionParamsController();
        $controller->showPageEditContacts($idContact);
        break;
}
