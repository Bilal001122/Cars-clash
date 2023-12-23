<?php
require_once 'Views/PageVehiculesView.php';
require_once 'Views/PageEditVehiculeView.php';
require_once 'Views/PageDetailsVehiculeView.php';
require_once 'Views/PageAddVehiculeView.php';
require_once 'Models/GestionVehiculesModel.php';
class GestionVehiculesController
{

    public function getVehiculeById()
    {
        $model = new GestionVehiculesModel();
        $idVehicule = $_GET['idVehicule'];
        $result = $model->getVehiculeById($idVehicule);
        return $result;
    }

    public function getAllVehicules()
    {
        $model = new GestionVehiculesModel();
        $result = $model->getAllVehicules();
        return $result;
    }

    public function handleGotoEditVehicule()
    {
        $idVehicule = $_POST['ID_Vehicule'];
        header("Location: ./edit-vehicule?idVehicule={$idVehicule}");
    }

    public function handleGotoDetailsVehicule()
    {
        $idVehicule = $_POST['ID_Vehicule'];
        header("Location: ./details-vehicule?idVehicule={$idVehicule}");
    }

    public function handleGotoAddVehicule()
    {
        header("Location: ./add-vehicule");
    }

    public function handleAddVehicule()
    {
        $modele = $_POST['vehicule_modele'];
        $version = $_POST['vehicule_version'];
        $annee = $_POST['vehicule_annee'];
        $dimensions = $_POST['vehicule_dimensions'];
        $consommation = $_POST['vehicule_consommation'];
        $moteur = $_POST['vehicule_moteur'];
        $performance = $_POST['vehicule_performance'];
        $prix = $_POST['vehicule_prix'];
        $idMarque = $_POST['vehicule_marque'];
        if (isset($_FILES["vehicule_image"])) {
            $imageVehicule = $_FILES['vehicule_image'];
        }
        // uploader le ficher de l'image
        if ($imageVehicule["error"] == 0) {
            $r = explode(".", $imageVehicule["name"]);
            $imageVehiculeName = $r[0];
            $imageVehiculeExt = strtolower(end($r));

            $tmpImage = $imageVehicule["tmp_name"];
            while (!is_uploaded_file($tmpImage)) {
                // attendre que le fichier soit uploadé
            }
            if (in_array($imageVehiculeExt, array('jpg', 'jpeg', 'png', 'mp4'))) {
                $imageDest = "../public/images/vehicules/" . $imageVehicule["name"];
                move_uploaded_file($tmpImage, $imageDest);
            }
            $imageVehiculeName = "/" . $imageVehiculeName;
        } else {
            $imageVehiculeName = null;
        }
        $model = new GestionVehiculesModel();
        $model->addVehicule($modele, $version, $annee, $dimensions, $consommation, $moteur, $performance, $prix, $imageVehiculeName, $idMarque);
        header("Location: ./gestion-vehicules");
    }

    public function handleEditVehicule($idVehicule)
    {
        $modele = $_POST['vehicule_modele'];
        $version = $_POST['vehicule_version'];
        $annee = $_POST['vehicule_annee'];
        $dimensions = $_POST['vehicule_dimensions'];
        $consommation = $_POST['vehicule_consommation'];
        $moteur = $_POST['vehicule_moteur'];
        $performance = $_POST['vehicule_performance'];
        $prix = $_POST['vehicule_prix'];
        $idMarque = $_POST['vehicule_marque'];

        if (isset($_FILES["vehicule_image"])) {
            $imageVehicule = $_FILES['vehicule_image'];
        }
        // uploader le ficher de l'image
        if ($imageVehicule["error"] == 0) {
            $r = explode(".", $imageVehicule["name"]);
            $imageVehiculeName = $r[0];
            $imageVehiculeExt = strtolower(end($r));

            $tmpImage = $imageVehicule["tmp_name"];
            while (!is_uploaded_file($tmpImage)) {
                // attendre que le fichier soit uploadé
            }
            if (in_array($imageVehiculeExt, array('jpg', 'jpeg', 'png', 'mp4'))) {
                $imageDest = "../public/images/vehicules/" . $imageVehicule["name"];
                move_uploaded_file($tmpImage, $imageDest);
            }
            $imageVehiculeName = "/" . $imageVehiculeName;
        } else {
            $model = new GestionVehiculesModel();
            $idVehicule = $_POST['id-vehicule'];
            $result = $model->getVehiculeById($idVehicule);
            $imageVehiculeName = $result['Image_vehicule'];
        }
        $model = new GestionVehiculesModel();
        $model->editVehicule($idVehicule, $modele, $version, $annee, $dimensions, $consommation, $moteur, $performance, $prix, $imageVehiculeName, $idMarque);
        header("Location: ./gestion-vehicules");
    }

    public function handleDeleteVehicule($idVehicule)
    {
        $model = new GestionVehiculesModel();
        $model->deleteVehicule($idVehicule);
        header("Location: ./gestion-vehicules");
    }

    public function showPageEditVehicule($idVehicule)
    {
        if (isset($_SESSION['admin'])) {
            $view = new PageEditVehiculeView();
            $view->showPageEditVehicule($idVehicule);
        } else {
            header('Location: /cars-clash/admin/login');
        }
    }

    public function showPageVehicule()
    {
        if (isset($_SESSION['admin'])) {
            $view = new PageVehiculesView();
            $view->showPageVehicule();
        } else {
            header('Location: /cars-clash/admin/login');
        }
    }

    public function showPageDetailsVehicule($idVehicule)
    {
        if (isset($_SESSION['admin'])) {
            $view = new PageDetailsVehiculeView();
            $view->showPageDetailsVehicule($idVehicule);
        } else {
            header('Location: /cars-clash/admin/login');
        }

    }

    public function showPageAddVehicule()
    {
        if (isset($_SESSION['admin'])) {
            $view = new PageAddVehiculeView();
            $view->showPageAddVehicule();} else {
            header('Location: /cars-clash/admin/login');
        }
    }
}
