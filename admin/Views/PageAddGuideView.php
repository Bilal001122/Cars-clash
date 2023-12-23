<?php
require_once 'GlobalView.php';
require_once 'Controllers/GestionParamsController.php';
class PageAddGuideView extends GlobalView
{
    public function content()
    {
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

    <div class="dashboard_body flex flex-col justify-center items-center">
      <form class="grid grid-cols-4 items-center bg-white rounded-xl h-4/5 w-4/5 shadow-md py-3"
        action="/cars-clash/admin/redirect.php" method="POST" enctype="multipart/form-data">
        <div class="flex flex-col w-1/2 col-span-4 gap-10 mr-10 ml-10 justify-self-center">
          <label class="font-semibold self-center" for="guide_titre">Titre:</label>
          <input class="bg-mysecondary p-2 py-3 rounded-md" type="text" name="guide_titre" id="guide_titre" />
        </div>
        <div class="flex flex-col w-4/5 col-span-4 row-span-2 gap-10 mr-10 ml-10 justify-self-center">
          <label class="font-semibold self-center" for="guide_contenu">Contenu:</label>
          <textarea class="pl-3 whitespace-normal text-ellipsis bg-mysecondary max-h-80 py-3 rounded-md"
            name="guide_contenu" id="guide_contenu" rows="6">
        </textarea>
        </div>
        <div class="col-span-4 justify-self-center">
          <input type="hidden" name="id-guide" />
          <button
            class="bg-myprimary text-white p-3 rounded-md transform hover:scale-110 transition-all ease-in-out duration-300"
            type="submit" name="ajouter-guide">
            Ajouter Guide
          </button>
        </div>
      </form>
    </div>
  </div>
</body>
<?php
}

    public function showPageAddGuide()
    {
        $this->head();
        $this->header();
        $this->content();
        ?>
<?php
}
}