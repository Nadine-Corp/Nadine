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
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="/assets/favicon/site.webmanifest">
  <link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">

  <?php // Themes colors 
  ?>

  <meta name="theme-color" content="#1c1c1c">
  <meta name="msapplication-TileColor" content="#1c1c1c">

  <?php // Style CSS et Script JS 
  ?>
  <link rel='stylesheet' type='text/css' media="all" href='./style.min.css'>
  <link rel="stylesheet" type="text/css" media="print" href="./assets/sass/print/impression.css">
</head>