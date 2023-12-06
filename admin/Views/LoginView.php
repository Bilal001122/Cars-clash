<?php

require_once 'Controllers/LoginController.php';
class LoginView
{
    private $controller;
    public function login()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $this->controller = new LoginController();
            $this->controller->login($_POST['email'], $_POST['password']);
        } else {
            ?>
<div class="login_logo">
  <img src="Views/public/logo_without_bg.png" alt="logo" class="login_logo_image">
  <p class="login_logo_text">CARS CLASH</p>
</div>
<div class="login_container">
  <p class="login_container_title">Login</p>
  <form class="login_container_form" action='' method='post'>
    <label for="email">E-mail</label>
    <input id="email" type='text' name='email' placeholder='e-mail' required>
    <label for="password">Mot de passe</label>
    <input id="password" type='password' name='password' placeholder='mot de passe' required>
    <input type='submit' value='Login'>
  </form>
  <!-- <div class="login_container_go_to_register">
    <p class="login_container_go_to_register_text">Vous n'avez pas encore un compte ?</p>
    <a class="login_container_go_to_register_link" href="">Inscrivez-vous</a>
  </div> -->
</div>

<?php
}
    }
}