<?php

require_once 'Views/VehiculesMarquesView.php';
require_once 'Views/AvisView.php';
require_once 'Views/NewsView.php';
require_once 'Views/UtilisateurView.php';
require_once 'Views/ParametresView.php';
class MenuView
{

    public function menu()
    {
        $vehiculesView = new VehiculesMarquesView();
        $avisView = new AvisView();
        $newsView = new NewsView();
        $utilisateursView = new UtilisateurView();
        $parametresView = new ParametresView();

        ?>
<div class="body_container">
  <div class="menu">
    <div class="menu_item vehicules">
      <a href="#" class="menu_item_link" data-target="VehiculesMarquesView.php">Véhicules & Marques</a>
    </div>
    <div class="menu_item avis">
      <a href="#" class="menu_item_link" data-target="AvisView.php">Avis</a>
    </div>
    <div class="menu_item news">
      <a href="#" class="menu_item_link" data-target="NewsView.php">News</a>
    </div>
    <div class="menu_item utilisateurs">
      <a href="#" class="menu_item_link" data-target="UtilisateurView.php">Utilisateurs</a>
    </div>
    <div class="menu_item parametres">
      <a href="#" class="menu_item_link" data-target="ParametresView.php">Paramètres</a>
    </div>
  </div>

  <div class="dashboard_body"></div>
</div>
<?php
}

}