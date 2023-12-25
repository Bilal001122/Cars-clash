<?php
require_once 'Views/GlobalView.php';
require_once 'Views/MenuView.php';
require_once 'Controllers/GestionAccueilController.php';
class PageMarquesView extends GlobalView
{
    public function content()
    {

        $controller = new GestionAccueilController();
        $allDiaporamas = $controller->getAllDiaporama();
        $allMarques = $controller->getMarques();
        $menuView = new MenuView();
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
  <?php
$menuView->content(3);
        ?>

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