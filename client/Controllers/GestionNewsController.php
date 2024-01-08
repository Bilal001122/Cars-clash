<?php
require_once 'Views/PageNewsView.php';
require_once 'Views/PageNewsOddView.php';
require_once 'Models/GestionNewsModel.php';
class GestionNewsController
{

    public function getAllNews()
    {
        $model = new GestionNewsModel();
        $allNews = $model->getAllNews();
        return $allNews;
    }

    public function getNewsById($idNews)
    {
        $model = new GestionNewsModel();
        $news = $model->getNewsById($idNews);
        return $news;
    }

    public function handleGotoPageNewsOdd($idClient, $idNews)
    {
        header("Location: ./news-odd?idClient=$idClient&idNews=$idNews");
    }

    public function showPageNews()
    {
        if (isset($_SESSION['client'])) {
            $pageNewsView = new PageNewsView();
            $pageNewsView->showPageNews();
        } else {
            header('Location: /cars-clash/client/login');
        }

    }

    public function showPageNewsOdd($idNews)
    {

        if (isset($_SESSION['client'])) {
            $pageNewsView = new PageNewsOddView();
            $pageNewsView->showPageNewsOdd($idNews);
        } else {
            header('Location: /cars-clash/client/login');
        }

    }
}
