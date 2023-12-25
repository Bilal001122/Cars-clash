<?php

require_once 'Views/GlobalView.php';
require_once 'Views/MenuView.php';
require_once 'Controllers/GestionAccueilController.php';
require_once 'Controllers/GestionNewsController.php';

class PageNewsView extends GlobalView
{

    public function content()
    {
        $accueilController = new GestionAccueilController();
        $newsController = new GestionNewsController();
        $menuView = new MenuView();
        $allDiaporamas = $accueilController->getAllDiaporama();
        $allNews = $newsController->getAllNews();
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
      <?php foreach ($allNews as $news) {
            ?>
      <div class="grid grid-cols-4 bg-white rounded-3xl overflow-hidden drop-shadow-2xl">
        <div>
          <img class="w-full h-full object-cover" src="/cars-clash/public/images/diaporamas<?php echo $news['Image'] ?>"
            alt="">
        </div>
        <div class="col-span-3 p-10">
          <div class="text-myaccent text-3xl font-bold mb-10"><?php echo $news['Titre'] ?></div>
          <div class="text-ellipsis line-clamp-6"><?php echo $news['Contenu'] ?>
          </div>
          <div class="flex col-span-3 place-content-end">
            <form action="./redirect.php" method="post">
              <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />
              <input type="hidden" name="idNews" value="<?php echo $news['ID_News'] ?>" />
              <button class="justify-end  bg-myprimary text-white rounded-xl px-4 py-2 mt-4"
                name="goto-page-news-odd">Afficher
                plus</button>
            </form>
          </div>
        </div>
      </div>
      <?php
}
        ?>
    </div>
  </section>
</div>
<?php
}

    public function showPageNews()
    {
        $this->head();
        $this->header();
        $this->content();
        $this->footer();
    }

}