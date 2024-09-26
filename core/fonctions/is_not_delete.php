<?php

/**
 * La fonction is_not_delete() vérifie
 * si un élément a été supprimé par l'utilisateur
 */

function is_not_delete($row, $prefix)
{
  if (isset($row)) {
    if (isset($prefix)) {
      if ($row[$prefix . '__corbeille'] == 0) {
        // Retourne le résultat au template
        return true;
      } else {
        // Retourne le résultat au template
        return false;
      }
    }
  }
}
