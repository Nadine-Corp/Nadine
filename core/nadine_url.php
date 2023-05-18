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

  // Cherche l'URL et le chemin du fichier actuel
  $file_url = $_SERVER['HTTP_REFERER'];
  $file_path = $_SERVER['SCRIPT_FILENAME'];

  echo '$file_url : ' . $file_url . '<br>';
  echo '$file_path : ' . $file_path . '<br><br>';

  // Cherche l'URL et le chemin du dossier parrent
  $parent_url = dirname($file_url);
  $parent_path = dirname($file_path);

  echo '$parent_url : ' . $parent_url . '<br>';
  echo '$parent_path : ' . $parent_path . '<br><br>';


  // Cherche le fichier $nadine_file dans le dossier actuel
  $nadine_file_url = find_file_in_directory($parent_path, $nadine_file);

  if ($nadine_file_url == false) {
    $nadine_file_url = 'nop<br>';

    // Si le $nadine_file n'est pas trouvé,
    // Nadine le cherchera dans le dossier parent
    $nadine_file_url = false;
    while ($nadine_file_url === false && $parent_directory !== '/') {
      $nadine_file_url = find_file_in_directory($parent_path, $nadine_file);
      $parent_url = dirname($parent_url);
      $parent_path = dirname($parent_path);
    }
  }

  // Formate le résultat
  $nadine_file_url = $parent_url . '/';


  // Retourne le résultat au template
  return $nadine_file_url;
}


/**
 * La fonction find_file_in_directory() permet de chercher
 * un fichier dans un dossier
 */


function find_file_in_directory($directory, $filename)
{
  $iterator = new DirectoryIterator($directory);

  foreach ($iterator as $file) {
    if ($file->isFile() && $file->getFilename() === $filename) {
      echo  'Wow ! Nadine est ici !!!<br>' . $file->getPathname() . '<br>';
      return true;
    } else {
      echo 'Pas de Nadine ici. On continue les recherches<br>' . $file->getPathname() . '<br><br>';
    }
  }

  return false;
}
