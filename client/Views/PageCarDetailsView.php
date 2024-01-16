<?php
require_once 'Views/GlobalView.php';
require_once 'Views/MenuView.php';
require_once 'Views/CarCardDetailsView.php';
require_once 'Controllers/GestionMarquesController.php';
require_once 'Controllers/GestionAvisController.php';
class PageCarDetailsView extends GlobalView
{

    public function content($idClient, $idMarque, $idVehicule)
    {
        $marqueController = new GestionMarquesController();
        $carCardDetailsView = new CarCardDetailsView();
        $avisController = new GestionAvisController();
        $vehicule = $marqueController->getVehicule($idVehicule);
        $menuView = new MenuView();
        $threeAvis = $avisController->getThreeAvis($idVehicule);
        $allAvis = $avisController->getAllAvis($idVehicule);
        ?>
<div class="body w-11/12 mx-auto my-0 mb-96">
  <?php

        if (isset($_GET['isFromAvis'])) {
            $menuView->content(4);
        } else {
            $menuView->content(3);
        }
        ?>
  <div class="flex flex-col gap-14">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10 mt-32">Description</p>
    <?php
if (isset($_GET['isFromAvis'])) {
            $carCardDetailsView->content($vehicule, true);
        } else {
            $carCardDetailsView->content($vehicule);
        }
        ?>
  </div>
  <!-- Donnez note et avis -->

  <div class="flex gap-10">
    <div class="bg-white p-10 pb-20 rounded-2xl drop-shadow-2xl">
      <form class="grid grid-cols-5 gap-x-10" action="./redirect.php" method="post">
        <input type="hidden" value="<?php echo $vehicule['ID_Vehicule'] ?>" name="idVehicule">
        <input type="hidden" value="<?php echo $_GET['idClient'] ?>" name="idClient">
        <input type="hidden" value="<?php echo $_GET['idMarque'] ?>" name="idMarque">
        <p class="font-bold text-4xl py-4 col-span-5">Donnez une note /10</p>
        <div class="col-span-3 place-content-start">
          <div class="flex flex-col">
            <label class="font-bold py-4" for="note">Note</label>
            <input placeholder="Note"
              class="p-3 w-12/12 bg-myaccent bg-opacity-5 rounded-xl ring-2 ring-gray-300 focus:outline-none focus:ring-myprimary focus:ring-2"
              type="number" name="note" id="note" min="0" max="10" required>
          </div>
        </div>
        <div class="w-full hover:scale-125 transition-all duration-300 col-span-2 place-self-end scale-110">
          <button class=" rounded-2xl w-full p-3 bg-myprimary text-white text-2xl" type="submit" name="add-note">
            Valider
          </button>
        </div>
      </form>
    </div>
    <div class="bg-white p-10 pb-20 rounded-2xl drop-shadow-2xl grow">
      <form class="grid grid-cols-5 gap-x-10" action="./redirect.php" method="post">
        <input type="hidden" value="<?php echo $vehicule['ID_Vehicule'] ?>" name="idVehicule">
        <input type="hidden" value="<?php echo $_GET['idClient'] ?>" name="idClient">
        <input type="hidden" value="<?php echo $_GET['idMarque'] ?>" name="idMarque">
        <p class="font-bold text-4xl py-4 col-span-5">Donnez avis</p>
        <div class="col-span-4 place-content-start">
          <div class="flex flex-col">
            <label class="font-bold py-4" for="avis">Avis</label>
            <input placeholder="Avis"
              class="p-3 w-12/12 bg-myaccent bg-opacity-5 rounded-xl ring-2 ring-gray-300 focus:outline-none focus:ring-myprimary focus:ring-2"
              type="text" name="avis" id="avis" required>
          </div>
        </div>
        <div class="w-full hover:scale-125 transition-all duration-300 col-span-1 place-self-end scale-110">
          <button class=" rounded-2xl w-full p-3 bg-myprimary text-white text-2xl" type="submit" name="add-avis">
            Valider
          </button>
        </div>
      </form>
    </div>
  </div>
  <!-- Fin donnez note et avis -->

  <?php

        if (!isset($_GET['isFromAvis'])) {
            ?>
  <!-- Les 3 avis les plus apprecis -->
  <div class="flex flex-col gap-4">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10 mt-32">Les 3 avis les plus apprécis
    </p>
    <?php foreach ($threeAvis as $avis) {?>
    <div class="flex flex-col gap-2 bg-white p-4 rounded-xl drop-shadow-2xl">
      <p class=" animate-bounce text-myprimary font-semibold text-3xl"><?php echo $avis['Nom_utilisateur'] ?>
        <?php echo $avis['Prenom'] ?></p>
      <p><?php echo $avis['Commentaire'] ?></p>
    </div>
    <?php }?>
  </div>
  <!-- Fin Les 3 avis les plus apprecis  -->
  <?php
}
        ?>

  <!-- Tous les avis -->

  <!-- <div class="flex flex-col gap-14">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10 mt-32">Touts les avis
    </p>
    <?php foreach ($allAvis as $avis) {?>
    <div class="flex flex-col gap-14 bg-white p-20 rounded-2xl drop-shadow-2xl">
      <p class=" animate-bounce text-myprimary font-semibold text-3xl"><?php echo $avis['Nom_utilisateur'] ?>
        <?php echo $avis['Prenom'] ?></p>
      <p><?php echo $avis['Commentaire'] ?></p>
    </div>
    <?php }?>
  </div> -->

  <!-- Tous les avis -->

  <div id="avis-carousel" class="carousel">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10 mt-32">Tous les avis

      <?php
$chunkedAvis = array_chunk($allAvis, 3); // Divisez les avis en groupes de 3
        foreach ($chunkedAvis as $index => $slideAvis) {
            echo '<div class="carousel-item' . ($index == 0 ? ' active' : '') . '">';
            ?>
    <div class="flex flex-col gap-4">
      <?php foreach ($slideAvis as $avis) {?>
      <div class="flex flex-col gap-2 bg-white p-4 rounded-xl drop-shadow-2xl ">
        <p class="animate-bounce text-myprimary font-semibold text-3xl"><?php echo $avis['Nom_utilisateur'] ?>
          <?php echo $avis['Prenom'] ?></p>
        <p><?php echo $avis['Commentaire'] ?></p>
      </div>
      <?php }?>
    </div>
    <?php
echo '</div>';
        }
        ?>
  </div>

  <div class="flex justify-between px-20">

    <button class=" rounded-2xl  p-3 bg-myprimary text-white text-2xl" onclick="prevSlide()">Précédent</button>
    <button class=" rounded-2xl  p-3 bg-myprimary text-white text-2xl" onclick="nextSlide()">Suivant</button>
  </div>

  <script>
  let currentSlide = 0;
  const carouselItems = document.querySelectorAll('.carousel-item');
  const prevButton = document.querySelector('.rounded-2xl.p-3.bg-myprimary.text-white.text-2xl[onclick="prevSlide()"]');
  const nextButton = document.querySelector('.rounded-2xl.p-3.bg-myprimary.text-white.text-2xl[onclick="nextSlide()"]');

  function updateButtons() {
    if (currentSlide === 0) {
      prevButton.disabled = true;
      prevButton.style.opacity = 0.2;
    } else {
      prevButton.disabled = false;
      prevButton.style.opacity = 1;
    }

    if (currentSlide === carouselItems.length - 1) {
      nextButton.disabled = true;
      nextButton.style.opacity = 0.2;
    } else {
      nextButton.disabled = false;
      nextButton.style.opacity = 1;
    }

  }

  function showSlide(index) {
    currentSlide = (index + carouselItems.length) % carouselItems.length;

    carouselItems.forEach(item => {
      item.classList.remove('active');
    });

    carouselItems[currentSlide].classList.add('active');
    updateButtons();
  }

  function nextSlide() {
    showSlide(currentSlide + 1);
  }

  function prevSlide() {
    showSlide(currentSlide - 1);
  }

  updateButtons(); // Appeler la fonction au chargement de la page pour initialiser l'état des boutons
  </script>

  <!-- Fin tous les avis -->
</div>
</div>
<?php
}

    public function showPageCarDetails($idClient, $idMarque, $idVehicule)
    {
        $this->head();
        $this->header();
        $this->content($idClient, $idMarque, $idVehicule);
        $this->footer();
    }
}