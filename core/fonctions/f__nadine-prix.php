<?php

/**
 * La fonction nadine_prix() permet d'harmoniser
 * l'affichage de prix sur Nadine
 */

function nadine_prix($prix)
{
  if (isset($prix)) {
    // Convertit le prix en float
    $prix = (float)$prix;

    // Formate le résultat
    $prix = number_format($prix, 2, ',', ' ') . ' €';

    // Retourne le résultat au template
    return $prix;
  }
}
