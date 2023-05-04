  <?php

  // Cette page de TurboTuto™ est chargée au lancement de Nadine
  // uniquement si Nadine n'arrive pas à joindre la base de donnée.


  //include_once(__DIR__ .  './../header.php');
  //include_once(__DIR__ .  './database/db__check.php');


  // récupérer les valeurs du formulaire
  $servername = 'chien';
  $username = 'chat';
  $password = 'pomme';
  $dbname = 'gateau';

  // lire le contenu de config.php
  $config_content = file_get_contents('./core/config.php');

  // remplacer les valeurs
  $config_content = preg_replace('/\$servername\s*=\s*".*";/', "\$servername = \"$servername\";", $config_content);
  $config_content = preg_replace('/\$username\s*=\s*".*";/', "\$username = \"$username\";", $config_content);
  $config_content = preg_replace('/\$password\s*=\s*".*";/', "\$password = \"$password\";", $config_content);
  $config_content = preg_replace('/\$dbname\s*=\s*".*";/', "\$dbname = \"$dbname\";", $config_content);

  // écrire le nouveau contenu dans config.php
  file_put_contents('./core/config__test.php', $config_content);



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

  <body>
    <main class="l-turbotuto" role="main">


      <?php
      /**
       * Première modale 
       */
      ?>

      <div class="m-modal__tt01 m-modal is--active">
        <div class="m-modal__denko">
          <div class="is--denko__container m-row">
            <ul>
              <li class="is--denko">
                <span class="m-display">Ceci est une Erreur QuinzeMilleQuatre</span>
                <span class="m-display">Ce n'est pas exercice</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="m-modal__img">
          <div class="m-img__full">
            <div class="m-img__wrapper is--fullsize">
              <img src="./assets/img/back__modal.jpg" alt="">
            </div>
          </div>
        </div>
        <div class="m-modal__wrapper">
          <h1 class="m-display">Bonjour.</h1>
          <p class="m-lead m-ss">Votre <i>Base de données</i> ne répond pas. <br>Ne paniquez pas.</p>
          <div class="m-divider__v"></div>
          <p class="m-body-l">Nadine a déjà des solutions. Sélectionnez votre scenario :</p>
          <a href="" class="btn__modal" data-modal="tt02">
            <div class="m-modal_choix m-ss m-body">
              <strong>01 —</strong> Tout va bien : je lance Nadine pour la première fois et la <i>Base de données</i> est effectivement vide. Il est bien normal que Nadine soit un peu perdue. Je veux simplement continuer l'installation automatique.
            </div>
          </a>
          <a href="" class="btn__modal" data-modal="tt03">
            <div class="m-modal_choix m-ss m-body">
              <strong>02 —</strong> J'ai le plaisir d'utiliser Nadine quotidiennement. Hier encore, tout fonctionnait correctement. C'est donc que quelque chose ne vas pas. Je contacte les équipes de <i>NadineCorp©</i> qui se feront une joie de me dépanner gratuitement.
            </div>
          </a>
        </div>
      </div>


      <?php
      /**
       * Seconde modale 
       */
      ?>

      <div class="m-modal__tt02 m-modal">
        <div class="m-modal__denko">
          <div class="is--denko__container m-row">
            <ul>
              <li class="is--denko">
                <span class="m-display">Ceci est une Erreur QuinzeMilleQuatre</span>
                <span class="m-display">Ce n'est pas exercice</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="m-modal__img">
          <div class="m-img__full">
            <div class="m-img__wrapper is--fullsize">
              <img src="./assets/img/back__modal.jpg" alt="">
            </div>
          </div>
        </div>
        <div class="m-modal__wrapper">
          <h1 class="m-display">Super !</h1>
          <div class="m-divider__v"></div>
          <p class="m-lead m-ss">Maintenant, testons votre <i>Base de données</i>. Voici les informations dont dispose Nadine pour le moment. Vérifiez-les et lancez un test.</p>
          <form class="m-form" action="" method="post">
            <div class="m-form__wrapper">
              <div class="m-form__label-amimate">
                <label for="db__serveur">Serveur</label>
                <input type="text" name="db__serveur" placeholder="ID du projet" value="<?php echo $servername; ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="db__username">Utilisateur</label>
                <input type="text" name="db__username" placeholder="ID du projet" value="<?php echo $username; ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="db__password">Mot de passe</label>
                <input type="text" name="db__password" placeholder="ID du projet" value="<?php echo $password; ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="db__name">Nom de la base de données</label>
                <input type="text" name="db__name" placeholder="ID du projet" value="<?php echo $dbname; ?>">
              </div>
            </div>
          </form>

          <?php // Ajout la barre avec les boutons 
          ?>
          <div class="m-form__submit-bar m-btn__grp">
            <button class="btn btn__outline btn__modal" data-modal="tt01" type="button">Précédent</button>
            <button class="btn btn__plain btn__modal" data-modal="tt04" type="button">Tester</button>
          </div>

        </div>
      </div>


      <?php
      /**
       * Troisième modale 
       */
      ?>

      <div class="m-modal__tt03 m-modal">
        <div class="m-modal__denko">
          <div class="is--denko__container m-row">
            <ul>
              <li class="is--denko">
                <span class="m-display">Ceci est une Erreur QuinzeMilleQuatre</span>
                <span class="m-display">Ce n'est pas exercice</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="m-modal__img">
          <div class="m-img__full">
            <div class="m-img__wrapper is--fullsize">
              <img src="./assets/img/back__modal.jpg" alt="">
            </div>
          </div>
        </div>
        <div class="m-modal__wrapper">
          <h1 class="m-display">Besoin d'aide ?</h1>
          <p class="m-lead m-ss">Toutes les équipes de <i>Nadine Corp.©️</i> sont connectées 24 H / 24.</p>
          <div class="m-divider__v"></div>
          <p class="m-body-l m-mb2">Retrouvons-nous sur votre réseaux préféré :</p>
          <a href="https://discord.gg/Fg2m8gvdWR" target="_blank">
            <div class="m-modal_choix m-ss m-body">
              <strong>01 —</strong> Discord.
            </div>
          </a>
          <a href="https://twitter.com/NadineCorp" target="_blank">
            <div class="m-modal_choix m-ss m-body">
              <strong>02 —</strong> Twitter.
            </div>
          </a>
          <a href="https://www.instagram.com/nadinecorpofficiel/" target="_blank">
            <div class="m-modal_choix m-ss m-body">
              <strong>03 —</strong> Instagram.
            </div>
          </a>
          <a href="mailto:coucoucorine@nadinecorp.net" target="_blank">
            <div class="m-modal_choix m-ss m-body">
              <strong>04 —</strong> Courriel.
            </div>
          </a>

          <?php // Ajout la barre avec les boutons 
          ?>
          <div class="m-form__submit-bar m-btn__grp m-mt1">
            <button class="btn btn__plain btn__modal" data-modal="tt01" type="button">Précédent</button>
          </div>

        </div>
      </div>



      <?php
      /**
       * Quatrième modale 
       */
      ?>

      <div class="m-modal__tt04 m-modal is--active">
        <div class="m-modal__denko">
          <div class="is--denko__container m-row">
            <ul>
              <li class="is--denko">
                <span class="m-display">Ceci est une Erreur QuinzeMilleQuatre</span>
                <span class="m-display">Ce n'est pas exercice</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="m-modal__img">
          <div class="m-img__full">
            <div class="m-img__wrapper is--fullsize">
              <img src="./assets/img/back__modal.jpg" alt="">
            </div>
          </div>
        </div>
        <div class="m-modal__wrapper">
          <p class="m-lead m-ss">Quelques choses ne fonctionne pas : nous n'arrivons toujours à nous connecter à la <i>Base de données</i>. Voulez-vous ré-essayer ?</p>
          <form class="m-form" action="" method="post">
            <div class="m-form__wrapper">
              <div class="m-form__label-amimate">
                <label for="db__serveur">Serveur</label>
                <input type="text" name="db__serveur" placeholder="ID du projet" value="<?php echo $servername; ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="db__username">Utilisateur</label>
                <input type="text" name="db__username" placeholder="ID du projet" value="<?php echo $username; ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="db__password">Mot de passe</label>
                <input type="text" name="db__password" placeholder="ID du projet" value="<?php echo $password; ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="db__name">Nom de la base de données</label>
                <input type="text" name="db__name" placeholder="ID du projet" value="<?php echo $dbname; ?>">
              </div>
            </div>
          </form>

          <?php // Ajout la barre avec les boutons 
          ?>
          <div class="m-form__submit-bar m-btn__grp">
            <button class="btn btn__outline btn__modal" data-modal="tt01" type="button">Précédent</button>
            <button class="btn btn__plain btn__modal" data-modal="tt01" type="button">ReTester</button>
          </div>

        </div>
      </div>



      <?php
      /**
       * Ajout du Footer
       */

      include './footer.php';
      die;
      ?>



      <section class="m-rom">
        <div class="m-col">
          <h1 class="m-lead">Bonjour, je suis Nadine</h1>
        </div>
        <div class="m-col l6">
          <p class="m-body">Bienvenue dans votre nouveau logiciel de comptablité. Vous êtes actuellement dans le <em>TurboTuto™</em> de <a href="http://nadinecorp.net/" target="_blank"><em>NadineCorp©</em></a>. Je vais vous guider pour notre première rencontre. Pour commencer, j'ai besoin de mieux vous connaître. Pouvez-vous me donner quelques informations sur vous pour que je puisse créer votre profil ?</p>
        </div>
        <form class="form" action="./core/add__profil.php" method="post">


          <?php
          /**
           * Modifier vos coordonnées
           */
          ?>

          <div class="m-accordion m-col">
            <div class="m-accordion__titre">
              <h2 class="subheading">Vos coordonnées</h2>
              <div class="m-accordion__ico">
                <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
              </div>
            </div>
            <div class="m-accordion__wrapper">
              <div class="form__input-container">
                <input type="text" name="civilite" placeholder="Civilité" class="form__input-full">
                <input type="text" name="prenom" placeholder="Prénom" class="form__input-half form__input-seperator" required>
                <input type="text" name="nom" placeholder="Nom" class="form__input-half" required>
                <input type="text" name="adresse" placeholder="Adresse" class="form__input-full">
                <input type="text" name="code_postal" placeholder="Code postal" class="form__input-half form__input-seperator">
                <input type="text" name="ville" placeholder="Ville" class="form__input-half">
                <input type="text" name="societe" placeholder="Société" class="form__input-half form__input-seperator">
                <input type="text" name="siret" placeholder="SIRET" class="form__input-half">
                <input type="text" name="telephone" placeholder="Téléphone" class="form__input-half form__input-seperator">
                <input type="text" name="email" placeholder="Email" class="form__input-half">
                <input type="text" name="website" placeholder="Site web" class="form__input-full">
              </div>
            </div>
          </div>

          <?php
          /**
           * N° de Secu & Maison des Artistes
           */
          ?>

          <div class="m-accordion m-col">
            <div class="m-accordion__titre">
              <h2 class="subheading">N° de Secu & Maison des Artistes</h2>
              <div class="m-accordion__ico">
                <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
              </div>
            </div>
            <div class="m-accordion__wrapper">
              <div class="form__input-container">
                <input type="text" name="numero_secu" placeholder="N° de Sécurité sociale" class="form__input-half form__input-seperator">
                <input type="text" name="numero_mda" placeholder="N° MDA" class="form__input-half">
              </div>
            </div>
          </div>


          <?php
          /**
           * Coordonnées bancaires
           */
          ?>

          <div class="m-accordion m-col">
            <div class="m-accordion__titre">
              <h2 class="subheading">Vos coordonnées bancaires</h2>
              <div class="m-accordion__ico">
                <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
              </div>
            </div>
            <div class="m-accordion__wrapper">
              <div class="form__input-container">
                <input type="text" name="titulaire_du_compte" placeholder="Titulaire du compte" class="form__input-full" ?>
                <input type="text" name="iban" placeholder="IBAN" class="form__input-half form__input-seperator">
                <input type="text" name="bic" placeholder="BIC" class="form__input-half">
              </div>
            </div>
          </div>


          <input type="submit" name="Enregistrer" class="btn btn__plain" value="Suivant">

        </form>
      </section>