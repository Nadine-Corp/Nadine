  <?php

  // Cette page de TurboTuto™ est chargée au lancement de Nadine
  // uniquement si Nadine n'arrive pas à joindre la base de données.

  /**
   * Importe le <head>. Séparer le <head> du header.php
   * simplifier l'intégration du TurboTuto™️
   */

  include_once(__DIR__ . '/../../parts/p__head.php');


  /**
   * Vérifie si une modale doit être affichée
   */

  if (isset($_GET['modal'])) {
    $modal = $_GET['modal'];
  } else {
    $modal = 'tt01';
  }

  ?>

  <body>
    <main class="l-turbotuto" role="main">


      <?php
      /**
       * Première modale 
       */
      ?>

      <div class="m-modal__tt01 m-modal <?php if ($modal == 'tt01') echo 'is--active'; ?>">
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
              <strong>01 —</strong> Tout va bien : je lance <i>Nadine</i> pour la première fois et la <i>Base de données</i> est effectivement vide. Il est bien normal que <i>Nadine</i> soit un peu perdue. Je veux simplement continuer l'installation automatique.
            </div>
          </a>
          <a href="" class="btn__modal" data-modal="tt03">
            <div class="m-modal_choix m-ss m-body">
              <strong>02 —</strong> J'ai le plaisir d'utiliser <i>Nadine</i> quotidiennement. Hier encore, tout fonctionnait correctement. C'est donc que quelque chose ne vas pas. Je contacte les équipes de <i>NadineCorp©</i> qui se feront une joie de me dépanner gratuitement.
            </div>
          </a>
        </div>
      </div>


      <?php
      /**
       * Seconde modale 
       */
      ?>

      <div class="m-modal__tt02 m-modal <?php if ($modal == 'tt02') echo 'is--active'; ?>">
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
          <p class="m-lead m-ss">Maintenant, testons votre <i>Base de données</i>. Voici les informations dont dispose <i>Nadine</i> pour le moment. Vérifiez-les et lancez un test de connexion.</p>
          <form class="m-form" action="./core/turbotuto/turbotuto__autoconfig.php" method="post">
            <div class="m-form__wrapper">
              <div class="m-form__label-amimate">
                <label for="db__serveur">Serveur</label>
                <input type="text" name="db__serveur" placeholder="Serveur" value="<?php echo $servername; ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="db__username">Utilisateur</label>
                <input type="text" name="db__username" placeholder="Utilisateur" value="<?php echo $username; ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="db__password">Mot de passe</label>
                <input type="text" name="db__password" placeholder="Mot de passe" value="<?php echo $password; ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="db__name">Nom de la base de données</label>
                <input type="text" name="db__name" placeholder="Nom de la base de données" value="<?php echo $dbname; ?>">
              </div>
            </div>

            <?php // Ajout la barre avec les boutons 
            ?>
            <div class="m-form__submit-bar m-btn__grp">
              <button class="btn btn__outline btn__modal" data-modal="tt01" type="button">Précédent</button>
              <button class="btn btn__plain" type="submit">Connexion</button>
            </div>

          </form>
        </div>
      </div>


      <?php
      /**
       * Troisième modale 
       */
      ?>

      <div class="m-modal__tt03 m-modal <?php if ($modal == 'tt03') echo 'is--active'; ?>">
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
          <div class="m-form__submit-bar m-btn__grp m-mt2">
            <button class="btn btn__plain btn__modal" data-modal="tt01" type="button">Précédent</button>
          </div>

        </div>
      </div>



      <?php
      /**
       * Quatrième modale 
       */
      ?>

      <div class="m-modal__tt04 m-modal <?php if ($modal == 'tt04') echo 'is--active'; ?>">
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
          <p class="m-lead m-ss">Quelques choses ne fonctionne pas : <i>Nadine</i> n'arrive toujours à se connecter à la <i>Base de données</i>. Voulez-vous réessayer ?</p>
          <form class="m-form" action="./core/turbotuto/turbotuto__autoconfig.php" method="post">
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

            <?php // Ajout la barre avec les boutons 
            ?>
            <div class="m-form__submit-bar m-btn__grp">
              <button class="btn btn__outline btn__modal" data-modal="tt02" type="button">Précédent</button>
              <button class="btn btn__outline btn__modal" data-modal="tt03" type="button">Aide</button>
              <button class="btn btn__plain" type="submit">Réessayer</button>
            </div>
          </form>

        </div>
      </div>


      <?php
      /**
       * Ajout du Footer
       */

      include './footer.php';
