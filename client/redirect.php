<?php

require_once 'Controllers/GestionLoginController.php';
require_once 'Controllers/GestionAccueilController.php';
require_once 'Controllers/GestionNewsController.php';
require_once 'Controllers/GestionMarquesController.php';
require_once 'Controllers/GestionComparaisonController.php';

session_start();
if (isset($_POST['login'])) {
    $loginController = new GestionLoginController();
    $loginController->handleLogin();
}

if (isset($_POST['register'])) {
    $loginController = new GestionLoginController();
    $loginController->handleRegister();
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
    } else if (preg_match('/user-profil/', $baseURL)) {
        $marqueController->handleAddToFav($idClient, $idVehicule, $idMarque, 0, true, true);
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
    } else if (preg_match('/user-profil/', $baseURL)) {
        $marqueController->handleRemoveFromFav($idClient, $idVehicule, $idMarque, 0, true, true);
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
    if (isset($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
    }
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageAvis($idClient);
}

if (isset($_POST['goto-page-guide-achat'])) {
    if (isset($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
    }
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageGuideAchat($idClient);
}

if (isset($_POST['goto-page-contacts'])) {
    if (isset($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
    }
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageContacts($idClient);
}

if (isset($_POST['goto-register-page'])) {
    $loginController = new GestionLoginController();
    $loginController->handleGotoRegisterPage();
}

if (isset($_POST['goto-page-login'])) {
    $loginController = new GestionLoginController();
    $loginController->handleGotoLoginPage();
}

if (isset($_POST['goto-page-accueil'])) {
    if (isset($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
    }
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageAccueil($idClient);
}

if (isset($_POST['goto-page-comparaison'])) {
    if (isset($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
    }
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageComparaison($idClient);
}

if (isset($_POST['demarer-comparaison'])) {
    if (!empty($_POST['idClient']) && !empty($_POST['marque_1'])
        && !empty($_POST['modele_1']) && !empty($_POST['version_1']) && !empty($_POST['annee_1']) && !empty($_POST['marque_2']) && !empty($_POST['modele_2']) && !empty($_POST['version_2']) && !empty($_POST['annee_2']) && !empty($_POST['marque_3']) && !empty($_POST['modele_3']) && !empty($_POST['version_3']) && !empty($_POST['annee_3']) && !empty($_POST['marque_4']) && !empty($_POST['modele_4']) && !empty($_POST['version_4']) && !empty($_POST['annee_4'])) {
        $idClient = $_POST['idClient'];
        $marque_1 = $_POST['marque_1'];
        $modele_1 = $_POST['modele_1'];
        $version_1 = $_POST['version_1'];
        $annee_1 = $_POST['annee_1'];
        $marque_2 = $_POST['marque_2'];
        $modele_2 = $_POST['modele_2'];
        $version_2 = $_POST['version_2'];
        $annee_2 = $_POST['annee_2'];
        $marque_3 = $_POST['marque_3'];
        $modele_3 = $_POST['modele_3'];
        $version_3 = $_POST['version_3'];
        $annee_3 = $_POST['annee_3'];
        $marque_4 = $_POST['marque_4'];
        $modele_4 = $_POST['modele_4'];
        $version_4 = $_POST['version_4'];
        $annee_4 = $_POST['annee_4'];
        $comparaisonController = new GestionComparaisonController();
        $comparaisonController->handleGotoPageComparaison4($idClient, $marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2, $marque_3, $modele_3, $version_3, $annee_3, $marque_4, $modele_4, $version_4, $annee_4);
    } else if (!empty($_POST['idClient']) && !empty($_POST['marque_1'])
        && !empty($_POST['modele_1']) && !empty($_POST['version_1']) && !empty($_POST['annee_1']) && !empty($_POST['marque_2']) && !empty($_POST['modele_2']) && !empty($_POST['version_2']) && !empty($_POST['annee_2']) && !empty($_POST['marque_3']) && !empty($_POST['modele_3']) && !empty($_POST['version_3']) && !empty($_POST['annee_3']) && (empty($_POST['marque_4']) || empty($_POST['modele_4']) || empty($_POST['version_4']) || empty($_POST['annee_4']))) {
        $idClient = $_POST['idClient'];
        $marque_1 = $_POST['marque_1'];
        $modele_1 = $_POST['modele_1'];
        $version_1 = $_POST['version_1'];
        $annee_1 = $_POST['annee_1'];
        $marque_2 = $_POST['marque_2'];
        $modele_2 = $_POST['modele_2'];
        $version_2 = $_POST['version_2'];
        $annee_2 = $_POST['annee_2'];
        $marque_3 = $_POST['marque_3'];
        $modele_3 = $_POST['modele_3'];
        $version_3 = $_POST['version_3'];
        $annee_3 = $_POST['annee_3'];
        $comparaisonController = new GestionComparaisonController();
        $comparaisonController->handleGotoPageComparaison3($idClient, $marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2, $marque_3, $modele_3, $version_3, $annee_3);
    } else if (!empty($_POST['idClient']) && !empty($_POST['marque_1'])
        && !empty($_POST['modele_1']) && !empty($_POST['version_1']) && !empty($_POST['annee_1']) && !empty($_POST['marque_2']) && !empty($_POST['modele_2']) && !empty($_POST['version_2']) && !empty($_POST['annee_2']) && (empty($_POST['marque_3']) || empty($_POST['modele_3']) || empty($_POST['version_3']) || empty($_POST['annee_3']) || empty($_POST['marque_4']) || empty($_POST['modele_4']) || empty($_POST['version_4']) || empty($_POST['annee_4']))) {
        $idClient = $_POST['idClient'];
        $marque_1 = $_POST['marque_1'];
        $modele_1 = $_POST['modele_1'];
        $version_1 = $_POST['version_1'];
        $annee_1 = $_POST['annee_1'];
        $marque_2 = $_POST['marque_2'];
        $modele_2 = $_POST['modele_2'];
        $version_2 = $_POST['version_2'];
        $annee_2 = $_POST['annee_2'];
        $comparaisonController = new GestionComparaisonController();
        $comparaisonController->handleGotoPageComparaison2($idClient, $marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2);
    }
}

if (isset($_POST['user-profil'])) {
    if (isset($_POST['idClient'])) {
        $idClient = $_POST['idClient'];
    }
    $accueilController = new GestionAccueilController();
    $accueilController->handleGotoPageUserProfil($idClient);
}
