<?php
require_once 'Views/PageMarquesView.php';
require_once 'Models/GestionMarquesModel.php';
class GestionMarquesController
{

    public function getMarqueById($id)
    {
        $model = new GestionMarquesModel();
        $result = $model->getMarqueById($id);
        return $result;
    }

    public function getAllMarques()
    {
        $model = new GestionMarquesModel();
        $result = $model->getAllMarques();
        return $result;
    }

    public function showPageMarques()
    {
        $view = new PageMarquesView();
        $view->showPageMarques();
    }
}
