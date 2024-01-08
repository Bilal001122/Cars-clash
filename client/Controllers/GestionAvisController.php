<?php

require_once 'Models/GestionAvisModel.php';
require_once 'Views/PageAvisView.php';
class GestionAvisController
{

    public function getThreeAvis($idVehicule)
    {
        $model = new GestionAvisModel();
        $result = $model->getThreeAvis($idVehicule);
        return $result;
    }

    public function getAvisMoyenne($idVehicule)
    {
        $model = new GestionAvisModel();
        $result = $model->getAvisMoyenne($idVehicule);
        return $result;
    }

    public function getAllAvis($idVehicule)
    {
        $model = new GestionAvisModel();
        $result = $model->getAllAvis($idVehicule);
        return $result;
    }

    public function showPageAvis()
    {
        if (isset($_SESSION['client'])) {
            $view = new PageAvisView();
            $view->showPageAvis();
        } else {
            header('Location: /cars-clash/client/login');
        }

    }

}
