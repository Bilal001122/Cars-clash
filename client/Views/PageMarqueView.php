<?php
require_once 'Views/GlobalView.php';
require_once 'Controllers/GestionMarquesController.php';
require_once 'Controllers/GestionAccueilController.php';
class PageMarqueView extends GlobalView
{
    public function content($idMarque)
    {
        $accueilController = new GestionAccueilController();
        $allDiaporamas = $accueilController->getAllDiaporama();
        $marqueController = new GestionMarquesController();
        $marque = $marqueController->getMarque($idMarque);
        $allVehicules = $marqueController->getAllVehicules($idMarque);
        $fourVehicules = $marqueController->getFourVehicules($idMarque);
        ?>
<div class="body w-11/12 mx-auto my-0">
  <?php
foreach ($allDiaporamas as $diaporama) {
            ?>
  <div class="diaporama mt-16 drop-shadow-2xl hover:cursor-pointer transition-all duration-1000">
    <img class="rounded-2xl transition-all duration-300"
      src="/cars-clash/public/images/diaporamas<?php echo $diaporama['Chemin_Image'] ?>" alt=""
      data-pointer="<?php echo $diaporama['Lien'] ?>" />
  </div>
  <?php
}
        ?>
  <div class="menu flex justify-around mt-12 bg-white rounded-xl drop-shadow-2xl overflow-hidden">
    <div class="news">
      <form action="./redirect.php" method="post">
        <button name="goto-page-news">
          News
        </button>
      </form>
    </div>
    <div class="comparateur">
      <form action="./redirect.php" method="post">
        <button name="goto-page-comparateur">
          Comparateur
        </button>
      </form>
    </div>
    <div class="marques bg-myprimary text-white">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />
        <button name=" goto-page-marques">
          Marques
        </button>
      </form>
    </div>
    <div class="avis">
      <form action="./redirect.php" method="post">
        <button name="goto-page-avis">
          Avis
        </button>
      </form>
    </div>
    <div class="guide_achats">
      <form action="./redirect.php" method="post">
        <button name="goto-page-guide-achat">
          Guide d'achats
        </button>
      </form>
    </div>
    <div class="contacts">
      <form action="./redirect.php" method="post">
        <button name="goto-page-contacts">
          Contacts
        </button>
      </form>
    </div>
  </div>


  <div class=" marque flex justify-center items-center bg-white mt-32 p-10 rounded-2xl drop-shadow-2xl">
    <div class="px-10 flex justify-center items-center">
      <img src="/cars-clash/public/images/marques<?php echo "{$marque["Image_marque"]}" ?>" alt="">
    </div>
    <div class="grid grid-cols-2 grow place-content-center gap-4">
      <div class="flex justify-start items-center">
        <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Nom:</p>
        <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $marque["Nom_marque"] ?></p>
      </div>
      <div class="flex justify-start items-center">
        <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Pays d'origine:</p>
        <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $marque["Pays_origine"] ?></p>
      </div>
      <div class="flex justify-start items-center">
        <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Siège social:</p>
        <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $marque["Siege_social"] ?></p>
      </div>
      <div class="flex justify-start items-center">
        <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Année de création:</p>
        <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $marque["Annee_de_creation"] ?></p>
      </div>
    </div>
  </div>

  <div class="principales_vehicules flex flex-col mt-44">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">Principales voitures</p>
    <div class="grid grid-cols-4 gap-10">
      <?php foreach ($fourVehicules as $vehicule) {
            ?>
      <div class="vehicule_card  flex flex-col bg-white p-10 rounded-xl gap-5 drop-shadow-2xl">
        <div class="flex justify-between items-center">
          <p class="font-bold text-3xl text-myaccent"><?php echo $vehicule["Modele"] ?></p>
          <form action="./redirect.php" method="post">
            <button name="add-to-fav" type="submit">
              <ion-icon class="cursor-pointer size-10 hover:scale-125 transition-all duration-300" name="heart-outline">
            </button>
          </form>
          </ion-icon>
        </div>
        <div class="flex justify-center items-center">
          <img class="h-52" src="/cars-clash/public/images/vehicules<?php echo $vehicule["Image_vehicule"] ?>" alt="">
        </div>

        <div class="flex justify-between items-center">
          <p class="font-bold text-3xl text-myaccent">$<?php echo $vehicule["Prix"] ?></p>
          <form action="./redirect.php" method="post">
            <button class=" hover:scale-105 transition-all duration-300 px-4 py-3 bg-myprimary text-white rounded-xl"
              type="submit" name="show-car-details">Voir
              détails</button>
          </form>
        </div>
      </div>

      <?php }?>
    </div>
  </div>


  <div class="all_vehicules flex flex-col mt-44">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">Touts les voitures</p>
    <div class="grid grid-cols-4 gap-10">
      <?php foreach ($allVehicules as $vehicule) {
            ?>
      <div class="vehicule_card  flex flex-col bg-white p-10 rounded-xl gap-5 drop-shadow-2xl">
        <div class="flex justify-between items-center">
          <p class="font-bold text-3xl text-myaccent"><?php echo $vehicule["Modele"] ?></p>
          <form action="./redirect.php" method="post">
            <button name="add-to-fav" type="submit">
              <ion-icon class="cursor-pointer size-10 hover:scale-125 transition-all duration-300" name="heart-outline">
            </button>
          </form>
          </ion-icon>
        </div>
        <div class="flex justify-center items-center">
          <img class="h-52" src="/cars-clash/public/images/vehicules<?php echo $vehicule["Image_vehicule"] ?>" alt="">
        </div>

        <div class="flex justify-between items-center">
          <p class="font-bold text-3xl text-myaccent">$<?php echo $vehicule["Prix"] ?></p>
          <form action="./redirect.php" method="post">
            <button class=" hover:scale-105 transition-all duration-300 px-4 py-3 bg-myprimary text-white rounded-xl"
              type="submit" name="show-car-details">Voir
              détails</button>
          </form>
        </div>
      </div>

      <?php }?>
    </div>
  </div>

</div>
<?php
}

    public function showPageMarque($idMarque)
    {
        $this->head();
        $this->header();
        $this->content($idMarque);
        $this->footer();
    }
}