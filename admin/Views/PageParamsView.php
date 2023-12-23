<?php
require_once 'Controllers/GestionParamsController.php';
class PageParamsView extends GlobalView
{

    public function content()
    {
        $controller = new GestionNewsController();
        $allNews = $controller->getAllNews();
        ?>

<body>
  <div class="body_container">
    <div class="menu">
      <div class="menu_item vehicules">
        <a class="menu_item_link " href="./gestion-vehicules">Véhicules</a>
      </div>
      <div class="menu_item marques">
        <a class="menu_item_link " href="./gestion-marques">Marques</a>
      </div>
      <div class="menu_item avis">
        <a class="menu_item_link" href="./gestion-avis">Avis</a>
      </div>
      <div class="menu_item news">
        <a class="menu_item_link " href="./gestion-news">News</a>
      </div>
      <div class="menu_item utilisateurs">
        <a class="menu_item_link" href="./gestion-utilisateurs">Utilisateurs</a>
      </div>
      <div class="menu_item parametres">
        <a class="menu_item_link actuel" href="./gestion-params">Paramètres</a>
      </div>
    </div>

    <div class="dashboard_body">
      <div class="flex h-full w-full justify-center items-center text-center md:px-28">
        <div class="flex-1">
          <form action="./redirect.php" method="POST">
            <button type="submit" name="goto-guide-achat"
              class="bg-myprimary text-white p-4 rounded-md transform hover:scale-110 transition-all duration-300">Guide
              d'achats</button>
          </form>
        </div>
        <div class="flex-1">
          <form action="./redirect.php" method="POST">
            <button type="submit" name="goto-diaporama"
              class="bg-myprimary text-white p-4 rounded-md transform hover:scale-110 transition-all duration-300">Diaporama</button>
          </form>
        </div>
        <div class="flex-1">
          <form action="./redirect.php" method="POST">
            <button type="submit" name="goto-style-page"
              class="bg-myprimary text-white p-4 rounded-md transform hover:scale-110 transition-all duration-300">Style
              de la page</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
<?php
}

    public function showPageParams()
    {
        $this->head();
        $this->header();
        $this->content();
        ?>
<?php
}

}