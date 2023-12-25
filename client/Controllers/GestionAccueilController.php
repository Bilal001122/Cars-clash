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

    public function getFiveMarques()
    {
        $model = new GestionAccueilModel();
        $marques = $model->getFiveMarques();
        return $marques;
    }

    public function getMarques()
    {
        $model = new GestionAccueilModel();
        $marques = $model->getMarques();
        return $marques;
    }

    public function handleGotoPageMarque($idMarque, $idClient, $isFromAvis)
    {
        if ($isFromAvis == "true") {
            header('Location: /cars-clash/client/marque?idClient=' . $idClient . '&idMarque=' . $idMarque . '&isFromAvis=true');
        } else {
            header('Location: /cars-clash/client/marque?idClient=' . $idClient . '&idMarque=' . $idMarque . '');
        }
    }

    public function handleGotoPageMarques($idClient)
    {
        header('Location: /cars-clash/client/marques?idClient=' . $idClient . '');
    }

    public function handleGotoPageNews($idClient)
    {
        header('Location: /cars-clash/client/news?idClient=' . $idClient . '');
    }

    public function handleGotoPageAvis($idClient)
    {
        header('Location: /cars-clash/client/avis?idClient=' . $idClient . '');
    }

    public function handleGotoPageGuideAchat($idClient)
    {
        header('Location: /cars-clash/client/guide-achat?idClient=' . $idClient . '');
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
