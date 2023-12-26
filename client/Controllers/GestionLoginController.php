<?php
require_once 'Models/GestionLoginModel.php';
require_once 'Views/PageLoginView.php';
require_once 'Views/PageRegisterView.php';
class GestionLoginController
{
    public function handleLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $model = new GestionLoginModel();
        $client = $model->login($email, $password);
        if (is_array($client) && isset($client['ID_Utilisateur'])) {
            session_start();
            $_SESSION['client'] = $client;
            header('Location: /cars-clash/client/accueil?idClient=' . $client['ID_Utilisateur']);
            exit();
        } else if ($client === 'En attente') {
            header('Location: /cars-clash/client/login?failed=3');
        } else if ($client === 'bloque') {
            header('Location: /cars-clash/client/login?failed=2');
        } else {
            header('Location: /cars-clash/client/login?failed=1');
        }
    }

    public function handleRegister()
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe'];
        $dateNaissance = $_POST['dateNaissance'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $model = new GestionLoginModel();
        $client = $model->register($nom, $prenom, $sexe, $dateNaissance, $email, $password);
        if ($client === 'success') {
            header('Location: /cars-clash/client/login');
        } else {
            header('Location: /cars-clash/client/register');
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

    public function handleGotoRegisterPage()
    {
        header('Location: /cars-clash/client/register');
        exit();
    }
    public function handleGotoLoginPage()
    {
        header('Location: /cars-clash/client/login');
        exit();
    }

    public function showPageLogin($failed)
    {
        $view = new PageLoginView();
        $view->showPageLogin($failed);
    }

    public function showPageRegister()
    {
        $view = new PageRegisterView();
        $view->showPageRegister();
    }
}
