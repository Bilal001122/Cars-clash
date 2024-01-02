<?php

require_once 'Views/GlobalView.php';
require_once 'Views/MenuView.php';
require_once 'Controllers/GestionNewsController.php';

class PageNewsOddView extends GlobalView
{

    public function content($idNews)
    {
        $newsController = new GestionNewsController();
        $menuView = new MenuView();
        $news = $newsController->getNewsById($idNews);
        ?>
<div class="body w-11/12 mx-auto my-0 mb-96">
  <?php
$menuView->content(1);
        ?>
  <section class="news flex-col items-center justify-center mt-40">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">News</p>
    <div class="flex flex-col gap-10">
      <div class="grid grid-cols-4 bg-white rounded-3xl overflow-hidden drop-shadow-2xl">
        <div class="col-span-4">
          <img class="w-full h-full object-cover" src="/cars-clash/public/images/news<?php echo $news['Image'] ?>"
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