<?php

class VehiculesMarquesView
{

    public function vehiculesMarques()
    {
        ?>
<div class="vehicules_marques_container">
  <div class="vehicules_marques_container_buttons">
    <a class="vehicules_marques_container_buttons_ajouter_vehicule">Ajouter une véhicule</a>
    <a class="vehicules_marques_container_buttons_ajouter_marque">Ajouter une marque</a>
  </div>
  <div class="vehicules_marques_container_marques">
    <div class="vehicules_marques_container_marques_title">Les Marques</div>
    <div class="vehicules_marques_container_marques_table"></div>
  </div>
  <div class="vehicules_marques_container_vehicules">
    <div class="vehicules_marques_container_vehicules_title">Les Véhicules</div>
    <div class="vehicules_marques_container_vehicules_table"></div>
  </div>
</div>
<?php
}

}