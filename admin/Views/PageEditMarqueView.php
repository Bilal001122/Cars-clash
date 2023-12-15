<?php
require_once 'Controllers/GestionMarquesController.php';
class PageEditMarqueView extends GlobalView
{

    public function content($idMarque)
    {
        $controller = new GestionMarquesController();
        $marque = $controller->getMarqueById();
        ?>

<body>
  <div class="body_container">
    <div class="menu">
      <div class="menu_item vehicules">
        <a class="menu_item_link" href="./gestion-vehicules">Véhicules</a>
      </div>
      <div class="menu_item marques">
        <a class="menu_item_link actuel" href="./gestion-marques">Marques</a>
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

    <div class="dashboard_body flex flex-col justify-center items-center">
      <form class="grid grid-cols-4 items-center bg-white rounded-xl h-4/5 w-4/5 shadow-md"
        action="/cars-clash/admin/redirect.php" method="POST" enctype="multipart/form-data">
        <div class="flex flex-col gap-10 mr-10 ml-10">
          <label class="font-semibold" for="marque_name">Nom marque:</label>
          <input class="bg-mysecondary p-2 py-3 rounded-md" type="text" name="marque_name" id="marque_name"
            value="<?php echo "{$marque["Nom_marque"]}" ?>">
        </div>
        <div class="flex flex-col gap-10 mr-10">
          <label class="font-semibold" for="marque_pays">Pays origine:</label>
          <input class="bg-mysecondary p-2 py-3 rounded-md" type="text" name="marque_pays" id="marque_pays"
            value="<?php echo "{$marque["Pays_origine"]}" ?>">
        </div>
        <div class="flex flex-col gap-10 mr-10">
          <label class="font-semibold" for="marque_siege">Siege social:</label>
          <input class="bg-mysecondary p-2 py-3 rounded-md" type="text" name="marque_siege" id="marque_siege"
            value="<?php echo "{$marque["Siege_social"]}" ?>">
        </div>
        <div class="flex flex-col gap-10 mr-10">
          <label class="font-semibold" for="marque_annee">Annee de création:</label>
          <input class="bg-mysecondary p-2 py-3 rounded-md" type="text" name="marque_annee" id="marque_annee"
            value="<?php echo "{$marque["Annee_de_creation"]}" ?>">
        </div>

        <div class="flex flex-row justify-center items-center gap-10 mr-10 col-span-4 justify-self-center">
          <label class="font-semibold" for="marque_image">Logo de la marque:</label>
          <input type="file" name="marque_image" id="marque_image">
        </div>

        <div class="col-span-4 justify-self-center">
          <input type="hidden" name="id-marque" value="<?php echo "{$marque["ID_Marque"]}" ?>">
          <button
            class="bg-myprimary text-white p-3 rounded-md transform hover:scale-110 transition-all ease-in-out duration-300"
            type="submit" name="modifier-marque">
            Enregistrer les modifications
          </button>
        </div>
      </form>
    </div>
  </div>
</body>
<?php
}

    public function showPageEditMarque($idMarque)
    {
        $this->head();
        $this->header();
        $this->content($idMarque);
        ?>
<?php
}

}