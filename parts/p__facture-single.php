<?php

// Ce fichier permet de controler l'affichage d'une facture ou d'un devis
// dans une listes. Notament sur les pages de chaque article
// ou la page de suivi

?>

<article class="p-facture">
  <a href="<?php the_facture_link($row) ?>">
    <div class="p-facture__paper">
      <div class="p-facture__wrapper is--fullsize">
        <span class="display1"><?php the_facture_numero($row) ?></span>
        <span class="caption"><?php the_facture_table($row) ?><?php the_facture_date($row) ?></span>
        <span class="display1"><?php the_facture_total_ht($row) ?></span>
        <span class="caption"><?php the_facture_total_auteur($row) ?></span>
      </div>
    </div>
  </a>
</article>
