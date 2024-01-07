<?php
require_once "GlobalView.php";
require_once "CarCardView.php";

class PageUserView extends GlobalView
{

    public function content()
    {
        $marqueController = new GestionMarquesController();
        $favoris = $marqueController->getFavoris($_GET['idClient']);
        $carCardView = new CarCardView();
        ?>
<div class="body w-11/12 mx-auto my-0 mb-96">
  <section class="news flex-col items-center justify-center mt-40">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">Vos Favoris</p>
    <div class="grid grid-cols-4 gap-10">
      <?php
foreach ($favoris as $vehicule) {
            $carCardView->content($vehicule);
        }
        ?>
  </section>
</div>

<?php
}

    public function showPageUser($idClient)
    {
        $this->head();
        $this->header();
        $this->content();
        $this->footer();
    }

}