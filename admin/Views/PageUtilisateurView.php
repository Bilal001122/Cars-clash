<?php

require_once "Controllers/GestionUtilisateursController.php";
class PageUtilisateurView extends GlobalView
{

    public function content()
    {
        $controller = new GestionUtilisateurController();
        $allUsers = $controller->getAllUsers();
        ?>

<body>
  <div class="body_container">
    <div class="menu">
      <div class="menu_item vehicules">
        <a class="menu_item_link" href="./gestion-vehicules">Véhicules</a>
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
        <a class="menu_item_link actuel" href="./gestion-utilisateurs">Utilisateurs</a>
      </div>
      <div class="menu_item parametres">
        <a class="menu_item_link" href="./gestion-params">Paramètres</a>
      </div>
    </div>

    <div class="dashboard_body">
      <div class="marques_container">
        <div class="marques_container_table">
          <div class="marques_container_table_title">Les Utilisateurs</div>
          <div class="marques_container_table_real_table">
            <table id="example" class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nom</th>
                  <th>Prénom</th>
                  <th>Sexe</th>
                  <th>Date de naissance</th>
                  <th>Status</th>
                  <th>Bloqué</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php

        foreach ($allUsers as $user) {
            ?>
                <tr>
                  <td><?php echo $user['ID_Utilisateur'] ?></td>
                  <td><?php echo $user['Nom_utilisateur'] ?></td>
                  <td><?php echo $user['Prenom'] ?></td>
                  <td><?php echo $user['Sexe'] ?></td>
                  <td><?php echo $user['Date_de_naissance'] ?></td>
                  <td><?php echo $user['Status_de_validation'] ?></td>
                  <td><?php echo $user['bloque'] ?></td>

                  <td class="actions_container">
                    <form class="d-inline-block" action="./redirect.php" method="POST">
                      <input type="hidden" value="<?php echo $user['ID_Utilisateur'] ?>" name="ID_User">
                      <button type="submit" name="valider-user" title="valider user">
                        <ion-icon class="modify-icon text-green-500" name="checkmark-circle-outline"></ion-icon>
                      </button>
                    </form>
                    <form class="d-inline-block" action="./redirect.php" method="POST">
                      <input type="hidden" value="<?php echo $user['ID_Utilisateur'] ?>" name="ID_User">
                      <button type="submit" name="bloquer-user" title="bloquer">
                        <ion-icon class="delete-icon" name="alert-circle-outline"></ion-icon>
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

    public function showPageUtilisateurs()
    {
        $this->head();
        $this->header();
        $this->content();
        ?>
<?php
}

}