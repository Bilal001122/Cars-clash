<?php
require_once 'Views/GlobalView.php';
require_once 'Views/MenuView.php';
require_once 'Views/CarCardView.php';
require_once 'Controllers/GestionMarquesController.php';
class PageMarqueView extends GlobalView
{
    public function content($idMarque)
    {

        $marqueController = new GestionMarquesController();
        $marque = $marqueController->getMarque($idMarque);
        $allVehicules = $marqueController->getAllVehicules($idMarque);
        $fourVehicules = $marqueController->getFourVehicules($idMarque);
        $menuView = new MenuView();
        $cardView = new CarCardView();

        ?>
<div class="body w-11/12 mx-auto my-0">
  <?php
if (isset($_GET['isFromAvis'])) {
            $menuView->content(4);
        } else {
            $menuView->content(3);
        }
        ?>
  <div class=" marque flex justify-center items-center bg-white mt-32 p-10 rounded-2xl drop-shadow-2xl">
    <div class="px-10 flex justify-center items-center">
      <img src="/cars-clash/public/images/marques<?php echo "{$marque["Image_marque"]}" ?>" alt="">
    </div>
    <div class="grid grid-cols-2 grow place-content-center gap-4">
      <div class="flex justify-start items-center">
        <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Nom:</p>
        <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $marque["Nom_marque"] ?></p>
      </div>
      <div class="flex justify-start items-center">
        <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Pays d'origine:</p>
        <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $marque["Pays_origine"] ?></p>
      </div>
      <div class="flex justify-start items-center">
        <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Siège social:</p>
        <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $marque["Siege_social"] ?></p>
      </div>
      <div class="flex justify-start items-center">
        <p class="font-bold text-myaccent mr-24 text-4xl w-4/12">Année de création:</p>
        <p class="font-bold text-myprimary mr-24 text-4xl opacity-50"><?php echo $marque["Annee_de_creation"] ?></p>
      </div>
    </div>
  </div>

  <div id="principales_vehicules" class="principales_vehicules flex flex-col mt-44">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">Principales voitures</p>
    <div class="grid grid-cols-4 gap-10">
      <?php foreach ($fourVehicules as $vehicule) {
            $cardView->content($vehicule);
        }?>
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
      <button class="rounded-2xl p-3 bg-myprimary text-white text-2xl" onclick="prevVehiculeSlide()">Précédent</button>
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


</div>
<?php
}

    public function showPageMarque($idMarque)
    {
        $this->head();
        $this->header();
        $this->content($idMarque);
        $this->footer();
    }
}