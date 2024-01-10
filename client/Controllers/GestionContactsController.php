<?php

require_once 'Models/GestionContactsModel.php';
require_once 'Views/PageContactsView.php';

class GestionContactsController
{

    public function getAllContacts()
    {
        $model = new GestionContactsModel();
        $result = $model->getAllContacts();
        return $result;
    }

    public function showPageContacts()
    {
        if (isset($_SESSION['client'])) {
            $view = new PageContactsView();
            $view->showPageContacts();
        } else {
            header('Location: /cars-clash/client/login');
        }

    }

}