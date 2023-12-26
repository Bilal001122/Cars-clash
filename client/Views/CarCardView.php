<?php
require_once "Controllers/GestionMarquesController.php";
class CarCardView
{

    public function content($vehicule)
    {
        $marqueController = new GestionMarquesController();
        $fav = $marqueController->verifyIfFavoris($vehicule["ID_Vehicule"]);
        ?>
<div class="vehicule_card  flex flex-col bg-white p-10 rounded-xl gap-5 drop-shadow-2xl">
  <div class="flex justify-between items-center">
    <p class="font-bold text-3xl text-myaccent"><?php echo $vehicule["Modele"] ?></p>
    <form action="./redirect.php" method="post">
      <input type="hidden" value="<?php echo $vehicule['ID_Vehicule'] ?>" name="idVehicule">
      <input type="hidden" value="<?php echo $_GET['idClient'] ?>" name="idClient">
      <input type="hidden" name="URL" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
      <?php if (isset($_GET['idMarque'])) {
            ?>
      <input type="hidden" value="<?php echo $_GET['idMarque'] ?>" name="idMarque">
      <?php
}?>
      <?php if ($fav) {
            ?>
      <button name="remove-from-fav" type="submit">
        <ion-icon class="cursor-pointer text-red-600 size-10 hover:scale-125 transition-all duration-300" name="heart">
        </ion-icon>
      </button>

      <?php
} else {
            ?>
      <button name="add-to-fav" type="submit">
        <ion-icon class="cursor-pointer size-10 hover:scale-125 transition-all duration-300" name="heart-outline">
        </ion-icon>
      </button>
      <?php
}?>
    </form>
  </div>
  <div class="flex justify-center items-center">
    <img class="h-52" src="/cars-clash/public/images/vehicules<?php echo $vehicule["Image_vehicule"] ?>" alt="">
  </div>

  <div class="flex justify-between items-center">
    <p class="font-bold text-3xl text-myaccent">$<?php echo $vehicule["Prix"] ?></p>
    <form action="./redirect.php" method="post">
      <input type="hidden" value="<?php echo $vehicule['ID_Vehicule'] ?>" name="idVehicule">
      <input type="hidden" value="<?php echo $_GET['idClient'] ?>" name="idClient">
      <?php if (isset($_GET['idMarque'])) {
            ?>
      <input type="hidden" value="<?php echo $_GET['idMarque'] ?>" name="idMarque">
      <?php
}?>
      <?php
if (isset($_GET['isFromAvis'])) {
            ?>
      <input type="hidden" value="<?php echo $_GET['isFromAvis'] ?>" name="isFromAvis">
      <?php
}?>
      <button class=" hover:scale-105 transition-all duration-300 px-4 py-3 bg-myprimary text-white rounded-xl"
        type="submit" name="show-car-details">Voir
        détails</button>
    </form>
  </div>
</div>
<?php
}

}