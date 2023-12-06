<?php

class HeaderView
{
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
    <a href="" class="deconnexion_btn">Déconnexion</a>
  </div>
</header>

<?php
}
}