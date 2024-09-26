<?php

/**
 * La fonction get_artiste_civilite() affiche la civilité d'un artiste
 */

function get_artiste_civilite($row)
{
  if (isset($row)) {
    if (!empty($row['artiste__civilite'])) {
      // Récupère les infos de l'artiste
      $artiste_civilite = $row["artiste__civilite"];

      // Formate le résultat
      if (strpos($artiste_civilite, 'Mme') === 0) {
        $artiste_civilite = "Mme";
      }

      // Retourne le résultat au template
      return $artiste_civilite;
    }
  }
}
