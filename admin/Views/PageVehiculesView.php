<?php
require_once 'Controllers/GestionVehiculesController.php';
class PageVehiculesView extends GlobalView
{

    public function content()
    {
        $controller = new GestionVehiculesController();
        $allVehicules = $controller->getAllVehicules();
        ?>

<body>
  <div class="body_container">
    <div class="menu">
      <div class="menu_item vehicules">
        <a class="menu_item_link actuel" href="./gestion-vehicules">Véhicules</a>
      </div>
      <div class="menu_item marques">
        <a class="menu_item_link " href="./gestion-marques">Marques</a>
      </div>
      <div class="menu_item avis">
        <a class="menu_item_link" href="./gestion-avis">Avis</a>
      </div>
      <div class="menu_item news">
        <a class="menu_item_link" href="./gestion-news">News</a>
      </div>
      <div class="menu_item utilisateurs">
        <a class="menu_item_link" href="./gestion-utilisateurs">Utilisateurs</a>
      </div>
      <div class="menu_item parametres">
        <a class="menu_item_link" href="./gestion-params">Paramètres</a>
      </div>
    </div>

    <div class="dashboard_body">
      <div class="marques_container">
        <div class="marques_container_add_button_container">
          <form action="./redirect.php" method="post">
            <button type="submit" name="goto-ajouter-vehicule"
              class="marques_container_add_button bg-myprimary mt-2">Ajouter
              une
              véhicule</button>
          </form>
        </div>
        <div class="marques_container_table">
          <div class="marques_container_table_title">Les Véhicules</div>
          <div class="marques_container_table_real_table">
            <table id="example" class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Modèle</th>
                  <th>Marque</th>
                  <th>Version</th>
                  <th>Année</th>
                  <th>Lien vers détails</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php

        foreach ($allVehicules as $vehicule) {
            ?>
                <tr>
                  <td><?php echo $vehicule['ID_Vehicule'] ?></td>
                  <td><?php echo $vehicule['Modele'] ?></td>
                  <td><?php echo $vehicule['Nom_marque'] ?></td>
                  <td><?php echo $vehicule['Version'] ?></td>
                  <td><?php echo $vehicule['Annee'] ?></td>
                  <td>
                    <form class="flex justify-center items-center" action="./redirect.php" method="POST">
                      <input type="hidden" value="<?php echo $vehicule['ID_Vehicule'] ?>" name="ID_Vehicule">
                      <button type="submit" name="goto-details-vehicule" title="détails">
                        <ion-icon class=" h-16 details-icon" name="eye"></ion-icon>
                      </button>
                    </form>
                  </td>
                  <td class="actions_container">
                    <form class="d-inline-block" action="./redirect.php" method="POST">
                      <input type="hidden" value="<?php echo $vehicule['ID_Vehicule'] ?>" name="ID_Vehicule">
                      <button type="submit" name="goto-modifier-vehicule" title="modifier">
                        <ion-icon class="modify-icon" name="create"></ion-icon>
                      </button>
                    </form>
                    <form class="d-inline-block" action="./redirect.php" method="POST">
                      <input type="hidden" value="<?php echo $vehicule['ID_Vehicule'] ?>" name="ID_Vehicule">
                      <button type="submit" name="supprimer-vehicule" title="supprimer">
                        <ion-icon class="delete-icon" name="trash-outline"></ion-icon>
                      </button>
                    </form>
                  </td>
                </tr><?php
}
        ?>

              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php
}

    public function showPageVehicule()
    {
        $this->head();
        $this->header();
        $this->content();
        ?>
<?php
}

}