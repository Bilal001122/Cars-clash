<?php

class PageAddContactsView extends GlobalView
{
    public function content()
    {
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

  <div class="dashboard_body flex flex-col justify-center items-center">
    <form class="grid grid-cols-4 items-center bg-white rounded-xl h-4/5 w-4/5 shadow-md py-3"
      action="/cars-clash/admin/redirect.php" method="POST" enctype="multipart/form-data">
      <div class="flex flex-col w-1/2 col-span-4 gap-10 mr-10 ml-10 justify-self-center">
        <label class="font-semibold self-center" for="contact_nom">Nom Contact:</label>
        <input class="bg-mysecondary p-2 py-3 rounded-md" type="text" name="contact_nom" id="contact_nom" />
      </div>
      <div class="flex flex-col w-4/5 col-span-4 row-span-1 gap-10 mr-10 ml-10 justify-self-center">
        <label class="font-semibold self-center" for="contact_lien">Lien:</label>
        <input class="pl-3 whitespace-normal text-ellipsis bg-mysecondary py-3 rounded-md" name="contact_lien"
          id="contact_lien" />
      </div>
      <div class="flex flex-col w-4/5 col-span-4 row-span-2 gap-10 mr-10 ml-10 justify-self-center justify-center">
        <label class="font-semibold self-center" for="contact_image">Image:</label>
        <input class=" p-2 py-3 rounded-md self-center" type="file" name="contact_image" id="contact_image" />
      </div>
      <div class="col-span-4 justify-self-center">
        <input type="hidden" name="id-contact" />
        <button
          class="bg-myprimary text-white p-3 rounded-md transform hover:scale-110 transition-all ease-in-out duration-300"
          type="submit" name="ajouter-contact">
          Ajouter Contact
        </button>
      </div>
    </form>
  </div>

</div>
</body>
<?php
}

    public function showPageAddContacts()
    {
        $this->head();
        $this->header();
        $this->content();
        ?>
<?php
}
}
