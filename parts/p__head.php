<?php

// Ce fichier controle les premiers chargé par le navigateur
// à chaque chargement de page. Séparer le <head> du header.php
// simplifier l'intégration du TurboTuto™️

?>

<!DOCTYPE html>

<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Nadine</title>
  <meta name="description" content="👨‍💻 Premier logiciel open source de compta pour la Maison des Artistes : essayer Nadine, c'est l'adopter. 👍">
  <meta name="keywords" content="Comptabilité, Maison des Artistes, MDA, précompte, artistes, gratuit, free, logiciel, facture, devis, open-source">
  <meta name="contact" content="bonjour@nadinecorp.net">

  <?php
  // Qq Meta pour empêcher les Robots d'indexer Nadine
  // dans le cas hypothétique où un utilisateur étourdit
  // décide malgrès nos recommandations plus qu'insistantes
  // de mettre sa base de données sur les internets.
  ?>
  <meta name="robots" content="noindex, nofollow, noarchive">
  <meta name="googlebot" content="noindex, nofollow, noarchive">
  <meta name="googlebot-news" content="nosnippet">
  <meta name="googlebot-image" content="index, follow, all">

  <?php // Favicon 
  ?>
  <meta content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  <link rel="apple-touch-icon" sizes="57x57" href="./assets/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="./assets/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="./assets/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="./assets/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="./assets/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="./assets/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="./assets/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="./assets/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="./assets/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="./assets/favicon/manifest.json">

  <?php // Themes colors 
  ?>
  <meta name="msapplication-TileColor" content="#ff3636">
  <meta name="msapplication-TileImage" content="./assets/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ff3636">

  <?php // Webfont 
  ?>
  <link rel="stylesheet" href="https://use.typekit.net/znq5njd.css">

  <?php // Style CSS et Script JS 
  ?>
  <link rel='stylesheet' type='text/css' media="all" href='./style.min.css'>
  <link rel="stylesheet" type="text/css" media="print" href="./assets/sass/print/impression.css">
  <script src="./assets/js/jquery.min.js"></script>
</head>