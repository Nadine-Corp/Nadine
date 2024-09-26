<?php

/**
 * La fonction the_projet_thumbnail() affiche une icone en fonction
 * du statut du projet demandé
 */

function the_projet_thumbnail($row)
{
  if (isset($row)) {
    if ($row["projet__statut"] == 'Projet en cours') {
      $ico = get_template_part('./assets/img/ico_slightly-smiling-face.svg.php');
    } elseif ($row["projet__statut"] == 'Projet terminé') {
      $ico = get_template_part('./assets/img/ico_succes.svg.php');
    } else {
      $ico = get_template_part('./assets/img/ico_slightly-frowning-face.svg.php');
    }

    // Retourne le résultat au template
    echo $ico;
  }
}
