<?php
require_once 'Controllers/PageLoginController.php';
require_once 'Controllers/GestionMarquesController.php';

session_start();

if (isset($_POST['login'])) {
    $loginController = new PageLoginController();
    $loginController->handleLogin();
}

if (isset($_POST['logout'])) {
    $loginController = new PageLoginController();
    $loginController->handleLogout();
}

if (isset($_POST['goto-modifier-marque'])) {
    $marqueController = new GestionMarquesController();
    $marqueController->handleGotoEditMarque();
}

if (isset($_POST['modifier-marque'])) {
    $idMarque = $_POST['id-marque'];
    $marqueController = new GestionMarquesController();
    $marqueController->handleEditMarque($idMarque);
}
