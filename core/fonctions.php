<?php

// Ce fichier permet de centraliser tous les trucs
// que l'on demande tout le temps à Nadine.
// C'est peut-être le fichier le plus important de tous.


/**
 *  Importation des paramètres de connection
 */

include(__DIR__ . '/../config.php');


/**
 * La fonction Auto Include est une forme de magie noire :
 * elle permet d'inclure toutes les fonctions contenues dans un dossier.
 * Cela peut sembler anodin, mais cela permet de fractionner des fichiers
 * comportant des milliers de lignes.
 * 
 * C'est un peu comme lorsque le service des fournitures vous offre une nouvelle agrafeuse
 * ou de splendides pochettes de couleurs : cela permet de travailler immédiatement
 * de façon plus confortable et plus efficace. Un bon classement, c'est important.
 */


function auto_include()
{
  // Ajoute qq variable
  $dir = __DIR__ . '/fonctions/';

  // Vérifie si le dossier existe
  if (is_dir($dir)) {
    // Scanne le dossier pour trouver les fichiers PHP
    $files = scandir($dir);

    foreach ($files as $file) {
      // Vérifie si le fichier a l'extension .php
      if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
        require_once $dir . $file;
      }
    }
  }
}
auto_include();

nadine_log("Nadine a fini de charger toutes les fonctions de fonction.php");
