<?php

/**
 * La fonction msg_nothing() permet d'harmoniser
 * l'affichage des messages d'erreur sur Nadine
 */

function msg_nothing($titre = '', $msg = '')
{
  if (isset($titre) || isset($msg)) {

    echo '<div class="m-msg__error">';
    echo '<div class="m-msg__wrapper">';

    if (!empty($titre)) {
      echo '<h2 class="m-lead">';
      echo $titre;
      echo '</h2>';
    };

    if (!empty($msg)) {
      echo '<span class="m-body m-mt1">';
      echo $msg;
      echo '</span>';
    };

    echo '</div>';
    echo '</div>';
  }
}
