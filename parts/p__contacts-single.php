<?php

// Ce fichier permet de controler l'affichage d'un contact
// dans les listes de contacts comme sur la page Contacts.

?>

<article class="l-contacts__contact m-rom <?php the_contact_class($row) ?>">
  <a href="contact__single.php?contact__id=<?php the_contact_id($row) ?>">
    <div class="m-col">
      <h2 class="l-contacts__societe m-body-l"><?php the_contact_societe($row) ?></h2>
      <span class="l-contacts__name m-body m-row"><?php the_contact_name($row) ?></span>
      <span class="l-contacts__name m-body m-row"><?php echo get_contact_table($row) ?></span>
    </div>
  </a>
</article>
