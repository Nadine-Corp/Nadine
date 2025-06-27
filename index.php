<?php

// La page index.php est la première page a être chargée
// au lancement de Nadine. 


// Ajoute le fichier de fonctions
include(__DIR__ . '/core/fonctions.php');

/**
 * Charge la page error 404
 * si l'URL n'existe pas
 */

// header("HTTP/1.0 404 Not Found");
// include('error.php');
// exit();


/**
 * Ajoute du Head
 */

include(__DIR__ . '/views/parts/p__head.php');
include(__DIR__ . '/views/parts/p__header.php');
nadine_log("Nadine vient d'importer le fichier header.php");

// Sélectionne la view
the_view_from_url();


/**
 * Ajoute du Footer
 */

include(__DIR__ . '/views/parts/p__footer.php');
