<?php

require_once 'Models/GestionAvisModel.php';
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

}
