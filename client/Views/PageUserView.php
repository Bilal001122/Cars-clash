<?php
require_once "GlobalView.php";
require_once "CarCardView.php";
require_once "Controllers/GestionUserController.php";

class PageUserView extends GlobalView
{

    public function content()
    {
        $marqueController = new GestionMarquesController();
        $favoris = $marqueController->getFavoris($_GET['idClient']);
        $carCardView = new CarCardView();
        $gestionUserController = new GestionUserController();
        $user = $gestionUserController->getUserInformation($_GET['idClient']);
        $userComments = $gestionUserController->getUserComments($_GET['idClient']);
        ?>
<div class="body w-11/12 mx-auto my-0 mb-96">
  <section class="user_infos">
    <div class="flex flex-col items-center justify-center mt-40">
      <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">Vos Informations</p>
      <form action="./redirect.php" method="post">
        <div
          class="grid grid-cols-3 gap-10 bg-white rounded-2xl drop-shadow-2xl px-28 py-10 place-content-center w-full">
          <div class="flex flex-col items-center justify-center place-content-center">
            <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class="rounded-full w-40 h-40">
          </div>
          <div class="flex justify-center items-center">
            <p class="text-center text-myaccent text-3xl font-bold pb-10 opacity-70  ">Nom: </p>
            <input name="nom" class="text-center text-myprimary text-3xl font-bold pb-10 opacity-70 "
              value="<?php echo $user['Nom_utilisateur'] ?>">
            </input>
          </div>
          <div class="flex justify-center items-center">
            <p class="text-center text-myaccent text-3xl font-bold pb-10 opacity-70  ">Prénom: </p>
            <input name="prenom" class="text-center text-myprimary text-3xl font-bold pb-5 opacity-70 "
              value="<?php echo $user['Prenom'] ?>">
            </input>
          </div>
          <div class="flex flex-col justify-center items-center">
            <p class="text-center text-myaccent text-3xl font-bold pb-10 opacity-70  ">Sexe: </p>
            <select name="sexe" class="text-center text-myprimary text-3xl font-bold pb-2 opacity-70">
              <option value="Homme">Homme</option>
              <option value="Femme">Femme</option>
            </select>
          </div>
          <div class="flex justify-center items-center">
            <p class="text-center text-myaccent text-3xl font-bold pb-10 opacity-70  ">Date de naissance: </p>
            <input name="date-naissance" type="date"
              class="text-center text-myprimary text-3xl font-bold pb-10 opacity-70 "
              value="<?php echo $user['Date_de_naissance'] ?>"></input>
          </div>
          <div class="flex justify-center items-center">
            <p class="text-center text-myaccent text-3xl font-bold pb-10 opacity-70 ">Email: </p>
            <input name="email_user" type="email"
              class="text-center text-myprimary text-3xl font-bold pb-10 opacity-70 "
              value="<?php echo $user['email_utilisateur'] ?>">
            </input>
          </div>

          <div class="col-span-3 flex justify-center items-center">
            <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>">
            <button
              class="bg-myprimary text-white font-bold p-4 text-2xl rounded-xl hover:scale-110 transition-all duration-300"
              type="submit" name="update-user-info">Mettre à jour mes infos</button>
          </div>
        </div>
      </form>
    </div>
  </section>
  <section class="news flex-col items-center justify-center mt-40">
    <!-- <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">Vos Favoris</p>
    <div class="grid grid-cols-4 gap-10">
      <?php
foreach ($favoris as $vehicule) {
            $carCardView->content($vehicule, true);
        }
        ?> -->

    <div cla id="vehicules-carousel" class="carousel mt-44 flex flex-col">
      <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">Vos Favoris</p>

      <?php
$chunkedVehicules = array_chunk($favoris, 4); // Divisez les voitures en groupes de 4
        foreach ($chunkedVehicules as $index => $slideVehicules) {
            echo '<div class="carousel-item' . ($index == 0 ? ' active' : '') . '">';
            ?>
      <div class="grid grid-cols-4 gap-10">
        <?php
foreach ($slideVehicules as $vehicule) {
                $carCardView->content($vehicule, true);
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


  <div id="avis-carousel" class="carousel flex flex-col">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10 mt-32">Vos avis
      <?php
$chunkedComments = array_chunk($userComments, 3); // Divisez les avis en groupes de 3
        foreach ($chunkedComments as $index => $slideComment) {
            echo '<div class="carousel-item' . ($index == 0 ? ' active' : '') . '">';
            ?>
    <div class="flex flex-col gap-4">
      <?php foreach ($slideComment as $comment) {?>
      <div class="flex flex-col gap-2 bg-white p-4 rounded-xl drop-shadow-2xl ">
        <p class="text-myprimary font-semibold text-2xl">
          <?php echo $comment['Modele'] ?>
        </p>
        <p class="ml-5"><?php echo $comment['Commentaire'] ?></p>

      </div>
      <?php }?>
    </div>
    <?php
echo '</div>';
        }
        ?>

  </div>

  <div class="flex justify-between  mt-10 px-20">
    <button class=" rounded-2xl  p-3 bg-myprimary text-white text-2xl for_avis"
      onclick="prevSlideAvis()">Précédent</button>
    <button class=" rounded-2xl  p-3 bg-myprimary text-white text-2xl for_avis"
      onclick="nextSlideAvis()">Suivant</button>
  </div>

  <script>
  let currentSlide = 0;
  const carouselItems = document.querySelectorAll('#avis-carousel .carousel-item');

  const prevButton = document.querySelector(
    '.rounded-2xl.p-3.bg-myprimary.text-white.text-2xl.for_avis[onclick="prevSlideAvis()"]');
  const nextButton = document.querySelector(
    '.rounded-2xl.p-3.bg-myprimary.text-white.text-2xl.for_avis[onclick="nextSlideAvis()"]');

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

  function nextSlideAvis() {
    showSlide(currentSlide + 1);
  }

  function prevSlideAvis() {
    console.log(currentSlide)
    showSlide(currentSlide - 1);
  }

  updateButtons(); // Appeler la fonction au chargement de la page pour initialiser l'état des boutons
  </script>
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