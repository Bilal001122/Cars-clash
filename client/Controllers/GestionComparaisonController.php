<?php
require_once 'Views/PageComparaisonView.php';
require_once 'Views/PageComparaison2View.php';
require_once 'Models/GestionComparaisonModel.php';
class GestionComparaisonController
{

    public function compareTwoVehicules($marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2)
    {
        $gestionComparaisonModel = new GestionComparaisonModel();
        $gestionComparaisonModel->compareTwoVehicules($marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2);
    }

    public function getVehicule($marque, $modele, $version, $annee)
    {
        $gestionComparaisonModel = new GestionComparaisonModel();
        $vehicule = $gestionComparaisonModel->getVehicule($marque, $modele, $version, $annee);
        return $vehicule;
    }

    public function handleGotoPageComparaison($idClient, $marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2)
    {
        header('Location: comparaison2?idClient=' . $idClient . '&marque_1=' . $marque_1 . '&modele_1=' . $modele_1 . '&version_1=' . $version_1 . '&annee_1=' . $annee_1 . '&marque_2=' . $marque_2 . '&modele_2=' . $modele_2 . '&version_2=' . $version_2 . '&annee_2=' . $annee_2);
    }

    public function showPageComparaison()
    {
        $pageComparaisonView = new PageComparaisonView();
        $pageComparaisonView->showPageComparaison();
    }

    public function showPageComparaison2()
    {
        $pageComparaisonView = new PageComparaison2View();
        $pageComparaisonView->showPageComparaison2();
    }
}
