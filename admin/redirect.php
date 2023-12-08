<?php
require_once 'Controllers/PageLoginController.php';

if (isset($_POST['login'])) {
    $loginController = new PageLoginController();
    $loginController->handleLogin();
}
if (isset($_POST['logout'])) {
    $loginController = new PageLoginController();
    $loginController->handleLogout();
}
