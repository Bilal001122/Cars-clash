<?php
require_once 'Views/PageParamsView.php';
class GestionParamsController
{
    public function showPageParams()
    {
        $view = new PageParamsView();
        $view->showPageParams();
    }
}