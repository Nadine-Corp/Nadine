<?php

// Ce fichier permet de controler l'affichage d'un contact
// dans les listes de contacts comme sur la page Contacts.

?>

<article class="l-contacts__contact <?php the_contact_class($row) ?>">
  <a href="./p__modal-contact.php?contact__id=<?php the_contact_id($row) ?>&contact__table=<?php the_contact_table($row) ?>" class="btn__modal" data-modal="contact" data-table="<?php the_contact_table($row) ?>" data-id="<?php the_contact_id($row) ?>">
    <div class="m-col">
      <h2 class="l-contacts__societe m-body-l"><?php the_contact_societe($row) ?></h2>
    </div>
    <div class="m-col">
      <span class="l-contacts__name m-body m-row"><?php the_contact_name($row) ?></span>
    </div>
    <div class="m-col">
      <span class="l-contacts__name m-body m-row"><?php echo get_contact_table($row) ?></span>
    </div>
  </a>
</article>