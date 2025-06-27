<?php

/**
 * La fonction the_artiste_numero_mda() affiche
 * le numéro de Maison des Artistes de l'artiste demandé
 */

function the_artiste_numero_mda($row)
{
  if (isset($row)) {
    if (!empty($row['artiste__numero_mda'])) {
      // Récupère les infos de l'artiste
      $artiste__numero_mda = $row['artiste__numero_mda'];

      // Retourne le résultat au template
      echo $artiste__numero_mda;
    }
  }
}
