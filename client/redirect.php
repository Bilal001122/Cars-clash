<?php

require_once 'Controllers/GestionLoginController.php';
require_once 'Controllers/GestionAccueilController.php';
require_once 'Controllers/GestionNewsController.php';

require_once 'Controllers/GestionMarquesController.php';

session_start();
if (isset($_POST['login'])) {
    $loginController = new GestionLoginController();
    $loginController->handleLogin();
}

if (isset($_POST['logout'])) {
    $loginController = new GestionLoginController();
    $loginController->handleLogout();
}

if (isset($_POST['goto-page-marque'])) {
    $idMarque = $_POST['idMarque'];
    $idClient = $_POST['idClient'];
    $isFromAvis = $_POST['isFromAvis'];
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageMarque($idMarque, $idClient, $isFromAvis);
}

if (isset($_POST['goto-page-marques'])) {
    $idClient = $_POST['idClient'];
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageMarques($idClient);
}

if (isset($_POST['goto-page-news'])) {
    $idClient = $_POST['idClient'];
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageNews($idClient);
}

if (isset($_POST['goto-page-news-odd'])) {
    $idClient = $_POST['idClient'];
    $idNews = $_POST['idNews'];
    $newsController = new GestionNewsController();
    $newsController->handleGotoPageNewsOdd($idClient, $idNews);
}

if (isset($_POST['add-to-fav'])) {
    $idClient = $_POST['idClient'];
    $idVehicule = $_POST['idVehicule'];
    $idMarque = $_POST['idMarque'];
    $bool = $_POST['goto-cars-details'];
    $marqueController = new GestionMarquesController();
    $marqueController->handleAddToFav($idClient, $idVehicule, $idMarque, $bool);
}

if (isset($_POST['remove-from-fav'])) {
    $idClient = $_POST['idClient'];
    $idVehicule = $_POST['idVehicule'];
    $idMarque = $_POST['idMarque'];
    $bool = $_POST['goto-cars-details'];
    $marqueController = new GestionMarquesController();
    $marqueController->handleRemoveFromFav($idClient, $idVehicule, $idMarque, $bool);
}

if (isset($_POST['show-car-details'])) {
    $idClient = $_POST['idClient'];
    $idVehicule = $_POST['idVehicule'];
    $idMarque = $_POST['idMarque'];
    $isFromAvis = $_POST['isFromAvis'];
    $marqueController = new GestionMarquesController();
    $marqueController->handleShowCarDetails($idClient, $idVehicule, $idMarque, $isFromAvis);
}

if (isset($_POST['add-note'])) {
    $idClient = $_POST['idClient'];
    $idVehicule = $_POST['idVehicule'];
    $idMarque = $_POST['idMarque'];
    $note = $_POST['note'];
    $marqueController = new GestionMarquesController();
    $marqueController->handleAddNoteToCar($idClient, $idVehicule, $idMarque, $note);
}

if (isset($_POST['add-avis'])) {
    $idClient = $_POST['idClient'];
    $idVehicule = $_POST['idVehicule'];
    $idMarque = $_POST['idMarque'];
    $avis = $_POST['avis'];
    $marqueController = new GestionMarquesController();
    $marqueController->handleAddAvisToCar($idClient, $idVehicule, $idMarque, $avis);
}

if (isset($_POST['goto-page-avis'])) {
    $idClient = $_POST['idClient'];
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageAvis($idClient);
}