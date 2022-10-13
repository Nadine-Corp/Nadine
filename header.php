<?php

// Ce fichier est le premier a être exécuter lors de la construction
// des pages. C'est ici que tout commence...


/**
* Injection du fichier rassemblant toutes les fonctions
* les plus importantes de Nadine
*/

include './core/fonctions.php';

?>


<!DOCTYPE html>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Nadine</title>
  <meta name="description" content="👨‍💻 Premier logiciel open source de compta pour la Maison des Artistes : essayer Nadine, c'est l'adopter. 👍" >
  <meta name="keywords" content="Comptabilité, Maison des Artistes, MDA, précompte, artistes, gratuit, free, logiciel, facture, devis, open-source" >
  <meta name="contact" content="bonjour@nadinecorp.net">
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
  <link rel="icon" type="image/png" sizes="192x192"  href="./assets/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="./assets/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="./assets/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ff3636">
  <meta name="msapplication-TileImage" content="./assets/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ff3636">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://use.typekit.net/znq5njd.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel='stylesheet' type='text/css' media="all" href='./style.min.css'>
  <link rel="stylesheet" type="text/css" media="print"  href="./assets/sass/print/impression.css">
  <script src="./assets/js/jquery.min.js"></script>
</head>


<body>
  <header class="l-header">

    <?php
    // La MainBar contient la barre de recherche et les futurs Widgets ?>
    <div class="l-header__bar l-header__mainbar">
      <div class="l-header__searchbar subheading">
        <input type="text" placeholder="Soon™ : pleins de trucs ici.">
      </div>
    </div>

    <?php // La NavBar permet de naviguer d'une page à l'autre ?>
    <div class="l-header__bar l-header__navbar">

      <div class="nav__btn">
        <div class="nav__btn-gp">
          <div id="nav__btn-stick1" class="">&nbsp;</div>
          <div id="nav__btn-stick2" class="">&nbsp;</div>
          <div id="nav__btn-stick3" class="">&nbsp;</div>
        </div>
      </div>


      <nav class="l-header__nav">
        <ul class="nav__main">
          <li class="l-header__nav-item">
            <a href="./projets.php" data-url="projets">
              <div class="l-header__nav-ico">
                <?php include './assets/img/ico_projet.svg.php'; ?>
              </div>
              <div class="l-header__nav-txt display1">
                PROJETS
              </div>
            </a>
          </li>
          <li class="l-header__nav-item">
            <a href="./diffuseurs.php" data-url="diffuseurs">
              <div class="l-header__nav-ico">
                <?php include './assets/img/ico_contact.svg.php'; ?>
              </div>
              <div class="l-header__nav-txt display1">
                DIFFUSEURS
              </div>
            </a>
          </li>
          <li class="l-header__nav-item">
            <a href="./artistes.php" data-url="artistes">
              <div class="l-header__nav-ico">
                <?php include './assets/img/ico_contact.svg.php'; ?>
              </div>
              <div class="l-header__nav-txt display1">
                ARTISTES
              </div>
            </a>
          </li>
          <li class="l-header__nav-item">
            <a href="./suivi.php" data-url="suivi">
              <div class="l-header__nav-ico">
                <?php include './assets/img/ico_suivi.svg.php'; ?>
              </div>
              <div class="l-header__nav-txt display1">
                SUIVI
              </div>
            </a>
          </li>
          <li class="l-header__nav-item m-accordion">
            <a class="m-accordion__titre">
              <div class="l-header__nav-ico">
                <?php include './assets/img/ico_menu.svg.php'; ?>
              </div>
              <div class="l-header__nav-txt display1">
                PLUS
              </div>
              <div class="m-accordion__ico">
                <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
              </div>
            </a>
            <div class="m-accordion__wrapper">
              <ul class="l-header__subnav">
                <li class="l-header__subnav-item l-header__subnav-separator">
                  <a href="./profil.php" data-url="profil" class="body">Modifier votre profil</a>
                </li>
                <li class="l-header__subnav-item">
                  <a href="./bilan.php" data-url="bilan" class="body">Générer le bilan annuel</a>
                </li>
                <li class="l-header__subnav-item l-header__subnav-separator">
                  <a href="https://discord.gg/Fg2m8gvdWR" target="_blank" class="body">Rejoindre le NadineClub©</a>
                </li>
                <li class="l-header__subnav-item">
                  <a href="mailto:coucoucorine@nadinecorp.net" target="_blank" class="body">Demander de l'aide par mail</a>
                </li>
                <li class="l-header__subnav-item l-header__subnav-separator">
                  <a href="./log.php" data-url="log" class="body">Journal de développement</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>


      <?php
      /**
      *   Header Bottom
      */
      // Le header bottom permet d'afficher qq élèments en bas de l'écran
      ?>

      <div class="l-header__logo l-header__bottom">
        <a href="./index.php"><?php include './assets/img/nadine-logo.svg.php'; ?></a>
      </div>
      <div class="l-header__mention l-header__bottom tiny">
        <span>Nadine <a href="./log.php">travaille tellement dur</a> pour s'améliorer !</span>
        <span>Numéro de version : Nadine Alpha <?php echo get_num_version(); ?></span>
        <span>Pensez à <a href="https://github.com/Nadine-Corp/Nadine/commits/main" target="_blank">mettre à jour</a> Nadine de temps en temps.</span>
      </div>
    </div>

  </header>


  <?php
  /**
  *   Début du Main
  */
  ?>
  <main>
