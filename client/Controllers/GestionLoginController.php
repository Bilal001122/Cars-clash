<?php
require_once 'Models/GestionLoginModel.php';
require_once 'Views/PageLoginView.php';
class GestionLoginController
{
    public function handleLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $model = new GestionLoginModel();
        $client = $model->login($email, $password);
        if ($client) {
            session_start();
            $_SESSION['client'] = $client;
            header('Location: /cars-clash/client/accueil?idClient=' . $client['ID_Utilisateur']);
            exit();
        } else {
            header('Location: /cars-clash/client/login?failed=1');
        }
    }

    public function handleLogout()
    {
        unset($_SESSION['client']);
        session_start();
        session_destroy();
        header('Location: /cars-clash/client/');
        exit();
    }

    public function showPageLogin($failed)
    {
        $view = new PageLoginView();
        $view->showPageLogin($failed);
    }
}
