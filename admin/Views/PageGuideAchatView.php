<?php
require_once 'Views/GlobalView.php';
require_once 'Controllers/GestionParamsController.php';
class PageGuideAchatView extends GlobalView
{

    public function content()
    {
        $controller = new GestionParamsController();
        $allGuides = $controller->getAllGuides();
        ?>

<body>
  <div class="body_container">
    <div class="menu">
      <div class="menu_item vehicules">
        <a class="menu_item_link " href="./gestion-vehicules">Véhicules</a>
      </div>
      <div class="menu_item marques">
        <a class="menu_item_link " href="./gestion-marques">Marques</a>
      </div>
      <div class="menu_item avis">
        <a class="menu_item_link" href="./gestion-avis">Avis</a>
      </div>
      <div class="menu_item news">
        <a class="menu_item_link " href="./gestion-news">News</a>
      </div>
      <div class="menu_item utilisateurs">
        <a class="menu_item_link" href="./gestion-utilisateurs">Utilisateurs</a>
      </div>
      <div class="menu_item parametres">
        <a class="menu_item_link actuel" href="./gestion-params">Paramètres</a>
      </div>
    </div>

    <div class="dashboard_body">
      <div class="marques_container">
        <div class="marques_container_add_button_container">
          <form action="./redirect.php" method="post">
            <button type="submit" name="goto-ajouter-guide"
              class="marques_container_add_button bg-myprimary mt-2">Ajouter
              Guide d'achat</button>
          </form>
        </div>
        <div class="marques_container_table">
          <div class="marques_container_table_title">Les Guides d'achats</div>
          <div class="marques_container_table_real_table">
            <table id="example" class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Titre</th>
                  <th>Contenu</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
foreach ($allGuides as $guide) {
            ?>
                <tr>
                  <td><?php echo $guide['ID_Guide'] ?></td>
                  <td class="w-1/6"><?php echo $guide['Titre_guide_achat'] ?></td>
                  <td class="text-ellipsis w-2/6"><?php echo $guide['Contenu_guide_achat'] ?></td>
                  <td class="actions_container">
                    <form class="d-inline-block" action="./redirect.php" method="POST">
                      <input type="hidden" value="<?php echo $guide['ID_Guide'] ?>" name="ID_Guide">
                      <button type="submit" name="goto-modifier-guide" title="modifier">
                        <ion-icon class="modify-icon" name="create"></ion-icon>
                      </button>
                    </form>
                    <form class="d-inline-block" action="./redirect.php" method="POST">
                      <input type="hidden" value="<?php echo $guide['ID_Guide'] ?>" name="ID_Guide">
                      <button type="submit" name="supprimer-guide" title="supprimer">
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

    public function showPageGuideAchat()
    {
        $this->head();
        $this->header();
        $this->content();
    }
}