<?php
require_once 'GlobalView.php';
require_once 'Controllers/GestionAccueilController.php';
class PageAccueilView extends GlobalView
{

    public function content()
    {
        $controller = new GestionAccueilController();
        $allDiaporamas = $controller->getAllDiaporama();
        ?>
<div class="body w-11/12 mx-auto my-0">
  <?php
foreach ($allDiaporamas as $diaporama) {
            ?>
  <div class="diaporama mt-16 drop-shadow-2xl hover:cursor-pointer">
    <img class="rounded-2xl " src="/cars-clash/public/images/diaporamas<?php echo $diaporama['Chemin_Image'] ?>" alt=""
      data-pointer="<?php echo $diaporama['Lien'] ?>" />
  </div>
  <?php
}
        ?>
  <div class="menu flex justify-around mt-12 bg-white rounded-xl drop-shadow-2xl overflow-hidden">
    <div class="news">News</div>
    <div class="comparateur">Comparateur</div>
    <div class="marques">Marques</div>
    <div class="avis">Avis</div>
    <div class="guide_achats">Guide d'achats</div>
    <div class="contacts">Contacts</div>
  </div>
</div>

<?php

    }

    public function showPageAccueil()
    {
        $this->head();
        $this->header();
        $this->content();
    }
}