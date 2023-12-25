<?php
require_once 'Views/GlobalView.php';
require_once 'Controllers/GestionAccueilController.php';
class PageMarquesView extends GlobalView
{
    public function content()
    {

        $controller = new GestionAccueilController();
        $allDiaporamas = $controller->getAllDiaporama();
        $allMarques = $controller->getMarques();
        ?>
<div class="body w-11/12 mx-auto my-0 mb-96">

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
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />
        <button name="goto-page-news">
          News
        </button>
      </form>
    </div>
    <div class="comparateur">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />

        <button name="goto-page-comparateur">
          Comparateur
        </button>
      </form>
    </div>
    <div class="marques bg-myprimary text-white">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />
        <button class="w-full" name="goto-page-marques">
          Marques
        </button>
      </form>
    </div>
    <div class="avis">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />

        <button name="goto-page-avis">
          Avis
        </button>
      </form>
    </div>
    <div class="guide_achats">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />

        <button name="goto-page-guide-achat">
          Guide d'achats
        </button>
      </form>
    </div>
    <div class="contacts">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />

        <button name="goto-page-contacts">
          Contacts
        </button>
      </form>
    </div>
  </div>

  <section class="flex-col items-center justify-center mt-40">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">Marques</p>
    <div
      class="principales_marques_container gap-16 grid grid-cols-4 place-content-center bg-white rounded-xl drop-shadow-2xl p-4">
      <?php
foreach ($allMarques as $marque) {
            ?>
      <form class="flex justify-center items-center" action="./redirect.php" method="post">
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

</div>
<?php
}

    public function showPageMarques()
    {
        $this->head();
        $this->header();
        $this->content();
        $this->footer();
    }

}