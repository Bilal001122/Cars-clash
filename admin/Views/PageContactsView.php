<?php
require_once 'Views/GlobalView.php';
require_once 'Controllers/GestionParamsController.php';

class PageContactsView extends GlobalView
{
    public function content()
    {
        $controller = new GestionParamsController();
        $allContacts = $controller->getAllContacts();
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
            <button type="submit" name="goto-ajouter-contact"
              class="marques_container_add_button bg-myprimary mt-2">Ajouter
              Contact</button>
          </form>
        </div>
        <div class="marques_container_table">
          <div class="marques_container_table_title">Les Contacts</div>
          <div class="marques_container_table_real_table">
            <table id="example" class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nom contact</th>
                  <th>Lien</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
foreach ($allContacts as $contact) {
            ?>
                <tr>
                  <td><?php echo $contact['id'] ?></td>
                  <td class="w-1/6"><?php echo $contact['nom_contact'] ?></td>
                  <td class="text-ellipsis w-2/6"><?php echo $contact['lien'] ?></td>
                  <td>
                    <img class="max-h-24 mx-auto "
                      src="/cars-clash/public/images/<?php echo $contact['image'] ?>" alt="">
                  </td>
                  <td class="actions_container">
                    <form class="d-inline-block" action="./redirect.php" method="POST">
                      <input type="hidden" value="<?php echo $contact['id'] ?>" name="ID_Contact">
                      <button type="submit" name="goto-modifier-contact" title="modifier">
                        <ion-icon class="modify-icon" name="create"></ion-icon>
                      </button>
                    </form>
                    <form class="d-inline-block" action="./redirect.php" method="POST">
                      <input type="hidden" value="<?php echo $contact['id'] ?>" name="ID_Contact">
                      <button type="submit" name="supprimer-contact" title="supprimer">
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

    public function showPageContacts()
    {
        $this->head();
        $this->header();
        $this->content();
    }
}