<?php

// Ce fichier permet de controler le volet affichant
// le courriel à envoyer avec une facture ou un devis

nadine_log("Nadine ouvre le fichier de p__volet-facturemsg.php");

/**
 * Importe le fichier rassemblant toutes les fonctions
 * les plus importantes de Nadine
 */

include_once(__DIR__ . '/../core/fonctions.php');

?>

<div class="m-volet__facturemsg m-volet m-volet-r">
  <div class="m-volet__denko">
    <div class="is--denko__container m-row">
      <ul>
        <li class="is--denko">
          <span class="m-display">Message généré</span>
        </li>
      </ul>
    </div>
  </div>
  <div class="m-volet__wrapper">


    <?php // Ajout du message
    ?>

    <p class="m-volet__facturemsg-mail m-ss m-body-l">
      <?php
      the_facture_msg($row, $prefix);
      ?>
    </p>


    <?php // Ajout des boutons
    ?>

    <div class="m-volet__bbar m-row">
      <div class="m-btn__grp">
        <button class="btn btn__outline btn__cancel" type="button">Annuler</button>
        <a href="./profil.php?data-step=4" class="btn btn__outline btn__cancel" type="button">Modifier</a>
        <button class="btn btn__plain btn__copy" type="button">Copier</button>
        <span class="btn__info m-ss">Message copié !</span>
      </div>
    </div>


  </div>

</div>