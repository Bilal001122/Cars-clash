<?php

require_once 'Controllers/GestionLoginController.php';
require_once 'Controllers/GestionAccueilController.php';
require_once 'Controllers/GestionNewsController.php';

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
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageMarque($idMarque, $idClient);
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
