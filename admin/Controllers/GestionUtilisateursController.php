<?php
require_once 'Views/PageUtilisateurView.php';
class GestionUtilisateurController
{
    public function showPageUtilisateur()
    {
        $view = new PageUtilisateurView();
        $view->showPageUtilisateurs();
    }
}
