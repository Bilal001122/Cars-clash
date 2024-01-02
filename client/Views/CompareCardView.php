<?php
require_once 'Controllers/GestionMarquesController.php';
class CompareCardView
{

    public function content($vehicule)
    {
        $controller = new GestionMarquesController();
        $marque = $controller->getMarqueByIdVehicule($vehicule['ID_Vehicule']);
        ?>

<div
  class="comparaison_section_container grid grid-cols-2 place-content-center bg-white p-5 rounded-xl drop-shadow-2xl">
  <div class="flex flex-col">
    <label class="font-bold py-4">Marque</label>
    <input
      class="p-3 w-8/12 bg-myaccent bg-opacity-5 rounded-xl ring-2 ring-gray-300 focus:outline-none focus:ring-myprimary focus:ring-2"
      disabled value="<?php echo $marque['Nom_marque'] ?>">
  </div>
  <div class="flex flex-col">
    <label class="font-bold py-4">Modèle</label>
    <input placeholder="Modèle"
      class="p-3 w-8/12 bg-myaccent bg-opacity-5 rounded-xl ring-2 ring-gray-300 focus:outline-none focus:ring-myprimary focus:ring-2"
      type="text" disabled value="<?php echo $vehicule['Modele'] ?>">
  </div>
  <div class="flex flex-col">
    <label class="font-bold py-4">Version</label>
    <input placeholder="Version"
      class="p-3 w-8/12 bg-myaccent bg-opacity-5 rounded-xl ring-2 ring-gray-300 focus:outline-none focus:ring-myprimary focus:ring-2"
      type="text" disabled value="<?php echo $vehicule['Version'] ?>">
  </div>
  <div class="flex flex-col">
    <label class="font-bold py-4">Année</label>
    <input placeholder="Année"
      class="p-3 w-8/12 bg-myaccent bg-opacity-5 rounded-xl ring-2 ring-gray-300 focus:outline-none focus:ring-myprimary focus:ring-2"
      type="text" disabled value="<?php echo $vehicule['Annee'] ?>">
  </div>
</div>
<?php
}
}