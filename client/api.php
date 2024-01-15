<?php
require_once 'Controllers/GestionComparaisonController.php';

if (isset($_POST['marque']) && isset($_POST['modele']) && isset($_POST['version'])) {
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $version = $_POST['version'];
    $gestionComparaisonController = new GestionComparaisonController();
    $annees = $gestionComparaisonController->getOptionsVersion($marque, $modele, $version);
    echo json_encode($annees);
} else if (isset($_POST['marque']) && isset($_POST['modele'])) {
    $marque = $_POST['marque'];
    $modele = $_POST['modele'];
    $gestionComparaisonController = new GestionComparaisonController();
    $versions = $gestionComparaisonController->getOptionsModele($marque, $modele);
    echo json_encode($versions);
} else if (isset($_POST['marque'])) {
    $marque = $_POST['marque'];
    $gestionComparaisonController = new GestionComparaisonController();
    $modeles = $gestionComparaisonController->getOptionsMarque($marque);
    echo json_encode($modeles);
}
