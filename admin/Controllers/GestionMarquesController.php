<?php
require_once 'Views/PageMarquesView.php';
require_once 'Views/PageEditMarqueView.php';
require_once 'Views/PageAddMarqueView.php';
require_once 'Models/GestionMarquesModel.php';
class GestionMarquesController
{

    public function getMarqueById()
    {
        $model = new GestionMarquesModel();
        $id = $_GET['idMarque'];
        $result = $model->getMarqueById($id);
        return $result;
    }

    public function getAllMarques()
    {
        $model = new GestionMarquesModel();
        $result = $model->getAllMarques();
        return $result;
    }

    public function getVehiculeMarque($idVehicule)
    {
        $model = new GestionMarquesModel();
        $result = $model->getVehiculeMarque($idVehicule);
        return $result;
    }

    public function handleAddMarque()
    {
        $nomMarque = $_POST['marque_name'];
        $paysOrigine = $_POST['marque_pays'];
        $siegeSocial = $_POST['marque_siege'];
        $anneeCreation = $_POST['marque_annee'];
        if (isset($_FILES["marque_image"])) {
            $imageMarque = $_FILES['marque_image'];
            echo "
            <script>
                console.log('{$imageMarque["error"]}');
            </script>
            ";
        }
        // uploader le ficher de l'image
        if ($imageMarque["error"] == 0) {
            $r = explode(".", $imageMarque["name"]);
            $imageMarqueName = $r[0];
            $imageMarqueExt = strtolower(end($r));

            $tmpImage = $imageMarque["tmp_name"];
            while (!is_uploaded_file($tmpImage)) {
                // attendre que le fichier soit uploadé
            }
            if (in_array($imageMarqueExt, array('jpg', 'jpeg', 'png', 'mp4'))) {
                $imageDest = "../public/images/marques/" . $imageMarque["name"];
                move_uploaded_file($tmpImage, $imageDest);
            }
            $imageMarqueName = "/" . $imageMarqueName;
        } else {
            $imageMarqueName = null;
        }
        $model = new GestionMarquesModel();
        $model->addMarque($nomMarque, $paysOrigine, $siegeSocial, $anneeCreation, $imageMarqueName);
        header("Location: ./gestion-marques");

    }
    public function handleDeleteMarque($idMarque)
    {
        $model = new GestionMarquesModel();
        $model->deleteMarque($idMarque);
        header("Location: ./gestion-marques");
    }
    public function handleEditMarque($idMarque)
    {

        $nomMarque = $_POST['marque_name'];
        $paysOrigine = $_POST['marque_pays'];
        $siegeSocial = $_POST['marque_siege'];
        $anneeCreation = $_POST['marque_annee'];
        if (isset($_FILES["marque_image"])) {
            $imageMarque = $_FILES['marque_image'];
            echo "
            <script>
                console.log('{$imageMarque["error"]}');
            </script>
            ";
        }
        // uploader le ficher de l'image
        if ($imageMarque["error"] == 0) {
            $r = explode(".", $imageMarque["name"]);
            $imageMarqueName = $r[0];
            $imageMarqueExt = strtolower(end($r));

            $tmpImage = $imageMarque["tmp_name"];
            while (!is_uploaded_file($tmpImage)) {
                // attendre que le fichier soit uploadé
            }
            if (in_array($imageMarqueExt, array('jpg', 'jpeg', 'png', 'mp4'))) {
                $imageDest = "../public/images/marques/" . $imageMarque["name"];
                move_uploaded_file($tmpImage, $imageDest);
            }
            $imageMarqueName = "/" . $imageMarqueName;
        } else {
            $model = new GestionMarquesModel();
            $idMarque = $_POST['id-marque'];
            $result = $model->getMarqueById($idMarque);
            $imageMarqueName = $result['Image_marque'];
        }
        $model = new GestionMarquesModel();
        $model->editMarque($idMarque, $nomMarque, $paysOrigine, $siegeSocial, $anneeCreation, $imageMarqueName);
        header("Location: ./gestion-marques");
    }

    public function handleGotoAddMarque()
    {
        header("Location: ./add-marque");
    }

    public function handleGotoEditMarque()
    {
        $idMarque = $_POST['ID_Marque'];
        header("Location: ./edit-marque?idMarque={$idMarque}");
    }

    public function showPageMarques()
    {
        $view = new PageMarquesView();
        $view->showPageMarques();

    }

    public function showPageEditMarque($idMarque)
    {
        $view = new PageEditMarqueView();
        $view->showPageEditMarque($idMarque);

    }

    public function showPageAddMarque()
    {
        $view = new PageAddMarqueView();
        $view->showPageAddMarque();

    }
}
