<?php

// Le fichier config.php contient tous les paramètres important de Nadine
// Remplacer les valeurs des variables ci-dessous par vos propres info.


// Obtention du chemin du fichier courant
$nadine_file = 'nadine.corp';

// Obtention du chemin du fichier courant
$current_file = __FILE__;

// Obtention du chemin du dossier parent
$parent_directory = dirname($current_file);

// Déduction de l'URL en fonction du dossier parent et du fichier trouvé
$found_file = find_file_in_directory($parent_directory, $nadine_file);
if ($found_file !== false) {
  $relative_path = str_replace($parent_directory, '', $found_file);
  $nadine_url = nadine_url() . $relative_path;
  return $found_file;
} else {
  // Le fichier $nadine_file n'a pas été trouvé, relancer la recherche dans le dossier parent
  $found_file = false;
  $parent_directory = dirname($parent_directory);
  while ($found_file === false && $parent_directory !== '/') {
    $found_file = find_file_in_directory($parent_directory, $nadine_file);
    $parent_directory = dirname($parent_directory);
  }

  if ($found_file !== false) {
    $relative_path = str_replace($parent_directory, '', $found_file);
    $nadine_url = nadine_url() . $relative_path;
    return $found_file;
  } else {
    echo "Impossible de déduire l'URL de Nadine.";
  }
}

// Fonction récursive pour rechercher un fichier dans un répertoire et ses sous-répertoires
function find_file_in_directory($directory, $filename)
{
  $iterator = new RecursiveDirectoryIterator($directory);
  $iterator = new RecursiveIteratorIterator($iterator);

  foreach ($iterator as $file) {
    if ($file->getFilename() === $filename) {
      return $file->getPathname();
    }
  }

  return false;
}

// Fonction pour obtenir l'URL de base du site
function nadine_url()
{
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
  $host = $_SERVER['HTTP_HOST'];
  return $protocol . '://' . $host;
}
