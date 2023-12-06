<?php
require_once 'Views/LoginView.php';
require_once 'Views/HeaderView.php';
require_once 'Views/MenuView.php';
class WebsiteAdminView
{
    public function header()
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
  <link rel="stylesheet" href="Views/css/admin.css" />
  <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script defer src="admin.js"></script>
  <title>Cars Clash</title>
</head>
<?php
}

    public function buildLogin()
    {
        $this->header();
        ?>

<body>
  <?php
$loginView = new LoginView();
        $loginView->login();
        ?>
</body>

</html>
<?php
}

    public function buildDashboard()
    {
        $this->header();
        ?>

<body>
  <?php
$headerView = new HeaderView();
        $headerView->header();
        $menuView = new MenuView();
        $menuView->menu();
        ?>
</body>

</html>
<?php
}

}