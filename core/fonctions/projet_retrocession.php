<?php

/**
 * La fonction get_projet_retrocession() affiche l'ID d'un projet demandé
 */

function get_projet_retrocession($row)
{
  if (isset($row)) {
    if (isset($row['artiste__id'])) {
      // Récupère la liste des artistes du projet
      $artistes = $row['artiste__id'];

      // Transforme la liste des artistes du projet en Array
      $artistes = unserialize($artistes);

      if (is_array($artistes) && count($artistes) > 0) {
        // Retourne le résultat au template
        return 1;
      } else {
        // Retourne le résultat au template
        return 0;
      }
    }
  }
}
