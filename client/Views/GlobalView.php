<?php
require_once 'Controllers/GestionAccueilController.php';
require_once 'Controllers/GestionContactsController.php';

class GlobalView
{
    public function head()
    {
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
    rel="stylesheet">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="/cars-clash/public/bootstrap.min.css">
  <link rel="stylesheet" href="/cars-clash/public/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="/cars-clash/public/css/client.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="/cars-clash/public/jquery.min.js"></script>
  <script defer src="/cars-clash/public/jquery.dataTables.min.js"></script>
  <script defer src="/cars-clash/public/jquery.dataTables.min.js"></script>
  <script defer src="/cars-clash/client/client.js"></script>
  <script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          myprimary: '#3563e9',
          mysecondary: '#c3d4e9',
          myaccent: '#1a202c',
          mybody: '#f6f7f9',
        }
      }
    }
  }
  </script>
  <script defer src="client.js"></script>
  <title>Cars Clash</title>
</head>
<?php
}

    public function header()
    {
        $contactsController = new GestionContactsController();
        $contacts = $contactsController->getAllContacts();
        ?>
<header class="header">
  <form action="./redirect.php" method="post">
    <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>">
    <button type="submit" name="goto-page-accueil">
      <div class="header_logo cursor-pointer">
        <img src="/cars-clash/public/images/logo_without_bg.png" alt="logo" class="header_logo_img">
        <p class="animate-bounce header_logo_text">CARS CLASH</p>
      </div>
    </button>
  </form>
  <div class="social_links">
    <?php foreach ($contacts as $contact) {?>
    <a href="<?php echo $contact['lien'] ?>" target="_blank" class="social_links_link">
      <img title="<?php echo $contact['nom_contact'] ?>" src="/cars-clash/public/images/<?php echo $contact['image'] ?>"
        alt="<?php echo $contact['nom_contact'] ?>" class="social_links_link_img">
    </a>
    <?php }?>
    <!-- <a href="https://www.facebook.com/" target="_blank" class="social_links_link">
      <img title="facebook" src="/cars-clash/public/images/facebook.png" alt="Facebook" class="social_links_link_img">
    </a>
    <a href="https://www.twitter.com/" target="_blank" class="social_links_link">
      <img title="twitter" src="/cars-clash/public/images/twitter.png" alt="Twitter" class="social_links_link_img">
    </a>
    <a href="https://www.linkedin.com/" target="_blank" class="social_links_link">
      <img title="linkedIn" src="/cars-clash/public/images/linkedIn.png" alt="LinkedIn" class="social_links_link_img">
    </a> -->

    <form action="./redirect.php" method="POST">
      <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>">
      <button type="submit" name="user-profil">
        <p title="votre profil"
          class="hover:scale-110 transition-all duration-300 font-semibold animate-pulse text-myprimary">
          <?php

        if (isset($_GET['idClient'])) {
            $idClient = $_GET['idClient'];
            $controller = new GestionAccueilController();
            $client = $controller->getClient($idClient);
            echo $client['Nom_utilisateur'] . ' ' . $client['Prenom'];
        }
        ?>
        </p>
      </button>
    </form>
    <form class="form_dcnx" action="./redirect.php" method="post">
      <button type="submit" name="logout">
        <ion-icon class="modify-icon text-red-600 size-8 p-3 " name="log-in-outline" title="se déconnecter">
        </ion-icon>
      </button>
    </form>
  </div>
</header>
<?php
}

    public function footer()
    {
        $contactsController = new GestionContactsController();
        $contacts = $contactsController->getAllContacts();
        ?>
<div class="footer flex flex-col bg-white p-10 mt-20">
  <div class="grid grid-cols-5">
    <div class="header_logo flex flex-col col-span-2">
      <div class="flex justify-start items-center">
        <img src="/cars-clash/public/images/logo_without_bg.png" alt="logo" class="header_logo_img">
        <p class=" header_logo_text">CARS CLASH</p>
      </div>
      <div>
        <p>Facilitez vos choix automobiles avec Cars Clash, où la comparaison devient simple, pour des ventes plus
          performantes et sans tracas.</p>
      </div>
    </div>
    <div>
      <p class="font-semibold hover:underline transition-all duration-300 cursor-pointer">À propos</p>
    </div>
    <div>
      <p class="font-semibold hover:underline transition-all duration-300 cursor-pointer">Communauté</p>
    </div>
    <div class="flex flex-col gap-2">
      <p class="font-semibold mb-10 hover:underline transition-all duration-300 cursor-pointer">Réseaux sociaux</p>
      <?php foreach ($contacts as $contact) {?>
      <a href="<?php echo $contact['lien'] ?>" target="_blank">
        <p class="hover:underline transition-all duration-300 cursor-pointer"><?php echo $contact['nom_contact'] ?></p>
      </a>
      <?php }?>
    </div>
  </div>
  <div class="flex pt-20 justify-between">
    <p class="text-center font-semibold">© 2023 Cars Clash.
      Tous droits réservés.</p>
    <div class="flex gap-4">
      <p class="font-semibold hover:underline transition-all duration-300 cursor-pointer">Politique de confidentialité
      </p>
      <p class="font-semibold hover:underline transition-all duration-300 cursor-pointer">Termes & conditions</p>
    </div>
  </div>
</div>
<?php
}

}