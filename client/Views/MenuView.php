<?php

class MenuView
{

    public function content($number)
    {
        ?>
<div class="menu flex justify-around mt-12 bg-white rounded-xl drop-shadow-2xl overflow-hidden">
    <div class="news <?php if ($number == 1) {
            echo 'bg-myprimary text-white';
        }?>">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />
        <button class="w-full" name="goto-page-news">
          News
        </button>
      </form>
    </div>
    <div class="comparateur <?php if ($number == 2) {
            echo 'bg-myprimary text-white';
        }?>"">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />
        <button class="w-full" name="goto-page-comparateur">
          Comparateur
        </button>
      </form>
    </div>
    <div class="marques <?php if ($number == 3) {
            echo 'bg-myprimary text-white';
        }?>"">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />
        <button class="w-full" name="goto-page-marques">
          Marques
        </button>
      </form>
    </div>
    <div class="avis <?php if ($number == 4) {
            echo 'bg-myprimary text-white';
        }?>"">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />
        <button class="w-full" name="goto-page-avis">
          Avis
        </button>
      </form>
    </div>
    <div class="guide_achats <?php if ($number == 5) {
            echo 'bg-myprimary text-white';
        }?>"">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />
        <button class="w-full" name="goto-page-guide-achat">
          Guide d'achats
        </button>
      </form>
    </div>
    <div class="contacts <?php if ($number == 6) {
            echo 'bg-myprimary text-white';
        }?>"">
      <form action="./redirect.php" method="post">
        <input type="hidden" name="idClient" value="<?php echo $_GET['idClient'] ?>" />
        <button class="w-full" name="goto-page-contacts">
          Contacts
        </button>
      </form>
    </div>
  </div>
        <?php
}
}