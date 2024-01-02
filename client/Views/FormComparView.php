<?php

class FormComparView
{

    public function content($marques, $numeroVoiture, $required = false)
    {
        ?>

<div
  class="comparaison_section_container grid grid-cols-2 place-content-center bg-white p-5 rounded-xl drop-shadow-2xl">
  <p class="col-span-2 font-bold text-3xl">Voiture n°<?php echo $numeroVoiture ?></p>
  <p class="col-span-2  opacity-60 font-semibold">Veuillez renseigner les détails pour la comparaison.</p>
  <div class="flex flex-col">
    <label class="font-bold py-4" for="marque_<?php echo $numeroVoiture ?>">Marque</label>
    <select
      class="p-3 w-8/12 bg-myaccent bg-opacity-5 rounded-xl ring-2 ring-gray-300 focus:outline-none focus:ring-myprimary focus:ring-2"
      name="marque_<?php echo $numeroVoiture ?>" id="marque_<?php echo $numeroVoiture ?>"
      <?php if ($required) {echo "required";}?>>
      <?php foreach ($marques as $marque) {
            ?>
      <option value="<?php echo $marque['Nom_marque'] ?>" <?php if (isset($_GET['marque_' . $numeroVoiture . ''])) {
                if (strtolower($_GET['marque_' . $numeroVoiture . '']) === strtolower($marque['Nom_marque'])) {
                    echo "selected";
                }
            }?>> <?php echo $marque['Nom_marque'] ?> </option>
      <?php
}?>
    </select>
  </div>
  <div class="flex flex-col">
    <label class="font-bold py-4" for="modele_<?php echo $numeroVoiture ?>">Modèle</label>
    <input placeholder="Modèle"
      class="p-3 w-8/12 bg-myaccent bg-opacity-5 rounded-xl ring-2 ring-gray-300 focus:outline-none focus:ring-myprimary focus:ring-2"
      type="text" name="modele_<?php echo $numeroVoiture ?>" id="modele_<?php echo $numeroVoiture ?>"
      <?php if ($required) {echo "required";}?> <?php if (isset($_GET['modele_' . $numeroVoiture . ''])) {
            echo "value='" . $_GET['modele_' . $numeroVoiture . ''] . "'";
        }
        ?>>
  </div>
  <div class="flex flex-col">
    <label class="font-bold py-4" for="version_<?php echo $numeroVoiture ?>">Version</label>
    <input placeholder="Version"
      class="p-3 w-8/12 bg-myaccent bg-opacity-5 rounded-xl ring-2 ring-gray-300 focus:outline-none focus:ring-myprimary focus:ring-2"
      type="text" name="version_<?php echo $numeroVoiture ?>" id="version_<?php echo $numeroVoiture ?>"
      <?php if ($required) {echo "required";}?> <?php if (isset($_GET['version_' . $numeroVoiture . ''])) {
            echo "value='" . $_GET['version_' . $numeroVoiture . ''] . "'";
        }?>>
  </div>
  <div class="flex flex-col">
    <label class="font-bold py-4" for="annee_<?php echo $numeroVoiture ?>">Année</label>
    <input placeholder="Année"
      class="p-3 w-8/12 bg-myaccent bg-opacity-5 rounded-xl ring-2 ring-gray-300 focus:outline-none focus:ring-myprimary focus:ring-2"
      type="text" name="annee_<?php echo $numeroVoiture ?>" id="annee_<?php echo $numeroVoiture ?>"
      <?php if ($required) {echo "required";}?> <?php if (isset($_GET['annee_' . $numeroVoiture . ''])) {
            echo "value='" . $_GET['annee_' . $numeroVoiture . ''] . "'";
        }?>>
  </div>
</div>
<?php
}
}