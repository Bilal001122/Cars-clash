<?php
require_once 'GlobalView.php';
require_once 'MenuView.php';
require_once 'Controllers/GestionAccueilController.php';
require_once 'Views/FormComparView.php';
class PageAccueilView extends GlobalView
{

    public function content()
    {
        $controller = new GestionAccueilController();
        $formComparView = new FormComparView();
        $allDiaporamas = $controller->getAllDiaporama();
        $fiveMarques = $controller->getFiveMarques();
        $marques = $controller->getMarques();
        $menuView = new MenuView();
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
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">Démarrer votre comparaison</p>
    <div class="grid grid-cols-2 gap-20">
      <?php
$formComparView->content($marques, 1);
        $formComparView->content($marques, 2);
        $formComparView->content($marques, 3);
        $formComparView->content($marques, 4);
        ?>
    </div>

    <form class="flex justify-center items-center mt-20" action="./redirect.php" method="post">
      <button
        class="animate-bounce bg-myprimary text-white font-bold p-4 text-4xl rounded-xl hover:scale-110 transition-all duration-300"
        name="demarer-comparaison">
        Comparer
      </button>
    </form>
  </section>

  <form class="flex justify-center items-center mt-20" action="./redirect.php" method="post">
    <button
      class="animate-pulse bg-white text-myprimary font-bold drop-shadow-2xl p-4 text-3xl rounded-xl hover:scale-110 transition-all duration-300"
      name="goto-guide-achat">
      Aller vers guide d'achat
    </button>
  </form>

  <section class="comparaison_plus_recherche">

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