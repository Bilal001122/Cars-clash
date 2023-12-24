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
        $admin = $model->login($email, $password);
        if ($admin) {
            session_start();
            $_SESSION['admin'] = $admin;
            header('Location: /cars-clash/admin/gestion-vehicules');
            exit();
        } else {
            header('Location: /cars-clash/admin/login?failed=1');
        }
    }

    public function handleLogout()
    {
        unset($_SESSION['admin']);
        session_start();
        session_destroy();
        header('Location: /cars-clash/admin/');
        exit();
    }

    public function showPageLogin($failed)
    {
        $view = new PageLoginView();
        $view->showPageLogin($failed);
    }
}
