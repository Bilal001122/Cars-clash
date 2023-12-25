<?php
require_once 'Views/GlobalView.php';
require_once 'Views/MenuView.php';
require_once 'Controllers/GestionAccueilController.php';
class PageMarquesView extends GlobalView
{
    public function content()
    {

        $controller = new GestionAccueilController();
        $allMarques = $controller->getMarques();
        $menuView = new MenuView();
        ?>
<div class="body w-11/12 mx-auto my-0 mb-96">
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