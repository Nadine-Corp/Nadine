<?php

/**
 * La fonction the_artiste_numero_secu() affiche
 * le numéro de sécurité sociale de l'artiste demandé
 */

function the_artiste_numero_secu($row)
{
  if (isset($row)) {
    if (!empty($row['artiste__numero_secu'])) {
      // Récupère les infos de l'artiste
      $artiste__numero_secu = $row['artiste__numero_secu'];

      // Retourne le résultat au template
      echo $artiste__numero_secu;
    }
  }
}
