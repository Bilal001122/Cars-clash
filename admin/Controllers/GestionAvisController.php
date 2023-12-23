<?php
require_once 'Views/PageAvisView.php';
require_once 'Models/GestionAvisModel.php';
class GestionAvisController
{

    public function getAllAvis()
    {
        $model = new GestionAvisModel();
        $allAvis = $model->getAllAvis();
        return $allAvis;
    }

    public function handleValiderCommentaire()
    {
        $idAvis = $_POST['ID_Avis'];
        $model = new GestionAvisModel();
        $model->validerCommentaire($idAvis);
        header('Location: ./gestion-avis');
    }

    public function handleRefuserAvis()
    {
        $idAvis = $_POST['ID_Avis'];
        $model = new GestionAvisModel();
        $model->refuserAvis($idAvis);
        header('Location: ./gestion-avis');
    }

    public function handleBloquerUserFromAvis()
    {
        $idUser = $_POST['ID_User'];
        $model = new GestionAvisModel();
        $model->bloquerUserFromAvis($idUser);
        header('Location: ./gestion-avis');
    }

    public function showPageAvis()
    {
        if (isset($_SESSION['admin'])) {
            $view = new PageAvisView();
            $view->showPageAvis();
        } else {
            header('Location: /cars-clash/admin/login');
        }
    }
}
