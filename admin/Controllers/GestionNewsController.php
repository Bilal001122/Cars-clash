<?php
require_once 'Views/PageNewsView.php';
class GestionNewsController
{
    public function showPageNews()
    {
        $view = new PageNewsView();
        $view->showPageNews();
    }
}