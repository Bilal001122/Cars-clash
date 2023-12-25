<?php

require_once 'Controllers/GestionLoginController.php';
require_once 'Controllers/GestionAccueilController.php';

session_start();
if (isset($_POST['login'])) {
    $loginController = new GestionLoginController();
    $loginController->handleLogin();
}

if (isset($_POST['logout'])) {
    $loginController = new GestionLoginController();
    $loginController->handleLogout();
}

if (isset($_POST['goto-page-marques'])) {
    $idMarque = $_POST['idMarque'];
    $idClient = $_POST['idClient'];
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageMarque($idMarque, $idClient);
}
