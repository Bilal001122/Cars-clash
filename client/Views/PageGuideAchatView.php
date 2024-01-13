<?php
require_once 'GlobalView.php';
require_once 'MenuView.php';
require_once 'CarCardView.php';
require_once 'Controllers/GestionGuideAchatController.php';
require_once 'Controllers/GestionMarquesController.php';

class PageGuideAchatView extends GlobalView
{
    public function content()
    {
        $controller = new GestionGuideAchatController();
        $cardView = new CarCardView();
        $allVehicules = $controller->getAllVehicules();
        $allGuides = $controller->getAllGuideAchat();
        $menuView = new MenuView();
        ?>
<div class="body w-11/12 mx-auto my-0 mb-96">
  <?php
$menuView->content(5);
        ?>
  <section class="flex-col items-center justify-center mt-40">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">Guide d'achat</p>
    <div class="flex flex-col gap-14">
      <div class="flex flex-col gap-14 bg-white p-20 rounded-2xl drop-shadow-2xl">
        <?php foreach ($allGuides as $guide) {?>
        <p class=" animate-bounce text-myprimary font-semibold text-3xl"><?php echo $guide['Titre_guide_achat'] ?>
        </p>
        <p class="ml-10"><?php echo $guide['Contenu_guide_achat'] ?></p>
        <div class="h-1 bg-myaccent opacity-20 w-full"></div>
        <?php }?>
      </div>
    </div>
    <!-- <div class="all_vehicules flex flex-col mt-44">
      <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">Touts les voitures</p>
      <div class="grid grid-cols-4 gap-10">
        <?php foreach ($allVehicules as $vehicule) {
            $cardView->content($vehicule);
        }?>
      </div>
    </div> -->

    <div id="vehicules-carousel" class="carousel mt-44 flex flex-col">
      <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">Tous les voitures</p>

      <?php
$chunkedVehicules = array_chunk($allVehicules, 4); // Divisez les voitures en groupes de 4
        foreach ($chunkedVehicules as $index => $slideVehicules) {
            echo '<div class="carousel-item' . ($index == 0 ? ' active' : '') . '">';
            ?>
      <div class="grid grid-cols-4 gap-10">
        <?php
foreach ($slideVehicules as $vehicule) {
                $cardView->content($vehicule);
            }
            ?>
      </div>
      <?php
echo '</div>';
        }
        ?>
      <div class="flex justify-between mt-10 px-20">
        <button class="rounded-2xl p-3 bg-myprimary text-white text-2xl"
          onclick="prevVehiculeSlide()">Précédent</button>
        <button class="rounded-2xl p-3 bg-myprimary text-white text-2xl" onclick="nextVehiculeSlide()">Suivant</button>
      </div>
    </div>



    <script>
    let currentVehiculeSlide = 0;
    const vehiculeSlides = document.querySelectorAll('.carousel-item');
    const prevVehiculeButton = document.querySelector(
      '.rounded-2xl.p-3.bg-myprimary.text-white.text-2xl[onclick="prevVehiculeSlide()"]');
    const nextVehiculeButton = document.querySelector(
      '.rounded-2xl.p-3.bg-myprimary.text-white.text-2xl[onclick="nextVehiculeSlide()"]');

    function updateVehiculeButtons() {

      if (currentVehiculeSlide === 0) {
        prevVehiculeButton.disabled = true;
        prevVehiculeButton.style.opacity = 0.2;
      } else {
        prevVehiculeButton.disabled = false;
        prevVehiculeButton.style.opacity = 1;
      }

      if (currentVehiculeSlide === vehiculeSlides.length - 1) {
        nextVehiculeButton.disabled = true;
        nextVehiculeButton.style.opacity = 0.2;
      } else {
        nextVehiculeButton.disabled = false;
        nextVehiculeButton.style.opacity = 1;
      }
    }

    function showVehiculeSlide(index) {
      currentVehiculeSlide = (index + vehiculeSlides.length) % vehiculeSlides.length;

      vehiculeSlides.forEach(item => {
        item.classList.remove('active');
      });

      vehiculeSlides[currentVehiculeSlide].classList.add('active');
      updateVehiculeButtons();
    }

    function nextVehiculeSlide() {
      showVehiculeSlide(currentVehiculeSlide + 1);
    }

    function prevVehiculeSlide() {
      showVehiculeSlide(currentVehiculeSlide - 1);
    }

    updateVehiculeButtons(); // Appeler la fonction au chargement de la page pour initialiser l'état des boutons
    </script>

  </section>
</div>

<?php
}

    public function showPageGuideAchat()
    {
        $this->head();
        $this->header();
        $this->content();
        $this->footer();
    }
}