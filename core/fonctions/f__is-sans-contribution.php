<?php

/**
 * La fonction is_sans_contribution() permet de savoir si une facture
 * doit utiliser le template Sans Contribution
 */
function is_sans_contribution($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur__pays = get_diffuseur_pays($row);
    $diffuseur__type = get_diffuseur_type($row);

    // Vérifie si le diffuseur est étrangé
    if ($diffuseur__pays !== null && $diffuseur__pays !== 'France') {
      return true;
    }

    // Vérifie si le diffuseur est un particulier
    if ($diffuseur__type !== null && $diffuseur__type === 'Particulier') {
      return true;
    }

    // Retourne le résultat au template
    return false;
  }
}
