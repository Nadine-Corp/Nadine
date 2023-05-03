<?php

// Ce fichier permet de controler la modale affichant
// le courriel à envoyer avec une facture ou un devis

/**
 * Importe le fichier rassemblant toutes les fonctions
 * les plus importantes de Nadine
 */

include_once(__DIR__ . '/../core/fonctions.php');

?>

<div class="m-modal__facturemsg m-modal">
  <div class="m-modal__denko">
    <div class="is--denko__container m-row">
      <ul>
        <li class="is--denko">
          <span class="m-display">Message généré</span>
        </li>
      </ul>
    </div>
  </div>
  <div class="m-modal__wrapper">



    <?php // Ajout du message
    ?>
    <p class="m-modal__facturemsg-mail m-ss m-body-l">
      <?php
      the_facture_msg($row);
      ?>
    </p>

  </div>
</div>