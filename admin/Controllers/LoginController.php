<?php
require_once 'Models/LoginModel.php';
class LoginController
{
    public function login($email, $password)
    {
        $model = new LoginModel();
        if ($model->login($email, $password)) {
            echo "
            <script>
                alert('Connexion réussie');
            </script>
            ";
            header('Location: index.php');
            return true;
        } else {
            echo "
            <script>
                alert('Connexion échouée');
            </script>
            ";
            return false;
        }
    }
}
