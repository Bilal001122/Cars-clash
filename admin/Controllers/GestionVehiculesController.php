<?php
require_once 'Views/PageVehiculesView.php';
require_once 'Views/PageEditVehiculeView.php';
require_once 'Models/GestionVehiculesModel.php';
class GestionVehiculesController
{

    public function getVehiculeById()
    {
        $model = new GestionVehiculesModel();
        $idVehicule = $_GET['idVehicule'];
        $result = $model->getVehiculeById($idVehicule);
        return $result;
    }

    public function getAllVehicules()
    {
        $model = new GestionVehiculesModel();
        $result = $model->getAllVehicules();
        return $result;
    }

    public function handleGotoEditVehicule()
    {
        $idVehicule = $_POST['ID_Vehicule'];
        header("Location: ./edit-vehicule?idVehicule={$idVehicule}");
    }

    public function showPageEditVehicule($idVehicule)
    {
        $view = new PageEditVehiculeView();
        $view->showPageEditVehicule($idVehicule);
    }

    public function showPageVehicule()
    {
        $view = new PageVehiculesView();
        $view->showPageVehicule();
    }
}
