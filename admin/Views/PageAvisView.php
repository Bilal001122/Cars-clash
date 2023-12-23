<?php
require_once 'Models/GestionAvisModel.php';
class PageAvisView extends GlobalView
{

    public function content()
    {
        $controller = new GestionAvisController();
        $allAvis = $controller->getAllAvis();
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
      <div class="menu_item avis actuel">
        <a class="menu_item_link actuel" href="./gestion-avis">Avis</a>
      </div>
      <div class="menu_item news">
        <a class="menu_item_link" href="./gestion-news">News</a>
      </div>
      <div class="menu_item utilisateurs">
        <a class="menu_item_link " href="./gestion-utilisateurs">Utilisateurs</a>
      </div>
      <div class="menu_item parametres">
        <a class="menu_item_link" href="./gestion-params">Paramètres</a>
      </div>
    </div>

    <div class="dashboard_body">
      <div class="marques_container">
        <div class="marques_container_table">
          <div class="marques_container_table_title">Les Avis</div>
          <div class="marques_container_table_real_table">
            <table id="example" class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Utilisateur</th>
                  <th>Véhicule avisé</th>
                  <th>Commentaire</th>
                  <th>Status</th>
                  <th>Note</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
foreach ($allAvis as $avis) {
            ?>
                <tr>
                  <td><?php echo $avis['ID_Avis'] ?></td>
                  <td><?php echo $avis['Nom_utilisateur'] ?></td>
                  <td><?php echo $avis['Modele'] ?></td>
                  <td class="w-96"><?php echo $avis['Commentaire'] ?></td>
                  <td><?php echo $avis['Statut'] ?></td>
                  <td><?php echo $avis['Note'] ?></td>
                  <td class="actions_container">
                    <form class="d-inline-block" action="./redirect.php" method="POST">
                      <input type="hidden" value="<?php echo $avis['ID_Avis'] ?>" name="ID_Avis">
                      <button type="submit" name="valider-commentaire" title="valider commentaire">
                        <ion-icon class="modify-icon text-green-500" name="checkmark-circle-outline"></ion-icon>
                      </button>
                    </form>
                    <form class="d-inline-block" action="./redirect.php" method="POST">
                      <input type="hidden" value="<?php echo $avis['ID_Avis'] ?>" name="ID_Avis">
                      <button type="submit" name="refuser-commentaire" title="refuser commentaire">
                        <ion-icon class="modify-icon text-red-600" name="archive-outline"></ion-icon>
                      </button>
                    </form>
                    <form class="d-inline-block" action="./redirect.php" method="POST">
                      <input type="hidden" value="<?php echo $avis['ID_Utilisateur'] ?>" name="ID_User">
                      <button type="submit" name="bloquer-user-from-avis" title="bloquer utilisatuer">
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

    public function showPageAvis()
    {
        $this->head();
        $this->header();
        $this->content();
        ?>
<?php
}

}