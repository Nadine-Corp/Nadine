<?php

/**
 * La fonction the_diffuseur_telephone() retourne
 * le numéro de téléphone des diffuseurs du projet demandé
 */

function get_diffuseur_telephone($row)
{
  if (isset($row)) {
    if (!empty($row['diffuseur__telephone'])) {
      // Récupère les infos du diffuseur
      $diffuseur__telephone = $row['diffuseur__telephone'];

      // Reset le format du numero de téléphone
      $phone_formated = $diffuseur__telephone;
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
 * La fonction the_diffuseur_telephone() affiche
 * le numéro de téléphone des diffuseurs du projet demandé
 */

function the_diffuseur_telephone($row)
{
  if (isset($row)) {
    if (!empty($row['diffuseur__telephone'])) {
      // Récupère les infos du diffuseur
      $diffuseur__telephone = get_diffuseur_telephone($row);

      // Formate l'URL du numero de téléphone
      $phone_url = str_replace(' ', '', $diffuseur__telephone);
      $phone_url = '+33' . $phone_url;

      // Formate le résultat
      $diffuseur__telephone = '<a href="tel:' . $phone_url . '" target="_blank">' . $diffuseur__telephone . '</a>';

      // Retourne le résultat au template
      echo $diffuseur__telephone;
    }
  }
}
