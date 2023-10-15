<?php

// Ce fichier permet de controler l'affichage d'une facture ou d'un devis
// dans une listes. Notament sur les pages de chaque projet
// ou la page de suivi

$table = get_facture_table($row);
$prefix = get_facture_prefix($table);
if (is_not_delete($row, $prefix)) :
?>

  <article class="p-facture <?php the_facture_class($row) ?>  ">
    <a href="<?php the_facture_link($row) ?>">
      <div class="p-facture__paper">

        <?php // Ajoute les autres infos 
        ?>

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

<?php
endif;
?>