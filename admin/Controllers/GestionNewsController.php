<?php
require_once 'Views/PageNewsView.php';
require_once 'Views/PageEditNewsView.php';
require_once 'Views/PageAddNewsView.php';
require_once 'Models/GestionNewsModel.php';
class GestionNewsController
{

    public function getNewsById($idNews)
    {
        $model = new GestionNewsModel();
        $result = $model->getNewsById($idNews);
        return $result;
    }

    public function getAllNews()
    {
        $model = new GestionNewsModel();
        $result = $model->getAllNews();
        return $result;
    }

    public function handleGotoEditNews()
    {
        $idNews = $_POST['ID_News'];
        header('Location: ./edit-news?idNews=' . $idNews);
    }

    public function handleGotoAddNews()
    {
        header('Location: ./add-news');
    }

    public function handleAddNews()
    {
        $titreNews = $_POST['news_titre'];
        $contenuNews = $_POST['news_contenu'];
        $imageNews = $_FILES['news_image'];
        // uploader le ficher de l'image
        if ($imageNews["error"] == 0) {
            $r = explode(".", $imageNews["name"]);
            $imageNewsName = $r[0];
            $imageNewsExt = strtolower(end($r));

            $tmpImage = $imageNews["tmp_name"];
            while (!is_uploaded_file($tmpImage)) {
                // attendre que le fichier soit uploadé
            }
            if (in_array($imageNewsExt, array('jpg', 'jpeg', 'png', 'mp4'))) {
                $imageDest = "../public/images/news/" . $imageNews["name"];
                move_uploaded_file($tmpImage, $imageDest);
            }
            $imageNewsName = "/" . $imageNewsName;
        }
        $model = new GestionNewsModel();
        $model->addNews($titreNews, $contenuNews, $imageNewsName);
        header("Location: ./gestion-news");
    }

    public function handleEditNews($idNews)
    {
        $titreNews = $_POST['news_titre'];
        $contenuNews = $_POST['news_contenu'];
        if (isset($_FILES["news_image"])) {
            $imageNews = $_FILES['news_image'];
        }
        // uploader le ficher de l'image
        if ($imageNews["error"] == 0) {
            $r = explode(".", $imageNews["name"]);
            $imageNewsName = $r[0];
            $imageNewsExt = strtolower(end($r));

            $tmpImage = $imageNews["tmp_name"];
            while (!is_uploaded_file($tmpImage)) {
                // attendre que le fichier soit uploadé
            }
            if (in_array($imageNewsExt, array('jpg', 'jpeg', 'png', 'mp4'))) {
                $imageDest = "../public/images/news/" . $imageNews["name"];
                move_uploaded_file($tmpImage, $imageDest);
            }
            $imageNewsName = "/" . $imageNewsName;
        } else {
            $model = new GestionNewsModel();
            $idNews = $_POST['id-news'];
            $result = $model->getNewsById($idNews);
            $imageNewsName = $result['Image'];
        }
        $model = new GestionNewsModel();
        $model->editNews($idNews, $titreNews, $contenuNews, $imageNewsName);
        header("Location: ./gestion-news");
    }

    public function handleDeleteNews($idNews)
    {
        $model = new GestionNewsModel();
        $model->deleteNews($idNews);
        header("Location: ./gestion-news");
    }

    public function showPageEditNews($idNews)
    {
        if (isset($_SESSION['admin'])) {
            $view = new PageEditNewsView();
            $view->showPageEditNews($idNews);
        } else {
            header('Location: /cars-clash/admin/login');
        }
    }

    public function showPageNews()
    {
        if (isset($_SESSION['admin'])) {
            $view = new PageNewsView();
            $view->showPageNews();
        } else {
            header('Location: /cars-clash/admin/login');
        }
    }

    public function showPageAddNews()
    {
        if (isset($_SESSION['admin'])) {
            $view = new PageAddNewsView();
            $view->showPageAddNews();
        } else {
            header('Location: /cars-clash/admin/login');
        }
    }
}
