<?php
require_once 'Views/PageComparaisonView.php';
require_once 'Views/PageComparaison2View.php';
require_once 'Views/PageComparaison3View.php';
require_once 'Views/PageComparaison4View.php';
require_once 'Models/GestionComparaisonModel.php';
class GestionComparaisonController
{

    public function getTopThreeComparaison()
    {
        $gestionComparaisonModel = new GestionComparaisonModel();
        $topThreeComparaison = $gestionComparaisonModel->getTopThreeComparaison();
        return $topThreeComparaison;
    }

    public function compareTwoVehicules($marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2)
    {
        $gestionComparaisonModel = new GestionComparaisonModel();
        $gestionComparaisonModel->compareTwoVehicules($marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2);
    }

    public function compareThreeVehicules($marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2, $marque_3, $modele_3, $version_3, $annee_3)
    {
        $gestionComparaisonModel = new GestionComparaisonModel();
        $gestionComparaisonModel->compareThreeVehicules($marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2, $marque_3, $modele_3, $version_3, $annee_3);
    }

    public function compareFourVehicules($marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2, $marque_3, $modele_3, $version_3, $annee_3, $marque_4, $modele_4, $version_4, $annee_4)
    {
        $gestionComparaisonModel = new GestionComparaisonModel();
        $gestionComparaisonModel->compareFourVehicules($marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2, $marque_3, $modele_3, $version_3, $annee_3, $marque_4, $modele_4, $version_4, $annee_4);
    }

    public function getVehicule($marque, $modele, $version, $annee)
    {
        $gestionComparaisonModel = new GestionComparaisonModel();
        $vehicule = $gestionComparaisonModel->getVehicule($marque, $modele, $version, $annee);
        return $vehicule;
    }

    public function handleGotoPageComparaison2($idClient, $marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2)
    {
        header('Location: comparaison2?idClient=' . $idClient . '&marque_1=' . $marque_1 . '&modele_1=' . $modele_1 . '&version_1=' . $version_1 . '&annee_1=' . $annee_1 . '&marque_2=' . $marque_2 . '&modele_2=' . $modele_2 . '&version_2=' . $version_2 . '&annee_2=' . $annee_2);
    }

    public function handleGotoPageComparaison3($idClient, $marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2, $marque_3, $modele_3, $version_3, $annee_3)
    {
        header('Location: comparaison3?idClient=' . $idClient . '&marque_1=' . $marque_1 . '&modele_1=' . $modele_1 . '&version_1=' . $version_1 . '&annee_1=' . $annee_1 . '&marque_2=' . $marque_2 . '&modele_2=' . $modele_2 . '&version_2=' . $version_2 . '&annee_2=' . $annee_2 . '&marque_3=' . $marque_3 . '&modele_3=' . $modele_3 . '&version_3=' . $version_3 . '&annee_3=' . $annee_3);
    }

    public function handleGotoPageComparaison4($idClient, $marque_1, $modele_1, $version_1, $annee_1, $marque_2, $modele_2, $version_2, $annee_2, $marque_3, $modele_3, $version_3, $annee_3, $marque_4, $modele_4, $version_4, $annee_4)
    {
        header('Location: comparaison4?idClient=' . $idClient . '&marque_1=' . $marque_1 . '&modele_1=' . $modele_1 . '&version_1=' . $version_1 . '&annee_1=' . $annee_1 . '&marque_2=' . $marque_2 . '&modele_2=' . $modele_2 . '&version_2=' . $version_2 . '&annee_2=' . $annee_2 . '&marque_3=' . $marque_3 . '&modele_3=' . $modele_3 . '&version_3=' . $version_3 . '&annee_3=' . $annee_3 . '&marque_4=' . $marque_4 . '&modele_4=' . $modele_4 . '&version_4=' . $version_4 . '&annee_4=' . $annee_4);
    }

    public function showPageComparaison()
    {
        if (isset($_SESSION['client'])) {
            $pageComparaisonView = new PageComparaisonView();
            $pageComparaisonView->showPageComparaison();
        } else {
            header('Location: /cars-clash/client/login');
        }
    }

    public function showPageComparaison2()
    {
        if (isset($_SESSION['client'])) {
            $pageComparaisonView = new PageComparaison2View();
            $pageComparaisonView->showPageComparaison2();
        } else {
            header('Location: /cars-clash/client/login');
        }

    }

    public function showPageComparaison3()
    {
        if (isset($_SESSION['client'])) {
            $pageComparaisonView = new PageComparaison3View();
            $pageComparaisonView->showPageComparaison3();
        } else {
            header('Location: /cars-clash/client/login');
        }

    }

    public function showPageComparaison4()
    {
        if (isset($_SESSION['client'])) {
            $pageComparaisonView = new PageComparaison4View();
            $pageComparaisonView->showPageComparaison4();

        } else {
            header('Location: /cars-clash/client/login');
        }
    }
}
