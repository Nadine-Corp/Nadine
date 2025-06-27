<?php


/**
 * La fonction the_diffuseur_full_adresse() affiche
 * l'adresse des diffuseurs du projet demandé
 */

function the_diffuseur_full_adresse($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $adresse = $row['diffuseur__adresse'];
    $code_postal = $row['diffuseur__code_postal'];
    $ville = $row['diffuseur__ville'];

    // Formate l'adresse
    $link_title = $adresse . '<br>' . $code_postal . ' ' . $ville;

    // Formate l'URL
    $link_url = str_replace('<br>', ' ', $link_title);
    $link_url = str_replace(' ', '+', $link_url);
    $link_url = 'https://www.google.fr/maps/place/' . $link_url;

    // Formate le résultat
    $link = '<a href="' . $link_url . '" target="_blank">' . $link_title . '</a>';

    // Retourne le résultat au template
    echo $link;
  }
}
