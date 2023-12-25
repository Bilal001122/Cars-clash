<?php

require_once 'Views/GlobalView.php';
require_once 'Controllers/GestionAccueilController.php';
require_once 'Controllers/GestionNewsController.php';

class PageNewsOddView extends GlobalView
{

    public function content($idNews)
    {
        $accueilController = new GestionAccueilController();
        $newsController = new GestionNewsController();
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
  <div class="menu flex justify-around mt-12 bg-white rounded-xl drop-shadow-2xl overflow-hidden">
    <div class="news bg-myprimary text-white">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />
        <button class="w-full" name="goto-page-news">
          News
        </button>
      </form>
    </div>
    <div class="comparateur">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />

        <button class="w-full" name="goto-page-comparateur">
          Comparateur
        </button>
      </form>
    </div>
    <div class="marques ">
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

        <button class="w-full" name="goto-page-avis">
          Avis
        </button>
      </form>
    </div>
    <div class="guide_achats">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />

        <button class="w-full" name="goto-page-guide-achat">
          Guide d'achats
        </button>
      </form>
    </div>
    <div class="contacts">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />
        <button class="w-full" name="goto-page-contacts">
          Contacts
        </button>
      </form>
    </div>
  </div>

  <section class="news flex-col items-center justify-center mt-40">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">News</p>
    <div class="flex flex-col gap-10">
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
              <button class="justify-end  bg-myprimary text-white rounded-xl px-4 py-2 mt-4"
                name="goto-page-news-odd">Afficher
                plus</button>
            </form>
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