<?php
require_once 'Views/GlobalView.php';
class PageEditContactsView extends GlobalView
{
    public function content()
    {
        ?>
        <?php
}

    public function showPageEditContacts($idContact)
    {
        $this->head();
        $this->header();
        $this->content();
    }
}
