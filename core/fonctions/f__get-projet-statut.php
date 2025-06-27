<?php

/**
 * La fonction the_projet_statut() affiche le statut d'un projet demandé
 */

function the_projet_statut($row)
{
  if (isset($row)) {
    // Retourne le résultat au template
    echo $row["projet__statut"];
  }
}
