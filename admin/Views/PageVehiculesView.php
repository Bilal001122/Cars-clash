<?php

class PageVehiculesView extends GlobalView
{

    public function content()
    {
        ?>

<body>
  <div class="body_container">
    <div class="menu">
      <div class="menu_item vehicules">
        <a class="menu_item_link actuel" href="./gestion-vehicules">Véhicules</a>
      </div>
      <div class="menu_item marques">
        <a class="menu_item_link" href="./gestion-marques">Marques</a>
      </div>
      <div class="menu_item avis">
        <a class="menu_item_link" href="./gestion-avis">Avis</a>
      </div>
      <div class="menu_item news">
        <a class="menu_item_link" href="./gestion-news">News</a>
      </div>
      <div class="menu_item utilisateurs">
        <a class="menu_item_link" href="./gestion-utilisateurs">Utilisateurs</a>
      </div>
      <div class="menu_item parametres">
        <a class="menu_item_link" href="./gestion-params">Paramètres</a>
      </div>
    </div>

    <div class="dashboard_body">
      <div class="vehicules_container">
        <div class="vehicules_container_add_button_container">
          <a class="vehicules_container_add_button">Ajouter une véhicule</a>
        </div>
        <div class="vehicules_container_table">
          <div class="vehicules_container_table_title">Les Véhicules</div>
          <div class="vehicules_container_table_real_table">

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php
}

    public function showPageVehicule()
    {
        $this->head();
        $this->header();
        $this->content();
        ?>
<?php
}

}