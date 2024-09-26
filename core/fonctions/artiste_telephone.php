<?php

/**
 * La fonction the_artiste_telephone() retourne
 * le numéro de téléphone des artistes du projet demandé
 */

function get_artiste_telephone($row)
{
  if (isset($row)) {
    if (!empty($row['artiste__telephone'])) {
      // Récupère les infos du artiste
      $artiste__telephone = $row['artiste__telephone'];

      // Reset le format du numero de téléphone
      $phone_formated = $artiste__telephone;
      $phone_formated = str_replace(' ', '', $phone_formated);
      $phone_formated = str_replace('.', '', $phone_formated);

      // Formate le titre du numero de téléphone
      $phone_title = chunk_split($phone_formated, 2, " ");

      // Retourne le résultat au template
      return $phone_title;
    }
  }
}


/**
 * La fonction the_artiste_telephone() affiche
 * le numéro de téléphone des artistes du projet demandé
 */

function the_artiste_telephone($row)
{
  if (isset($row)) {
    // Récupère les infos du artiste
    $artiste__telephone = get_artiste_telephone($row);

    // Formate l'URL du numero de téléphone
    $phone_url = str_replace(' ', '', $artiste__telephone);
    $phone_url = '+33' . $phone_url;

    // Formate le résultat
    $artiste__telephone = '<a href="tel:' . $phone_url . '" target="_blank">' . $artiste__telephone . '</a>';

    // Retourne le résultat au template
    echo $artiste__telephone;
  }
}
