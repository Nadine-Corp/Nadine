<?php

// Ce fichier permet de controler l'affichage d'une facture ou d'un devis
// dans une listes. Notament sur les pages de chaque article
// ou la page de suivi

?>

<article class="p-facture <?php the_facture_class($row) ?> xxs6 m4 l3 xl2">
  <a href="<?php the_facture_link($row) ?>">
    <div class="p-facture__paper">

      <?php // Ajoute le statut ?>

      <div class="p-facture__statut m-body m-ss">
        <?php the_facture_statut($row) ?>
      </div>

      <?php // Ajoute les autres infos ?>

      <div class="p-facture__wrapper is--fullsize">
        <div class="p-facture__title m-row">
          <span class="m-lead m-ss"><?php the_facture_numero($row) ?></span>
          <span class="m-body-s m-ss"><?php the_facture_table($row) ?><em><?php the_facture_date($row) ?></em></span>
        </div>
        <div class="p-facture__prix m-row">
          <span class="m-lead m-ss"><?php the_facture_total_ht($row) ?></span>
          <span class="m-body-s"><?php the_facture_total_auteur($row) ?></span>
        </div>
      </div>
    </div>
  </a>
</article>
