<?php

require_once 'Controllers/GestionLoginController.php';

session_start();
if (isset($_POST['login'])) {
    $loginController = new GestionLoginController();
    $loginController->handleLogin();
}

if (isset($_POST['logout'])) {
    $loginController = new GestionLoginController();
    $loginController->handleLogout();
}
