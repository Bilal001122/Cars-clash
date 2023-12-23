<?php
require_once 'Views/PageParamsView.php';
require_once 'Views/PageGuideAchatView.php';
require_once 'Views/PageEditGuideView.php';
require_once 'Views/PageAddGuideView.php';
require_once 'Views/PageDiaporamaView.php';
require_once 'Views/PageAddDiaporamaView.php';
require_once 'Views/PageEditDiaporamaView.php';
require_once 'Models/GestionParamsModel.php';
class GestionParamsController
{

    public function getGuide($idGuide)
    {
        $model = new GestionParamsModel();
        $guide = $model->getGuide($idGuide);
        return $guide;
    }

    public function getDiaporama($idDiapo)
    {
        $model = new GestionParamsModel();
        $diapo = $model->getDiaporama($idDiapo);
        return $diapo;
    }

    public function getAllGuides()
    {
        $model = new GestionParamsModel();
        $allGuides = $model->getAllGuides();
        return $allGuides;
    }

    public function getAllDiaporamas()
    {
        $model = new GestionParamsModel();
        $allDiapo = $model->getAllDiaporamas();
        return $allDiapo;
    }

    public function handleGotoGuideAchat()
    {
        header('Location: ./guide-achat');
    }

    public function handleGotoDiaporama()
    {
        header('Location: ./diaporama');
    }

    public function handleGotoEditGuide($idGuide)
    {
        header('Location: ./edit-guide?idGuide=' . $idGuide);
    }

    public function handleGotoAddGuide()
    {
        header('Location: ./add-guide');
    }

    public function handleGotoAddDiaporama()
    {
        header('Location: ./add-diaporama');
    }

    public function handleGotoEditDiaporama($idDiapo)
    {
        header('Location: ./edit-diaporama?idDiapo=' . $idDiapo);
    }

    public function handleEditGuide($idGuide)
    {
        $titre = $_POST['guide_titre'];
        $contenu = $_POST['guide_contenu'];
        $model = new GestionParamsModel();
        $model->editGuide($idGuide, $titre, $contenu);
        header('Location: ./guide-achat');
    }

    public function handleEditDiaporama($idDiapo)
    {
        $nom = $_POST['diapo_nom'];
        $lien = $_POST['diapo_lien'];
        if (isset($_FILES["diapo_image"])) {
            $imageDiapo = $_FILES['diapo_image'];
        }
        // uploader le ficher de l'image
        if ($imageDiapo["error"] == 0) {
            $r = explode(".", $imageDiapo["name"]);
            $imageDiapoName = $r[0];
            $imageDiapoExt = strtolower(end($r));

            $tmpImage = $imageDiapo["tmp_name"];
            while (!is_uploaded_file($tmpImage)) {
                // attendre que le fichier soit uploadé
            }
            if (in_array($imageDiapoExt, array('jpg', 'jpeg', 'png', 'mp4'))) {
                $imageDest = "../public/images/diaporamas/" . $imageDiapo["name"];
                move_uploaded_file($tmpImage, $imageDest);
            }
            $imageDiapoName = "/" . $imageDiapoName;
        } else {
            $model = new GestionParamsModel();
            $idDiapo = $_POST['id-diapo'];
            $result = $model->getDiaporama($idDiapo);
            $imageDiapoName = $result['Chemin_Image'];
        }
        $model = new GestionParamsModel();
        $model->editDiaporama($idDiapo, $nom, $lien, $imageDiapoName);
        header('Location: ./diaporama');
    }

    public function handleAddDiaporama()
    {
        $nom = $_POST['diapo_nom'];
        $lien = $_POST['diapo_lien'];
        if (isset($_FILES["diapo_image"])) {
            $imageDiapo = $_FILES['diapo_image'];
        }
        // uploader le ficher de l'image
        if ($imageDiapo["error"] == 0) {
            $r = explode(".", $imageDiapo["name"]);
            $imageDiapoName = $r[0];
            $imageDiapoExt = strtolower(end($r));

            $tmpImage = $imageDiapo["tmp_name"];
            while (!is_uploaded_file($tmpImage)) {
                // attendre que le fichier soit uploadé
            }
            if (in_array($imageDiapoExt, array('jpg', 'jpeg', 'png', 'mp4'))) {
                $imageDest = "../public/images/diaporamas/" . $imageDiapo["name"];
                move_uploaded_file($tmpImage, $imageDest);
            }
            $imageDiapoName = "/" . $imageDiapoName;
        }
        $model = new GestionParamsModel();
        $model->addDiaporama($nom, $lien, $imageDiapoName);
        header('Location: ./diaporama');
    }

    public function handleDeleteGuide($idGuide)
    {
        $model = new GestionParamsModel();
        $model->deleteGuide($idGuide);
        header('Location: ./guide-achat');
    }

    public function handleDeleteDiaporama($idDiapo)
    {
        $model = new GestionParamsModel();
        $model->deleteDiaporama($idDiapo);
        header('Location: ./diaporama');
    }

    public function handleAddGuide()
    {
        $titre = $_POST['guide_titre'];
        $contenu = $_POST['guide_contenu'];
        $model = new GestionParamsModel();
        $model->addGuide($titre, $contenu);
        header('Location: ./guide-achat');
    }

    public function showPageParams()
    {
        $view = new PageParamsView();
        $view->showPageParams();
    }

    public function showPageGuideAchat()
    {
        $view = new PageGuideAchatView();
        $view->showPageGuideAchat();
    }

    public function showPageEditGuide($idGuide)
    {
        $view = new PageEditGuideView();
        $view->showPageEditGuide($idGuide);
    }

    public function showPageAddGuide()
    {
        $view = new PageAddGuideView();
        $view->showPageAddGuide();
    }

    public function showPageDiaporama()
    {
        $view = new PageDiaporamaView();
        $view->showPageDiaporama();
    }

    public function showPageEditDiaporama($idDiapo)
    {
        $view = new PageEditDiaporamaView();
        $view->showPageEditDiaporama($idDiapo);
    }

    public function showPageAddDiaporama()
    {
        $view = new PageAddDiaporamaView();
        $view->showPageAddDiaporama();
    }
}
