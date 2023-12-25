<?php
require_once "Controllers/GestionMarquesController.php";
require_once "Controllers/GestionAvisController.php";
class CarCardDetailsView
{

    public function content($vehicule)
    {
        $marqueController = new GestionMarquesController();
        $fav = $marqueController->verifyIfFavoris($vehicule["ID_Vehicule"]);
        $avisController = new GestionAvisController();
        $vehiculeAvisMoyenne = $avisController->getAvisMoyenne($vehicule["ID_Vehicule"]);
        ?>
<div class="flex py-20 justify-center bg-myprimary bg-opacity-60 rounded-2xl drop-shadow-2xl">
  <img class="image_for_details_screen"
    src="/cars-clash/public/images/vehicules<?php echo $vehicule['Image_vehicule'] ?>" alt="">
</div>
<div
  class=" card_details_for_car grid grid-cols-2 grow place-content-center gap-12 bg-white p-20 rounded-2xl drop-shadow-2xl relative">

  <div class="absolute top-7 right-7">
    <?php if ($fav) {
            ?>
    <form action="./redirect.php" method="post">
      <input type="hidden" value="<?php echo $vehicule['ID_Vehicule'] ?>" name="idVehicule">
      <input type="hidden" value="<?php echo $_GET['idClient'] ?>" name="idClient">
      <input type="hidden" value="<?php echo $_GET['idMarque'] ?>" name="idMarque">
      <input type="hidden" value="1" name="goto-cars-details">
      <button name="remove-from-fav" type="submit">
        <ion-icon class="cursor-pointer text-red-600 size-10 hover:scale-125 transition-all duration-300" name="heart">
        </ion-icon>
      </button>
    </form>

    <?php
} else {
            ?>
    <form action="./redirect.php" method="post">
      <input type="hidden" value="<?php echo $vehicule['ID_Vehicule'] ?>" name="idVehicule">
      <input type="hidden" value="<?php echo $_GET['idClient'] ?>" name="idClient">
      <input type="hidden" value="<?php echo $_GET['idMarque'] ?>" name="idMarque">
      <input type="hidden" value="1" name="goto-cars-details">
      <button name="add-to-fav" type="submit">
        <ion-icon class="cursor-pointer size-10 hover:scale-125 transition-all duration-300" name="heart-outline">
        </ion-icon>
      </button>
    </form>
    <?php
}?>
  </div>

  <div class="flex justify-start items-center">
    <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Modèle:</p>
    <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $vehicule['Modele'] ?></p>
  </div>
  <div class="flex justify-start items-center">
    <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Version:</p>
    <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $vehicule['Version'] ?></p>
  </div>
  <div class="flex justify-start items-center">
    <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Année:</p>
    <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $vehicule['Annee'] ?></p>
  </div>
  <div class="flex justify-start items-center">
    <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Dimensions:</p>
    <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $vehicule['Dimensions'] ?></p>
  </div>
  <div class="flex justify-start items-center">
    <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Consommation:</p>
    <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $vehicule['Consommation'] ?></p>
  </div>
  <div class="flex justify-start items-center">
    <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Moteur:</p>
    <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $vehicule['Moteur'] ?></p>
  </div>
  <div class="flex justify-start items-center">
    <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Performance:</p>
    <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $vehicule['Performance'] ?></p>
  </div>
  <div class="flex justify-start items-center">
    <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Prix:</p>
    <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $vehicule['Prix'] ?>$</p>
  </div>
  <div class="flex justify-start items-center">
    <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Note moyenne:</p>
    <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $vehiculeAvisMoyenne['moyenne'] ?> / 10</p>
  </div>
  <?php
}

}