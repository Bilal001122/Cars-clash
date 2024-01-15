<?php
// done
require_once 'Controllers/GestionLoginController.php';
require_once 'Views/GlobalView.php';
class PageLoginView extends GlobalView
{
    public function content($failed)
    {
        $this->head();
        ?>
<div class="login_logo">
  <img src="/cars-clash/public/images/logo_without_bg.png" alt="logo" class="login_logo_image">
  <p class="login_logo_text">CARS CLASH</p>
</div>
<div class="login_container">
  <?php
if ($failed == '1') {
            ?>
  <p class="login_container_title">E-mail ou mot de passe incorrect</p>
  <?php
} else if ($failed == '2') {
            ?>
  <p class="login_container_title">Votre compte est bloqué</p>
  <?php
} else if ($failed == '3') {
            ?>
  <p class="login_container_title">Votre compte est en attente de validation</p>
  <?php
} else {
            ?>
  <p class="login_container_title">Connectez-vous</p>
  <?php
}
        ?>
  <form class="login_container_form" action='./redirect.php' method='post'>
    <label for="email">E-mail</label>
    <input id="email" type='email' name='email' placeholder='e-mail' required>
    <label for="password">Mot de passe</label>
    <input id="password" type='password' name='password' placeholder='mot de passe' required>
    <input type='submit' value='Se connecter' name="login">
  </form>
  <div class="flex justify-center items-center mt-8">
    <p class="text-myaccent text-2xl font-bold pr-1">Vous n'avez pas un compte? </p>
    <form action="./redirect.php" method="post">
      <button type="submit" name="goto-register-page">
        <p class="text-myprimary underline text-2xl font-bold cursor-pointer"> Inscrivez-vous</p>
      </button>
    </form>
  </div>
  <img class="car_to_animate" src="/cars-clash/public/images/anim_car.png" alt="">
</div>
<?php

    }

    public function showPageLogin($failed)
    {
        $this->content($failed);
        ?>
<?php
}
}