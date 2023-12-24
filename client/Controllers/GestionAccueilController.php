<?php
require_once 'Views/PageAccueilView.php';
require_once 'Models/GestionAccueilModel.php';
class GestionAccueilController
{

    public function getClient($idClient)
    {
        $model = new GestionAccueilModel();
        $client = $model->getClient($idClient);
        return $client;
    }

    public function getAllDiaporama()
    {
        $model = new GestionAccueilModel();
        $diaporama = $model->getAllDiaporama();
        return $diaporama;
    }

    public function showPageAccueil()
    {
        if (isset($_SESSION['client'])) {
            $view = new PageAccueilView();
            $view->showPageAccueil();
        } else {
            header('Location: /cars-clash/client/login');
        }
    }
}
