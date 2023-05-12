<?php

// Ce fichier est le premier a être exécuté lors de la construction
// des pages. C'est ici que tout commence...


/**
 *  Test la connexion à la base de données
 * Si une erreur est detectée, Nadine lancera le TurboTuto™️
 */

require(__DIR__ . '/core/database/db__test.php');


/**
 * Importe le <head>. Séparer le <head> du header.php
 * simplifier l'intégration du TurboTuto™️
 */

include_once(__DIR__ . '/parts/p__head.php');

?>


<body>
  <header class="l-header">

    <?php
    // La MainBar contient la barre de recherche et les futurs Widgets 
    ?>
    <div class="l-header__bar l-header__mainbar">
      <div class="l-header__searchbar subheading">
        <input type="text" placeholder="Soon™ : pleins de trucs ici.">
      </div>
    </div>

    <?php // La NavBar permet de naviguer d'une page à l'autre 
    ?>
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
              <div class="l-header__nav-txt m-lead">
                PROJETS
              </div>
            </a>
          </li>
          <li class="l-header__nav-item">
            <a href="./contacts.php" data-url="contacts">
              <div class="l-header__nav-ico">
                <?php include './assets/img/ico_contact.svg.php'; ?>
              </div>
              <div class="l-header__nav-txt m-lead">
                CONTACTS
              </div>
            </a>
          </li>
          <li class="l-header__nav-item">
            <a href="./suivi.php" data-url="suivi">
              <div class="l-header__nav-ico">
                <?php include './assets/img/ico_suivi.svg.php'; ?>
              </div>
              <div class="l-header__nav-txt m-lead">
                SUIVI
              </div>
            </a>
          </li>
          <li class="l-header__nav-item m-accordion">
            <a class="m-accordion__titre">
              <div class="l-header__nav-ico">
                <?php include './assets/img/ico_menu.svg.php'; ?>
              </div>
              <div class="l-header__nav-txt m-lead">
                PLUS
              </div>
              <div class="m-accordion__ico">
                <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
              </div>
            </a>
            <div class="m-accordion__wrapper">
              <ul class="l-header__subnav">
                <li class="l-header__subnav-item l-header__subnav-separator">
                  <a href="./profil.php" data-url="profil" class="m-body m-ss">Modifier votre profil</a>
                </li>
                <li class="l-header__subnav-item">
                  <a href="./bilan.php" data-url="bilan" class="m-body m-ss">Générer le bilan annuel</a>
                </li>
                <li class="l-header__subnav-item l-header__subnav-separator">
                  <a href="https://discord.gg/Fg2m8gvdWR" target="_blank" class="m-body m-ss">Rejoindre le NadineClub©</a>
                </li>
                <li class="l-header__subnav-item">
                  <a href="mailto:coucoucorine@nadinecorp.net" target="_blank" class="m-body m-ss">Demander de l'aide par mail</a>
                </li>
                <li class="l-header__subnav-item l-header__subnav-separator">
                  <a href="./log.php" data-url="log" class="m-body m-ss">Journal de développement</a>
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
      <div class="l-header__mention l-header__bottom m-caption">
        <span>Nadine <a href="./log.php">travaille tellement dur</a> pour s'améliorer !</span>
        <span>Numéro de version : Nadine Alpha <?php echo get_num_version(); ?></span>
        <span>Pensez à <a href="https://github.com/Nadine-Corp/Nadine/commits/main" target="_blank">mettre à jour</a> Nadine de temps en temps.</span>
      </div>
    </div>

  </header>