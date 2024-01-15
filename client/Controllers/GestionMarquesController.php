<?php
require_once 'Views/PageMarqueView.php';
require_once 'Views/PageMarquesView.php';
require_once 'Views/PageCarDetailsView.php';
require_once 'Models/GestionMarquesModel.php';

class GestionMarquesController
{

    public function getMarque($idMarque)
    {
        $model = new GestionMarquesModel();
        $result = $model->getMarque($idMarque);
        return $result;
    }

    public function getVehicule($idVehicule)
    {
        $model = new GestionMarquesModel();
        $result = $model->getVehicule($idVehicule);
        return $result;
    }

    public function getVehiculeForTopThree($idVehicule)
    {
        $model = new GestionMarquesModel();
        $result = $model->getVehiculeForTopThree($idVehicule);
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

    public function getMarqueByIdVehicule($idVehicule)
    {
        $model = new GestionMarquesModel();
        $result = $model->getMarqueByIdVehicule($idVehicule);
        return $result;
    }

    public function getNoteMoyenneMarque($idMarque)
    {
        $model = new GestionMarquesModel();
        $result = $model->getNoteMoyenneMarque($idMarque);
        return $result;
    }

    public function verifyIfFavoris($idVehicule)
    {
        $idClient = $_GET['idClient'];
        $model = new GestionMarquesModel();
        $result = $model->verifyIfFavoris($idVehicule, $idClient);
        return $result;
    }

    public function getFavoris($idClient)
    {
        $model = new GestionMarquesModel();
        $result = $model->getFavoris($idClient);
        return $result;
    }

    public function handleAddNoteToMarque($idClient, $idMarque, $note)
    {
        $model = new GestionMarquesModel();
        $model->handleAddNoteToMarque($idClient, $idMarque, $note);
        header("Location: ./marque?idClient=$idClient&idMarque=$idMarque");
    }

    public function handleAddToFav($idClient, $idVehicule = 0, $idMarque = 0, $bool = 0, $isFromGuideAchat = false, $isFromFavorites = false)
    {
        $model = new GestionMarquesModel();
        $model->handleAddToFav($idClient, $idVehicule);

        if ($bool == 1) {
            header("Location: ./car-details?idClient=$idClient&idMarque=$idMarque&idVehicule=$idVehicule#card_details_for_car");
        } else if ($isFromGuideAchat) {
            header("Location: ./guide-achat?idClient=$idClient#vehicules-carousel");
        } else if ($isFromFavorites) {
            header("Location: ./user-profil?idClient=$idClient#vehicules-carousel");
        } else {
            header("Location: ./marque?idClient=$idClient&idMarque=$idMarque#principales_vehicules");
        }
    }

    public function handleRemoveFromFav($idClient, $idVehicule = 0, $idMarque = 0, $bool = 0, $isFromGuideAchat = false, $isFromFavorites = false)
    {
        $model = new GestionMarquesModel();
        $model->handleRemoveFromFav($idClient, $idVehicule);
        if ($bool == 1) {
            header("Location: ./car-details?idClient=$idClient&idMarque=$idMarque&idVehicule=$idVehicule#card_details_for_car");
        } else if ($isFromFavorites) {
            header("Location: ./user-profil?idClient=$idClient#vehicules-carousel");
        } else if ($isFromGuideAchat) {
            header("Location: ./guide-achat?idClient=$idClient#vehicules-carousel");
        } else {
            header("Location: ./marque?idClient=$idClient&idMarque=$idMarque#principales_vehicules");
        }
    }

    public function handleShowCarDetails($idClient, $idVehicule, $idMarque, $isFromAvis)
    {
        if ($isFromAvis == "true") {
            header("Location: ./car-details?idClient=$idClient&idMarque=$idMarque&idVehicule=$idVehicule&isFromAvis=$isFromAvis");
        } else {
            header("Location: ./car-details?idClient=$idClient&idMarque=$idMarque&idVehicule=$idVehicule");
        }
    }

    public function handleAddNoteToCar($idClient, $idVehicule, $idMarque, $note)
    {
        $model = new GestionMarquesModel();
        $model->handleAddNoteToCar($idClient, $idVehicule, $note);
        header("Location: ./car-details?idClient=$idClient&idMarque=$idMarque&idVehicule=$idVehicule");
    }

    public function handleAddAvisToCar($idClient, $idVehicule, $idMarque, $avis)
    {
        $model = new GestionMarquesModel();
        $model->handleAddAvisToCar($idClient, $idVehicule, $avis);
        header("Location: ./car-details?idClient=$idClient&idMarque=$idMarque&idVehicule=$idVehicule");
    }

    public function showPageMarques()
    {
        if (isset($_SESSION['client'])) {
            $view = new PageMarquesView();
            $view->showPageMarques();
        } else {
            header('Location: /cars-clash/client/login');
        }

    }

    public function showPageMarque($idMarque)
    {
        if (isset($_SESSION['client'])) {
            $view = new PageMarqueView();
            $view->showPageMarque($idMarque);
        } else {
            header('Location: /cars-clash/client/login');
        }

    }

    public function showPageCarDetails($idClient, $idMarque, $idVehicule)
    {
        if (isset($_SESSION['client'])) {
            $view = new PageCarDetailsView();
            $view->showPageCarDetails($idClient, $idMarque, $idVehicule);
        } else {
            header('Location: /cars-clash/client/login');
        }
    }

    public function getOptionsMarque($selectedMarque)
    {
        $model = new GestionMarquesModel();
        $modeles = $model->getOptionsMarque($selectedMarque);
        return $modeles;

    }

}
