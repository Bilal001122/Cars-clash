<?php
require_once 'Controllers/GestionVehiculesController.php';
class PageEditVehiculeView extends GlobalView
{

    public function content($idVehicule)
    {
        $controller = new GestionVehiculesController();
        $vehicule = $controller->getVehiculeById();
        ?>

<body>
  <div class="body_container">
    <div class="menu">
      <div class="menu_item vehicules">
        <a class="menu_item_link actuel" href="./gestion-vehicules">Véhicules</a>
      </div>
      <div class="menu_item marques">
        <a class="menu_item_link " href="./gestion-marques">Marques</a>
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
          <label class="font-semibold" for="marque_name">Modèle:</label>
          <input class="bg-mysecondary p-2 py-3 rounded-md" type="text" name="vehicule_modele" id="vehicule_modele"
            value="<?php echo "{$vehicule["Modele"]}" ?>">
        </div>
        <div class="flex flex-col gap-10 mr-10">
          <label class="font-semibold" for="marque_pays">Version:</label>
          <input class="bg-mysecondary p-2 py-3 rounded-md" type="text" name="vehicule_version" id="vehicule_version"
            value="<?php echo "{$vehicule["Version"]}" ?>">
        </div>
        <div class="flex flex-col gap-10 mr-10">
          <label class="font-semibold" for="marque_siege">Année:</label>
          <input class="bg-mysecondary p-2 py-3 rounded-md" type="text" name="vehicule_annee" id="vehicule_annee"
            value="<?php echo "{$vehicule["Annee"]}" ?>">
        </div>
        <div class="flex flex-col gap-10 mr-10">
          <label class="font-semibold" for="marque_annee">Dimensions:</label>
          <input class="bg-mysecondary p-2 py-3 rounded-md" type="text" name="vehicule_dimensions"
            id="vehicule_dimensions" value="<?php echo "{$vehicule["Dimensions"]}" ?>">
        </div>

        <div class="flex flex-col gap-10 mr-10 ml-10">
          <label class="font-semibold" for="marque_annee">Consommation:</label>
          <input class="bg-mysecondary p-2 py-3 rounded-md" type="text" name="vehicule_consommation"
            id="vehicule_consommation" value="<?php echo "{$vehicule["Consommation"]}" ?>">

        </div>
        <div class="flex flex-col gap-10 mr-10">
          <label class="font-semibold" for="marque_annee">Moteur:</label>
          <input class="bg-mysecondary p-2 py-3 rounded-md" type="text" name="vehicule_moteur" id="vehicule_moteur"
            value="<?php echo "{$vehicule["Moteur"]}" ?>">
        </div>

        <div class="flex flex-col gap-10 mr-10">
          <label class="font-semibold" for="marque_annee">Performance:</label>
          <input class="bg-mysecondary p-2 py-3 rounded-md" type="text" name="vehicule_performance"
            id="vehicule_performance" value="<?php echo "{$vehicule["Performance"]}" ?>">
        </div>

        <div class="flex flex-col gap-10 mr-10">
          <label class="font-semibold" for="marque_annee">Prix:</label>
          <input class="bg-mysecondary p-2 py-3 rounded-md" type="number" name="vehicule_prix" id="vehicule_prix"
            value="<?php echo "{$vehicule["Prix"]}" ?>">
        </div>

        <div class="flex flex-row justify-center items-center gap-10 mr-10 col-span-4 justify-self-center">
          <label class="font-semibold" for="marque_image">Image du vehicule:</label>
          <input type="file" name="vehicule_image" id="vehicule_image">
        </div>

        <div class="col-span-4 justify-self-center">
          <input type="hidden" name="id-vehicule" value="<?php echo "{$vehicule["ID_Vehicule"]}" ?>">
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

    public function showPageEditVehicule($idVehicule)
    {
        $this->head();
        $this->header();
        $this->content($idVehicule);
        ?>
<?php
}

}