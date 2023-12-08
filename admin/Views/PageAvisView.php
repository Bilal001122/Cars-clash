<?php

class PageAvisView extends GlobalView
{

    public function content()
    {
        ?>

<body>
  <div class="body_container">
    <div class="menu">
      <div class="menu_item vehicules">
        <a class="menu_item_link" href="./gestion-vehicules">Véhicules</a>
      </div>
      <div class="menu_item marques">
        <a class="menu_item_link" href="./gestion-marques">Marques</a>
      </div>
      <div class="menu_item avis">
        <a class="menu_item_link actuel" href="./gestion-avis">Avis</a>
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
      <div>
        <h1>Avis</h1>
      </div>
    </div>
  </div>
</body>

<?php
}

    public function showPageAvis()
    {
        $this->head();
        $this->header();
        $this->content();
        ?>
<?php
}

}