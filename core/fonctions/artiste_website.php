<?php


/**
 * La fonction get_artiste_website() retourne
 * le site internet des artistes du projet demandé
 */

function get_artiste_website($row)
{
  if (isset($row)) {
    if (!empty($row['artiste__website'])) {
      // Récupère les infos du artiste
      $artiste__website = $row['artiste__website'];

      // Formate le titre du lien
      $link_title = $artiste__website;
      $link_title = str_replace('www.', '', $artiste__website);
      $link_title = str_replace('https://', '', $link_title);
      $link_title = str_replace('http://', '', $link_title);
      if (substr($link_title, -1) == '/') {
        $link_title = rtrim($link_title, "/");
      };
      $link_title = 'www.' . $link_title;

      // Retourne le résultat au template
      return $link_title;
    }
  }
}


/**
 * La fonction the_artiste_website() affiche
 * le site internet des artistes du projet demandé
 */

function the_artiste_website($row)
{
  if (isset($row)) {
    // Récupère les infos du artiste
    $artiste__website = get_artiste_website($row);

    // Formate l'URL du lien
    $link_url = $artiste__website;
    $link_url = 'https://' . $link_url;

    // Formate le résultat
    $link = '<a href="' . $link_url . '" target="_blank">' . $artiste__website . '</a>';

    // Retourne le résultat au template
    echo $link;
  }
}
