<?php
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
  <link rel="stylesheet" href="./../../cars-clash/extra_files/bootstrap.min.css">
  <link rel="stylesheet" href="./../../cars-clash/extra_files/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="Views/css/admin.css" />
  <script defer src="./../../cars-clash/extra_files/jquery.min.js"></script>
  <script defer src="./../../cars-clash/extra_files/jquery.dataTables.min.js"></script>
  <script defer src="./../../cars-clash/extra_files/jquery.dataTables.min.js"></script>
  <script defer src="admin.js"></script>
  <title>Cars Clash</title>
</head>
<?php
}

    public function header()
    {
        ?>
<header class="header">
  <div class="header_logo">
    <img src="Views/public/logo_without_bg.png" alt="logo" class="header_logo_img">
    <p class="header_logo_text">CARS CLASH</p>
  </div>
  <div class="social_links">
    <a href="https://www.facebook.com/" target="_blank" class="social_links_link">
      <img src="Views/public/facebook.png" alt="Facebook" class="social_links_link_img">
    </a>
    <a href="https://www.twitter.com/" target="_blank" class="social_links_link">
      <img src="Views/public/twitter.png" alt="Twitter" class="social_links_link_img">
    </a>
    <a href="https://www.linkedin.com/" target="_blank" class="social_links_link">
      <img src="Views/public/linkedIn.png" alt="LinkedIn" class="social_links_link_img">
    </a>
    <form class="form_dcnx" action="./redirect.php" method="post">
      <button type="submit" class="deconnexion_btn" name="logout">
        Se déconnecter
      </button>
    </form>
  </div>
</header>
<?php
}

}