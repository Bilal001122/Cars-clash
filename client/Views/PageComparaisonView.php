<?php
require_once 'GlobalView.php';
require_once 'MenuView.php';

class PageComparaisonView extends GlobalView
{

    public function content()
    {
        $accueilController = new GestionAccueilController();
        $menuView = new MenuView();
        $formComparView = new FormComparView();
        $marques = $accueilController->getMarques();

        ?>

<div class="body w-11/12 mx-auto my-0 mb-96">
  <?php
$menuView->content(2);
        ?>

  <section class="comparaison_section mt-40">
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
</div>
<?php
}

    public function showPageComparaison()
    {
        $this->head();
        $this->header();
        $this->content();
        $this->footer();
    }

}