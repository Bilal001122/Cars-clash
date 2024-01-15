<?php
require_once 'Views/PageUtilisateurView.php';
require_once 'Models/GestionUtilisateursModel.php';
class GestionUtilisateurController
{

    public function handleValiderUser()
    {
        $idUtilisateur = $_POST['ID_User'];
        $model = new GestionUtilisateursModel();
        $model->validerUser($idUtilisateur);
        header('Location: ./gestion-utilisateurs');
    }

    public function handleBloquerUser()
    {
        $idUtilisateur = $_POST['ID_User'];
        $model = new GestionUtilisateursModel();
        $model->bloquerUser($idUtilisateur);
        header('Location: ./gestion-utilisateurs');
    }

    public function getAllUsers()
    {
        $model = new GestionUtilisateursModel();
        $allUsers = $model->getAllUsers();
        return $allUsers;
    }

    public function showPageUtilisateur()
    {
        $view = new PageUtilisateurView();
        $view->showPageUtilisateurs();

    }
}
