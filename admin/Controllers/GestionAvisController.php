<?php
require_once 'Views/PageAvisView.php';
class GestionAvisController
{
    public function showPageAvis()
    {
        $view = new PageAvisView();
        $view->showPageAvis();
    }
}