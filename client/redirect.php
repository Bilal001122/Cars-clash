<?php

require_once 'Controllers/GestionLoginController.php';
require_once 'Controllers/GestionAccueilController.php';
require_once 'Controllers/GestionNewsController.php';

require_once 'Controllers/GestionMarquesController.php';

session_start();
if (isset($_POST['login'])) {
    $loginController = new GestionLoginController();
    $loginController->handleLogin();
}

if (isset($_POST['logout'])) {
    $loginController = new GestionLoginController();
    $loginController->handleLogout();
}

if (isset($_POST['goto-page-marque'])) {
    if (isset($_POST['idMarque'])) {
        $idMarque = $_POST['idMarque'];
    }
    if (isset($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
    }
    if (isset($_POST['isFromAvis'])) {
        $isFromAvis = $_POST['isFromAvis'];
    }
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageMarque($idMarque, $idClient, $isFromAvis);
}

if (isset($_POST['goto-page-marques'])) {

    if (isset($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
    }
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageMarques($idClient);
}

if (isset($_POST['goto-page-news'])) {

    if (isset($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
    }
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageNews($idClient);
}

if (isset($_POST['goto-page-news-odd'])) {
    if (isset($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
    }
    if (isset($_POST['idNews'])) {
        $idNews = $_POST['idNews'];
    }
    $newsController = new GestionNewsController();
    $newsController->handleGotoPageNewsOdd($idClient, $idNews);
}

if (isset($_POST['add-to-fav'])) {
    if (isset($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
    }
    if (isset($_POST['idVehicule'])) {
        $idVehicule = $_POST['idVehicule'];
    }
    if (isset($_POST['idMarque'])) {
        $idMarque = $_POST['idMarque'];
    }
    if (isset($_POST['goto-cars-details'])) {
        $bool = $_POST['goto-cars-details'];
    }
    if (isset($_POST['URL'])) {
        $baseURL = $_POST['URL'];
    }
    $marqueController = new GestionMarquesController();
    if (preg_match('/guide-achat/', $baseURL)) {
        $marqueController->handleAddToFav($idClient, $idVehicule, $idMarque, 0, true);
    } else {
        $marqueController->handleAddToFav($idClient, $idVehicule, $idMarque, $bool, false);
    }
}

if (isset($_POST['remove-from-fav'])) {
    if (isset($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
    }
    if (isset($_POST['idVehicule'])) {
        $idVehicule = $_POST['idVehicule'];
    }
    if (isset($_POST['idMarque'])) {
        $idMarque = $_POST['idMarque'];
    }
    if (isset($_POST['goto-cars-details'])) {
        $bool = $_POST['goto-cars-details'];
    }
    if (isset($_POST['URL'])) {
        $baseURL = $_POST['URL'];
    }
    $marqueController = new GestionMarquesController();
    if (preg_match('/guide-achat/', $baseURL)) {$marqueController->handleRemoveFromFav($idClient, $idVehicule, $idMarque, 0, true);
    } else {
        $marqueController->handleRemoveFromFav($idClient, $idVehicule, $idMarque, $bool, false);
    }
}

if (isset($_POST['show-car-details'])) {
    if (isset($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
    }
    if (isset($_POST['idVehicule'])) {
        $idVehicule = $_POST['idVehicule'];
    }
    if (isset($_POST['idMarque'])) {
        $idMarque = $_POST['idMarque'];
    }
    $isFromAvis = $_POST['isFromAvis'];
    $marqueController = new GestionMarquesController();
    $marqueController->handleShowCarDetails($idClient, $idVehicule, $idMarque, $isFromAvis);
}

if (isset($_POST['add-note'])) {
    if (isset($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
    }
    if (isset($_POST['idVehicule'])) {
        $idVehicule = $_POST['idVehicule'];
    }
    if (isset($_POST['idMarque'])) {
        $idMarque = $_POST['idMarque'];
    }
    $note = $_POST['note'];
    $marqueController = new GestionMarquesController();
    $marqueController->handleAddNoteToCar($idClient, $idVehicule, $idMarque, $note);
}

if (isset($_POST['add-avis'])) {
    if (isset($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
    }
    if (isset($_POST['idVehicule'])) {
        $idVehicule = $_POST['idVehicule'];
    }
    if (isset($_POST['idMarque'])) {
        $idMarque = $_POST['idMarque'];
    }
    $avis = $_POST['avis'];
    $marqueController = new GestionMarquesController();
    $marqueController->handleAddAvisToCar($idClient, $idVehicule, $idMarque, $avis);
}

if (isset($_POST['goto-page-avis'])) {
    $idClient = $_POST['idClient'];
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageAvis($idClient);
}

if (isset($_POST['goto-page-guide-achat'])) {
    $idClient = $_POST['idClient'];
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageGuideAchat($idClient);
}
