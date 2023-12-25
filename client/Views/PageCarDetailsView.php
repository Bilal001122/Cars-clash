<?php
require_once 'Views/GlobalView.php';
require_once 'Views/MenuView.php';
require_once 'Views/CarCardDetailsView.php';
require_once 'Controllers/GestionMarquesController.php';
require_once 'Controllers/GestionAvisController.php';
class PageCarDetailsView extends GlobalView
{

    public function content($idClient, $idMarque, $idVehicule)
    {
        $marqueController = new GestionMarquesController();
        $carCardDetailsView = new CarCardDetailsView();
        $avisController = new GestionAvisController();
        $vehicule = $marqueController->getVehicule($idVehicule);
        $menuView = new MenuView();
        $threeAvis = $avisController->getThreeAvis($idVehicule);
        ?>
<div class="body w-11/12 mx-auto my-0 mb-96">
  <?php
$menuView->content(3);
        ?>
  <div class="flex flex-col gap-14">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10 mt-32">Description</p>
    <?php
$carCardDetailsView->content($vehicule);
        ?>
  </div>
  <!-- Donnez note et avis -->

  <div class="flex gap-10">
    <div class="bg-white p-10 pb-20 rounded-2xl drop-shadow-2xl">
      <form class="grid grid-cols-5 gap-x-10" action="./redirect.php" method="post">
        <input type="hidden" value="<?php echo $vehicule['ID_Vehicule'] ?>" name="idVehicule">
        <input type="hidden" value="<?php echo $_GET['idClient'] ?>" name="idClient">
        <input type="hidden" value="<?php echo $_GET['idMarque'] ?>" name="idMarque">
        <p class="font-bold text-4xl py-4 col-span-5">Donnez une note /10</p>
        <div class="col-span-3 place-content-start">
          <div class="flex flex-col">
            <label class="font-bold py-4" for="note">Note</label>
            <input placeholder="Note"
              class="p-3 w-12/12 bg-myaccent bg-opacity-5 rounded-xl ring-2 ring-gray-300 focus:outline-none focus:ring-myprimary focus:ring-2"
              type="number" name="note" id="note" min="0" max="10" required>
          </div>
        </div>
        <div class="w-full hover:scale-125 transition-all duration-300 col-span-2 place-self-end scale-110">
          <button class=" rounded-2xl w-full p-3 bg-myprimary text-white text-2xl" type="submit" name="add-note">
            Valider
          </button>
        </div>
      </form>
    </div>
    <div class="bg-white p-10 pb-20 rounded-2xl drop-shadow-2xl grow">
      <form class="grid grid-cols-5 gap-x-10" action="./redirect.php" method="post">
        <input type="hidden" value="<?php echo $vehicule['ID_Vehicule'] ?>" name="idVehicule">
        <input type="hidden" value="<?php echo $_GET['idClient'] ?>" name="idClient">
        <input type="hidden" value="<?php echo $_GET['idMarque'] ?>" name="idMarque">
        <p class="font-bold text-4xl py-4 col-span-5">Donnez avis</p>
        <div class="col-span-4 place-content-start">
          <div class="flex flex-col">
            <label class="font-bold py-4" for="avis">Avis</label>
            <input placeholder="Avis"
              class="p-3 w-12/12 bg-myaccent bg-opacity-5 rounded-xl ring-2 ring-gray-300 focus:outline-none focus:ring-myprimary focus:ring-2"
              type="text" name="avis" id="avis">
          </div>
        </div>
        <div class="w-full hover:scale-125 transition-all duration-300 col-span-1 place-self-end scale-110">
          <button class=" rounded-2xl w-full p-3 bg-myprimary text-white text-2xl" type="submit" name="add-avis">
            Valider
          </button>
        </div>
      </form>
    </div>
  </div>
  <!-- Fin donnez note et avis -->

  <!-- Les 3 avis les plus apprecis -->
  <div class="flex flex-col gap-14">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10 mt-32">Les 3 avis les plus apprécis
    </p>
    <?php foreach ($threeAvis as $avis) {?>
    <div class="flex flex-col gap-14 bg-white p-20 rounded-2xl drop-shadow-2xl">
      <p class=" animate-bounce text-myprimary font-semibold text-3xl"><?php echo $avis['Nom_utilisateur'] ?></p>
      <p><?php echo $avis['Commentaire'] ?></p>
    </div>
    <?php }?>
  </div>
  <!-- Fin Les 3 avis les plus apprecis  -->

  <!-- Tous les avis -->

  TODO: Tous les avis

  <!-- Fin tous les avis -->
</div>
</div>
<?php
}

    public function showPageCarDetails($idClient, $idMarque, $idVehicule)
    {
        $this->head();
        $this->header();
        $this->content($idClient, $idMarque, $idVehicule);
        $this->footer();
    }
}