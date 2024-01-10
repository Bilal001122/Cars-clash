<?php
require_once 'Controllers/GestionLoginController.php';
require_once 'Controllers/GestionMarquesController.php';
require_once 'Controllers/GestionVehiculesController.php';
require_once 'Controllers/GestionUtilisateursController.php';
require_once 'Controllers/GestionAvisController.php';
require_once 'Controllers/GestionNewsController.php';
require_once 'Controllers/GestionParamsController.php';

session_start();

if (isset($_POST['login'])) {
    $loginController = new GestionLoginController();
    $loginController->handleLogin();
}

if (isset($_POST['logout'])) {
    $loginController = new GestionLoginController();
    $loginController->handleLogout();
}

if (isset($_POST['goto-modifier-marque'])) {
    $marqueController = new GestionMarquesController();
    $marqueController->handleGotoEditMarque();
}

if (isset($_POST['modifier-marque'])) {
    $idMarque = $_POST['id-marque'];
    $marqueController = new GestionMarquesController();
    $marqueController->handleEditMarque($idMarque);
}

if (isset($_POST['supprimer-marque'])) {
    $idMarque = $_POST['ID_Marque'];
    $marqueController = new GestionMarquesController();
    $marqueController->handleDeleteMarque($idMarque);
}

if (isset($_POST['goto-ajouter-marque'])) {
    $marqueController = new GestionMarquesController();
    $marqueController->handleGotoAddMarque();
}

if (isset($_POST['add-marque'])) {
    $marqueController = new GestionMarquesController();
    $marqueController->handleAddMarque();
}

if (isset($_POST['goto-modifier-vehicule'])) {
    $vehiculeController = new GestionVehiculesController();
    $vehiculeController->handleGotoEditVehicule();
}

if (isset($_POST['modifier-vehicule'])) {
    $idVehicule = $_POST['id-vehicule'];
    $vehiculeController = new GestionVehiculesController();
    $vehiculeController->handleEditVehicule($idVehicule);
}

if (isset($_POST['supprimer-vehicule'])) {
    $idVehicule = $_POST['ID_Vehicule'];
    $vehiculeController = new GestionVehiculesController();
    $vehiculeController->handleDeleteVehicule($idVehicule);
}

if (isset($_POST['goto-details-vehicule'])) {
    $vehiculeController = new GestionVehiculesController();
    $vehiculeController->handleGotoDetailsVehicule();
}

if (isset($_POST['goto-ajouter-vehicule'])) {
    $vehiculeController = new GestionVehiculesController();
    $vehiculeController->handleGotoAddVehicule();
}

if (isset($_POST['add-vehicule'])) {
    $vehiculeController = new GestionVehiculesController();
    $vehiculeController->handleAddVehicule();
}

if (isset($_POST['valider-user'])) {
    $userController = new GestionUtilisateurController();
    $userController->handleValiderUser();
}

if (isset($_POST['bloquer-user'])) {
    $userController = new GestionUtilisateurController();
    $userController->handleBloquerUser();
}

if (isset($_POST['valider-commentaire'])) {
    $avisController = new GestionAvisController();
    $avisController->handleValiderCommentaire();
}

if (isset($_POST['bloquer-user-from-avis'])) {
    $avisController = new GestionAvisController();
    $avisController->handleBloquerUserFromAvis();
}

if (isset($_POST['refuser-commentaire'])) {
    $avisController = new GestionAvisController();
    $avisController->handleRefuserAvis();
}

if (isset($_POST['goto-modifier-news'])) {
    $avisController = new GestionNewsController();
    $avisController->handleGotoEditNews();
}

if (isset($_POST['modifier-news'])) {
    $idNews = $_POST['id-news'];
    $avisController = new GestionNewsController();
    $avisController->handleEditNews($idNews);
}

if (isset($_POST['supprimer-news'])) {
    $idNews = $_POST['ID_News'];
    $avisController = new GestionNewsController();
    $avisController->handleDeleteNews($idNews);
}

if (isset($_POST['goto-ajouter-news'])) {
    $avisController = new GestionNewsController();
    $avisController->handleGotoAddNews();
}

if (isset($_POST['ajouter-news'])) {
    $avisController = new GestionNewsController();
    $avisController->handleAddNews();
}

if (isset($_POST['goto-guide-achat'])) {
    $paramsController = new GestionParamsController();
    $paramsController->handleGotoGuideAchat();
}

if (isset($_POST['goto-contacts'])) {
    $paramsController = new GestionParamsController();
    $paramsController->handleGotoContacts();
}

if (isset($_POST['goto-modifier-guide'])) {
    $idGuide = $_POST['ID_Guide'];
    $paramsController = new GestionParamsController();
    $paramsController->handleGotoEditGuide($idGuide);
}

if (isset($_POST['modifier-guide'])) {
    $idGuide = $_POST['id-guide'];
    $paramsController = new GestionParamsController();
    $paramsController->handleEditGuide($idGuide);
}

if (isset($_POST['supprimer-guide'])) {
    $idGuide = $_POST['ID_Guide'];
    $paramsController = new GestionParamsController();
    $paramsController->handleDeleteGuide($idGuide);
}

if (isset($_POST['goto-ajouter-guide'])) {
    $paramsController = new GestionParamsController();
    $paramsController->handleGotoAddGuide();
}

if (isset($_POST['ajouter-guide'])) {
    $paramsController = new GestionParamsController();
    $paramsController->handleAddGuide();
}

if (isset($_POST['goto-diaporama'])) {
    $paramsController = new GestionParamsController();
    $paramsController->handleGotoDiaporama();
}

if (isset($_POST['goto-modifier-diapo'])) {
    $idDiapo = $_POST['ID_Image'];
    $paramsController = new GestionParamsController();
    $paramsController->handleGotoEditDiaporama($idDiapo);
}

if (isset($_POST['modifier-diapo'])) {
    $idDiapo = $_POST['id-diapo'];
    $paramsController = new GestionParamsController();
    $paramsController->handleEditDiaporama($idDiapo);
}

if (isset($_POST['supprimer-diapo'])) {
    $idDiapo = $_POST['ID_Image'];
    $paramsController = new GestionParamsController();
    $paramsController->handleDeleteDiaporama($idDiapo);
}

if (isset($_POST['goto-ajouter-diapo'])) {
    $paramsController = new GestionParamsController();
    $paramsController->handleGotoAddDiaporama();
}

if (isset($_POST['ajouter-diapo'])) {
    $paramsController = new GestionParamsController();
    $paramsController->handleAddDiaporama();
}

if (isset($_POST['goto-ajouter-contact'])) {
    $paramsController = new GestionParamsController();
    $paramsController->handleGotoAddContact();
}

if (isset($_POST['ajouter-contact'])) {
    $paramsController = new GestionParamsController();
    $paramsController->handleAddContact();
}

if (isset($_POST['goto-modifier-contact'])) {
    $idContact = $_POST['ID_Contact'];
    $paramsController = new GestionParamsController();
    $paramsController->handleGotoEditContact($idContact);
}
