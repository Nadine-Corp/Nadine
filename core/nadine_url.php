<?php

// Le fichier config.php contient tous les paramètres important de Nadine
// Remplacer les valeurs des variables ci-dessous par vos propres info.



/**
 * La fonction nadine_url() retourne l'URL
 * du fichier nadine.corp, et donc de la home
 * de Nadine
 */


function nadine_url()
{
  // Définie le fichier à chercher
  $nadine_file = 'nadine.corp';

  // Cherche l'URL du fichier actuel
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
  $host = $_SERVER['HTTP_HOST'];
  $current_url = $_SERVER['HTTP_HOST'];

  // Formate l'URL du fichier actuel
  $current_url = $protocol . '://' . $host . '/' . $current_url;

  // Cherche l'URL et le chemin du dossier parrent
  $parent_url = dirname($current_url);

  // Vérifie si le nadine_file est dans le même dossier
  // que le fichier actuel
  $home = check_is_home($parent_url, $nadine_file);

  // Si le $nadine_file n'est pas trouvé,
  // Nadine le cherchera dans le dossier parent
  // du fichier actuel
  if ($home === false) {
    while ($home  === false && $parent_url !== '/') {
      $parent_url = dirname($parent_url);
      $home = check_is_home($parent_url, $nadine_file);
    }
  }

  // Formate le résultat
  $nadine_url = $parent_url;

  // Retourne le résultat au template
  return $nadine_url;
}


/**
 * La fonction check_is_home() permet de chercher
 * un fichier dans un dossier
 */

function check_is_home($url, $nadine_file)
{
  // Formate l'URL du $nadine_file
  $url .= '/' . $nadine_file;

  // Test si l'URL $nadine_file exite
  $headers = get_headers($url);
  $response_code = substr($headers[0], 9, 3);


  // Retourne le résultat au template
  if ($response_code == "200") {
    return true;
  } else {
    return false;
  }
}
