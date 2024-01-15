<?php

require_once 'GlobalView.php';
require_once 'MenuView.php';
require_once 'Controllers/GestionComparaisonController.php';

class PageComparaison2View extends GlobalView
{
    public function content()
    {
        $accueilController = new GestionAccueilController();
        $menuView = new MenuView();
        $formComparView = new FormComparView();
        $marques = $accueilController->getMarques();
        $comparatorController = new GestionComparaisonController();
        $vehicule_1 = $comparatorController->getVehicule($_GET['marque_1'], $_GET['modele_1'], $_GET['version_1'], $_GET['annee_1']);
        $vehicule_2 = $comparatorController->getVehicule($_GET['marque_2'], $_GET['modele_2'], $_GET['version_2'], $_GET['annee_2']);
        $comparatorController->compareTwoVehicules($_GET['marque_1'], $_GET['modele_1'], $_GET['version_1'], $_GET['annee_1'], $_GET['marque_2'], $_GET['modele_2'], $_GET['version_2'], $_GET['annee_2']);

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

    <p id="table-result" class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10 mt-32">Voici le résultat de la
      comparaison
    </p>
    <table class="table_compare w-full bg-white">
      <thead>
        <tr>
          <th class="text-3xl">Caractéristique</th>
          <th>
            <form action="./redirect.php" method="post">
              <input type="hidden" value="<?php echo $vehicule_1['ID_Vehicule'] ?>" name="idVehicule">
              <input type="hidden" value="<?php echo $_GET['idClient'] ?>" name="idClient">
              <button type="submit" name="show-car-details">
                <img class="w-52 inline-block"
                  src="/cars-clash/public/images/vehicules<?php echo $vehicule_1['Image_vehicule'] ?>" alt="">
              </button>
            </form>
          </th>
          <th>
            <form action="./redirect.php" method="post">
              <input type="hidden" value="<?php echo $vehicule_2['ID_Vehicule'] ?>" name="idVehicule">
              <input type="hidden" value="<?php echo $_GET['idClient'] ?>" name="idClient">
              <button type="submit" name="show-car-details">
                <img class="w-52 inline-block"
                  src="/cars-clash/public/images/vehicules<?php echo $vehicule_2['Image_vehicule'] ?>" alt="">
              </button>
            </form>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-black font-bold text-3xl">Modèle</td>
          <td class="text-black font-semibold text-2xl"><?php echo $vehicule_1['Modele'] ?></td>
          <td class="text-black font-semibold text-2xl"><?php echo $vehicule_2['Modele'] ?></td>
        </tr>
        <tr>
          <td class="text-black font-bold text-3xl">Version</td>
          <td class="text-black font-semibold text-2xl"><?php echo $vehicule_1['Version'] ?></td>
          <td class="text-black font-semibold text-2xl"><?php echo $vehicule_2['Version'] ?></td>
        </tr>
        <tr>
          <td class="text-black font-bold text-3xl">Année</td>
          <td class="text-black font-semibold text-2xl"><?php echo $vehicule_1['Annee'] ?></td>
          <td class="text-black font-semibold text-2xl"><?php echo $vehicule_2['Annee'] ?></td>
        </tr>
        <tr>
          <td class="text-black font-bold text-3xl">Dimensions</td>
          <td class="text-black font-semibold text-2xl"><?php echo $vehicule_1['Dimensions'] ?></td>
          <td class="text-black font-semibold text-2xl"><?php echo $vehicule_2['Dimensions'] ?></td>
        </tr>
        <tr>
          <td class="text-black font-bold text-3xl">Consommation</td>
          <td class="text-black font-semibold text-2xl"><?php echo $vehicule_1['Consommation'] ?></td>
          <td class="text-black font-semibold text-2xl"><?php echo $vehicule_2['Consommation'] ?></td>
        </tr>
        <tr>
          <td class="text-black font-bold text-3xl">Moteur</td>
          <td class="text-black font-semibold text-2xl"><?php echo $vehicule_1['Moteur'] ?></td>
          <td class="text-black font-semibold text-2xl"><?php echo $vehicule_2['Moteur'] ?></td>
        </tr>

        <tr>
          <td class="text-black font-bold text-3xl">Performance</td>
          <td class="text-black font-semibold text-2xl"><?php echo $vehicule_1['Performance'] ?></td>
          <td class="text-black font-semibold text-2xl"><?php echo $vehicule_2['Performance'] ?></td>
        </tr>

        <tr>
          <td class="text-myprimary font-bold text-3xl">Prix</td>
          <td class="text-myprimary font-bold text-3xl"><?php echo $vehicule_1['Prix'] ?>$</td>
          <td class="text-myprimary font-bold text-3xl"><?php echo $vehicule_2['Prix'] ?>$</td>
        </tr>
      </tbody>
    </table>
  </section>
</div>
<?php
}

    public function showPageComparaison2()
    {
        $this->head();
        $this->header();
        $this->content();
        $this->footer();
    }
}