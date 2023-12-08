<?php
require_once 'Controllers/GestionMarquesController.php';
class PageMarquesView extends GlobalView
{

    public function content()
    {
        $controller = new GestionMarquesController();
        $allMarques = $controller->getAllMarques();
        ?>

<body>
  <div class="body_container">
    <div class="menu">
      <div class="menu_item vehicules">
        <a class="menu_item_link" href="./gestion-vehicules">Véhicules</a>
      </div>
      <div class="menu_item marques">
        <a class="menu_item_link actuel" href="./gestion-marques">Marques</a>
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
          <a class="marques_container_add_button">Ajouter une marque</a>
        </div>
        <div class="marques_container_table">
          <div class="marques_container_table_title">Les Marques</div>
          <div class="marques_container_table_real_table">
            <table id="example" class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nom</th>
                  <th>Pays origine</th>
                  <th>Siege sociale</th>
                  <th>Année de création</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php

        foreach ($allMarques as $marque) {
            ?>
                <tr>
                  <td><?php echo $marque['ID_Marque'] ?></td>
                  <td><?php echo $marque['Nom_marque'] ?></td>
                  <td><?php echo $marque['Pays_origine'] ?></td>
                  <td><?php echo $marque['Siege_social'] ?></td>
                  <td><?php echo $marque['Annee_de_creation'] ?></td>
                  <td><?php echo $marque['Image_marque'] ?></td>
                  <td class="actions_container">
                    <a href="./gestion-marques?modifier=<?php echo $marque['ID_Marque'] ?>" title="Modifier">
                      <ion-icon class="modify-icon" name="create"></ion-icon>
                    </a>
                    <a href="./gestion-marques?supprimer=<?php echo $marque['ID_Marque'] ?>" title="Supprimer">
                      <ion-icon class="delete-icon" name="trash-outline"></ion-icon>
                    </a>
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

    public function showPageMarques()
    {
        $this->head();
        $this->header();
        $this->content();
        ?>
<?php
}

}