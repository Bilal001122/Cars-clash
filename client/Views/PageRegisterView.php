<?php
// done
require_once 'Controllers/GestionLoginController.php';
require_once 'Views/GlobalView.php';
class PageRegisterView extends GlobalView
{
    public function content()
    {
        $this->head();
        ?>
<div class="login_logo">
  <img src="/cars-clash/public/images/logo_without_bg.png" alt="logo" class="login_logo_image">
  <p class="login_logo_text">CARS CLASH</p>
</div>
<div class="login_container">
  <p class="login_container_title">Inscrivez-vous</p>
  <form class="login_container_form grid grid-cols-3 place-content-center register_container" action='./redirect.php'
    method='post'>
    <div class="flex flex-col">
      <label for="nom">Nom</label>
      <input id="nom" type='text' name='nom' placeholder='Nom' required>
    </div>
    <div class="flex flex-col">
      <label for="prenom">Prénom</label>
      <input id="prenom" type='text' name='prenom' placeholder='Prenom' required>
    </div>
    <div class="flex flex-col">
      <label for="sexe">Sexe</label>
      <select class="bg-white focus: p-2 py-3 rounded-md" id="sexe" name='sexe' required>
        <option value="Homme">Homme</option>
        <option value="Femme">Femme</option>
      </select>
    </div>

    <div class="flex flex-col">
      <label for="dateNaissance">Date de naissance</label>
      <input id="dateNaissance" type='date' name='dateNaissance' placeholder='Date de naissance' required>
    </div>
    <div class="flex flex-col">
      <label for="email">E-mail</label>
      <input id="email" type='email' name='email' placeholder='e-mail' required>
    </div>
    <div class="flex flex-col">
      <label for="password">Mot de passe</label>
      <input id="password" type='password' name='password' placeholder='mot de passe' required>
    </div>
    <div class="col-span-3 flex justify-center">
      <input class="justify-self-center self-center w-3/12" type='submit' value='Register' name="register">
    </div>
  </form>
  <div class="flex justify-center items-center mt-8">
    <p class="text-myaccent text-2xl font-bold pr-1">Vous avez un compte? </p>
    <form action="./redirect.php" method="post">
      <button type="submit" name="goto-page-login">
        <p class="text-myprimary underline text-2xl font-bold cursor-pointer"> Connectez-vous</p>
      </button>
    </form>
  </div>
</div>
<?php

    }

    public function showPageRegister()
    {
        $this->content();
        ?>
<?php
}
}