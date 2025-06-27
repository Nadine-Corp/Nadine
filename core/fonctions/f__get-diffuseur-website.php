<?php


/**
 * La fonction get_diffuseur_website() retourne
 * le site internet des diffuseurs du projet demandé
 */

function get_diffuseur_website($row)
{
  if (isset($row)) {
    if (!empty($row['diffuseur__website'])) {
      // Récupère les infos du diffuseur
      $diffuseur__website = $row['diffuseur__website'];

      // Formate le titre du lien
      $link_url = $diffuseur__website;
      $link_url = str_replace('www.', '', $diffuseur__website);
      $link_url = str_replace('https://', '', $link_url);
      $link_url = str_replace('http://', '', $link_url);
      if (substr($link_url, -1) == '/') {
        $link_url = rtrim($link_url, "/");
      };
      $link_url = 'www.' . $link_url;

      // Retourne le résultat au template
      return $link_url;
    }
  }
}


/**
 * La fonction the_diffuseur_website() affiche
 * le site internet des diffuseurs du projet demandé
 */

function the_diffuseur_website($row)
{
  if (isset($row)) {
    // Récupère les infos du diffuseur
    $diffuseur__website = get_diffuseur_website($row);

    // Formate l'URL du lien
    $link_url = $diffuseur__website;
    $link_url = 'https://' . $link_url;

    // Formate le résultat
    $link = '<a href="' . $link_url . '" target="_blank">' . $diffuseur__website . '</a>';

    // Retourne le résultat au template
    echo $link;
  }
}
