<?php

require_once 'Views/PageGuideAchatView.php';
require_once 'Models/GestionGuideAchatModel.php';
class GestionGuideAchatController
{

    public function getAllGuideAchat()
    {
        $model = new GestionGuideAchatModel();
        $allAvis = $model->getAllGuideAchat();
        return $allAvis;
    }

    public function getAllVehicules()
    {
        $model = new GestionGuideAchatModel();
        $allVehicules = $model->getAllVehicules();
        return $allVehicules;
    }

    public function showPageGuideAchat()
    {
        if (isset($_SESSION['client'])) {
            $view = new PageGuideAchatView();
            $view->showPageGuideAchat();
        } else {
            header('Location: /cars-clash/client/login');
        }
    }

}
