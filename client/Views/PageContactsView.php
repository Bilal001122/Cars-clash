<?php
require_once 'GlobalView.php';
require_once 'Views/MenuView.php';
require_once 'Controllers/GestionContactsController.php';
class PageContactsView extends GlobalView
{
    public function content()
    {
        $contactsController = new GestionContactsController();
        $contacts = $contactsController->getAllContacts();
        $menuView = new MenuView();
        ?>
<div class="body w-11/12 mx-auto my-0 mb-96">
  <?php
$menuView->content(6);
        ?>
  <section class="flex-col items-center justify-center mt-40">
    <p class="text-center text-myprimary text-5xl font-bold pb-10 opacity-70 mb-10">Contacts</p>
    <div class=" bg-white flex justify-around p-10 rounded-2xl drop-shadow-2xl">
      <?php foreach ($contacts as $contact) {
            ?>
      <a href="<?php echo $contact['lien'] ?>" target="_blank"
        class="hover:scale-110 transition-all duration-300 social_links_link flex flex-col items-center justify-center">
        <img title="linkedIn" src="/cars-clash/public/images/<?php echo $contact['image'] ?>" alt=""
          class="mb-10 social_links_link_img">
        <p class="text-3xl text-myprimary font-bold"><?php echo $contact['nom_contact'] ?></p>
      </a>
      <?php }?>
      <!-- <table class="table-auto w-full border-collapse border border-slate-400">
        <thead>
          <tr>
            <th class="font-bold text-myaccent border border-slate-300 p-2 bg-myprimary bg-opacity-30">Nom</th>
            <th class="font-bold text-myaccent border border-slate-300 p-2 bg-myprimary bg-opacity-30">Prenom</th>
            <th class="font-bold text-myaccent border border-slate-300 p-2 bg-myprimary bg-opacity-30">E-mail</th>
            <th class="font-bold text-myaccent border border-slate-300 p-2 bg-myprimary bg-opacity-30">Téléphone</th>
            <th class="font-bold text-myaccent border border-slate-300 p-2 bg-myprimary bg-opacity-30">Addresse</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($contacts as $contact) {?>
          <tr class="odd:bg-white even:bg-slate-100">
            <td class="border border-slate-300 p-2"><?php echo $contact['Nom_contact'] ?></td>
            <td class="border border-slate-300 p-2"><?php echo $contact['Prenom_contact'] ?></td>
            <td class="border border-slate-300 p-2"><?php echo $contact['Email_contact'] ?></td>
            <td class="border border-slate-300 p-2"><?php echo $contact['Telephone_contact'] ?></td>
            <td class="border border-slate-300 p-2"><?php echo $contact['Adresse_contact'] ?></td>
          </tr>
          <?php }?>
        </tbody>
      </table> -->
    </div>
  </section>
</div>
<?php

    }

    public function showPageContacts()
    {
        $this->head();
        $this->header();
        $this->content();
        $this->footer();
    }

}