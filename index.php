<?php

// La page index.php est la première page a être chargée
// au lancement de Nadine. Elle vérifie notament que Nadine
// a bien accès à la base de donnée. Si ce n'est pas le cas,
// elle lance le TurboTuto™.


/**
 *  Importe les paramètres et test de la base de donnée
 *  Si une erreur est détectée : lancement du TurboTuto™
 */

require(__DIR__ . '/core/query.php');


/**
 *  Affiche la page Projets
 */

include(__DIR__ .  '/projets.php');
