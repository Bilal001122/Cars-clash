<?php
require_once 'Views/PageMarqueView.php';
require_once 'Views/PageMarquesView.php';
require_once 'Models/GestionMarquesModel.php';

class GestionMarquesController
{

    public function getMarque($idMarque)
    {
        $model = new GestionMarquesModel();
        $result = $model->getMarque($idMarque);
        return $result;
    }

    public function getAllVehicules($idMarque)
    {
        $model = new GestionMarquesModel();
        $result = $model->getAllVehicules($idMarque);
        return $result;
    }

    public function getFourVehicules($idMarque)
    {
        $model = new GestionMarquesModel();
        $result = $model->getFourVehicules($idMarque);
        return $result;
    }

    public function showPageMarque($idMarque)
    {
        $view = new PageMarqueView();
        $view->showPageMarque($idMarque);
    }

    public function showPageMarques()
    {
        $view = new PageMarquesView();
        $view->showPageMarques();
    }
}
