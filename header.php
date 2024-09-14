<?php

// Ce fichier est le premier a être exécuté lors de la construction
// des pages. C'est ici que tout commence...


/**
 *  Test la connexion à la base de données
 *  Si une erreur est detectée, Nadine lancera le TurboTuto™️
 */

require(__DIR__ . '/core/database/db__test.php');


/**
 * Importe le <head>. Séparer le <head> du header.php
 * simplifier l'intégration du TurboTuto™️
 */

include_once(__DIR__ . '/parts/p__head.php');

?>


<body>
  <?php
  /**
   * Importe le <head>. Séparer le <head> du header.php
   * simplifier l'intégration du TurboTuto™️
   */

  include_once(__DIR__ . '/parts/p__nav.php');
  ?>