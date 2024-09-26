<?php

/**
 * La fonction the_projet_name() affiche le nom d'un projet demandé
 */

function the_projet_name($row)
{
  if (isset($row)) {
    if (isset($row["projet__nom"])) {
      // Retourne le résultat au template
      echo $row["projet__nom"];
    }
  }
}
