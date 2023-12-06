<?php
if (isset($_GET['view'])) {
    $view = $_GET['view'];
    switch ($view) {
        case 'VehiculesMarquesView.php':
            require_once 'Views/VehiculesMarquesView.php';
            $vehiculesMarquesView = new VehiculesMarquesView();
            $vehiculesMarquesView->vehiculesMarques();
            break;
        case 'AvisView.php':
            require_once 'Views/AvisView.php';
            $avisView = new AvisView();
            $avisView->avis();
            break;

        case 'NewsView.php':
            require_once 'Views/NewsView.php';
            $newsView = new NewsView();
            $newsView->news();
            break;

        case 'UtilisateurView.php':
            require_once 'Views/UtilisateurView.php';
            $utilisateurView = new UtilisateurView();
            $utilisateurView->utilisateur();
            break;

        case 'ParametresView.php':
            require_once 'Views/ParametresView.php';
            $parametresView = new ParametresView();
            $parametresView->parametres();
            break;
        default:
            echo 'La vue demandée n\'existe pas.';
            break;
    }
}

if (isset($_GET['logout'])) {
    session_start();
    unset($_SESSION['Email']);
    session_destroy();
    header('Location: index.php');

}
