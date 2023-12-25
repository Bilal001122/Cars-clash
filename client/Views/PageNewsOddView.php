<?php

require_once 'Views/GlobalView.php';
require_once 'Views/MenuView.php';
require_once 'Controllers/GestionAccueilController.php';
require_once 'Controllers/GestionNewsController.php';

class PageNewsOddView extends GlobalView
{

    public function content($idNews)
    {
        $accueilController = new GestionAccueilController();
        $newsController = new GestionNewsController();
        $menuView = new MenuView();
        $allDiaporamas = $accueilController->getAllDiaporama();
        $news = $newsController->getNewsById($idNews);
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
$menuView->content(1);
        ?>
  <section class="news flex-col items-center justify-center mt-40">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">News</p>
    <div class="flex flex-col gap-10">
      <div class="grid grid-cols-4 bg-white rounded-3xl overflow-hidden drop-shadow-2xl">
        <div class="col-span-4">
          <img class="w-full h-full object-cover" src="/cars-clash/public/images/diaporamas<?php echo $news['Image'] ?>"
            alt="">
        </div>
        <div class="col-span-4 p-10">
          <div class="text-myaccent text-3xl font-bold mb-10"><?php echo $news['Titre'] ?></div>
          <div class=""><?php echo $news['Contenu'] ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php
}

    public function showPageNewsOdd($idNews)
    {
        $this->head();
        $this->header();
        $this->content($idNews);
        $this->footer();
    }

}