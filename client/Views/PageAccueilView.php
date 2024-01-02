<?php
require_once 'GlobalView.php';
require_once 'MenuView.php';
require_once 'Controllers/GestionAccueilController.php';
require_once 'Controllers/GestionComparaisonController.php';
require_once 'Controllers/GestionMarquesController.php';
require_once 'Views/FormComparView.php';
require_once 'Views/CompareCardView.php';
class PageAccueilView extends GlobalView
{

    public function content()
    {
        $controller = new GestionAccueilController();
        $marqueController = new GestionMarquesController();
        $formComparView = new FormComparView();
        $comparatorController = new GestionComparaisonController();
        $topThreeComparaison = $comparatorController->getTopThreeComparaison();
        $allDiaporamas = $controller->getAllDiaporama();
        $fiveMarques = $controller->getFiveMarques();
        $marques = $controller->getMarques();
        $menuView = new MenuView();
        $compareCardView = new CompareCardView();
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
  <?php
$menuView->content(0);
        ?>

  <section class="principales_marques flex-col items-center justify-center mt-40">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">Les principales marques</p>
    <div class="principales_marques_container flex justify-around bg-white rounded-xl drop-shadow-2xl p-4">
      <?php
foreach ($fiveMarques as $marque) {
            ?>
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idMarque" value="<?php echo $marque['ID_Marque'] ?>">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>"" >
        <button name=" goto-page-marque">
        <div class="marque flex flex-col justify-center items-center">
          <img class="hover:scale-105 transition-all duration-300 cursor-pointer"
            src="/cars-clash/public/images/marques<?php echo $marque['Image_marque'] ?>" alt="" />
          <p class="text-center mt-4 text-myprimary opacity-80 font-bold text-4xl"><?php echo $marque['Nom_marque'] ?>
          </p>
        </div>
        </button>
      </form>
      <?php
}
        ?>
    </div>
  </section>

  <section class="comparaison_section mt-80">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70">Démarrer votre comparaison</p>
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">( Il faut remplir au moins les 2
      premiers formulaires )</p>
    <form id="compareForm" action="./redirect.php" method="POST">
      <div class="grid grid-cols-2 gap-20">
        <?php
$formComparView->content($marques, 1, true);
        $formComparView->content($marques, 2, true);
        $formComparView->content($marques, 3);
        $formComparView->content($marques, 4);
        ?>
      </div>

      <div class="flex justify-center items-center mt-20" action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>">
        <button type="submit"
          class="animate-pulse bg-myprimary text-white font-bold p-4 text-4xl rounded-xl hover:scale-110 transition-all duration-300"
          name="demarer-comparaison">
          Comparer
        </button>
      </div>
    </form>
  </section>

  <form class="flex justify-center items-center mt-20" action="./redirect.php" method="post">
    <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>">
    <button
      class="animate-pulse bg-white text-myprimary font-bold drop-shadow-2xl p-4 text-3xl rounded-xl hover:scale-110 transition-all duration-300"
      name="goto-page-guide-achat">
      Aller vers guide d'achat
    </button>
  </form>

  <section class="comparaison_plus_recherche">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mt-24 mb-10">Les 3 comparaisons les plus
      recherchés</p>
    <?php foreach ($topThreeComparaison as $comparaison) {
            ?>
    <div class="flex w-full justify-center mb-20">
      <?php
$compareCardView->content($marqueController->getVehicule($comparaison['ID_Vehicule1']));
            ?>
      <p class="text-9xl text-myprimary font-bold grow justify-self-center self-center text-center">VS</p>
      <?php
$compareCardView->content($marqueController->getVehicule($comparaison['ID_Vehicule2']));
            ?>
    </div>
    <?php
}
        ?>
  </section>

</div>

<?php

    }

    public function showPageAccueil()
    {
        $this->head();
        $this->header();
        $this->content();
        $this->footer();
    }
}