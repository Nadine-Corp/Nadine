<?php

// Cette page de TurboTuto™ est chargée au lancement de Nadine
// uniquement si Nadine n'arrive pas à joindre la base de donnée.


include './header.php';


/**
*  Test de la base de donnée : si pas Profil, lancement de la modal
*  demandant un reset de la base de donnée
*/

$sql = "SELECT * FROM Profil ORDER BY profil__id DESC LIMIT 1;";
include './core/query.php'; $result = $conn->query($sql);
if( !($result) ):
  ?>
  <div class="m-modal m-modal__xl is--active">
    <div class="m-modal__error">
      <div class="is--denko__container">
        <ul>
          <li class="is--denko">
            <span class="display1">Ne paniquez pas</span>
            <span class="display1">Ceci est une Erreur QuinzeMilleQuatre</span>
            <span class="display1">Ce n'est pas exercice</span>
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
    <div class="m-modal__msg">
      <p class="display1">La Base de données ne répond pas.</p>
      <div class="divider"></div>
      <p class="lead_paragraph">Ne paniquez pas : Nadine a déjà des solutions. Sélectionnez votre scenario :</p>
      <p class="body"><a data-toggle="m-modal" data-target=".m-modal__s">01 — Tout va bien : je lance Nadine pour la première fois. C'est donc normal que la Base de données soit vide et que Nadine panique un peu. Je veux continuer l'installation automatique.</a></p>
      <p class="body"><a href="https://discord.gg/Fg2m8gvdWR" target="_blank">02 — J'ai le plaisir d'utiliser Nadine quotidiennement. C'est donc que quelque chose ne vas pas. Je contacte les équipes de NadineCorp© qui se feront une joie de me dépanner gratuitement.</a></p>
    </div>
  </div>

  <div class="m-modal m-modal__s m-alerte">
    <div class="m-modal__msg">
      <p class="display1">Suppression imminente</p>
      <p class="lead_paragraph">Confirmez la réinstallation automatique de la Base de données en tapant <em>KonMari</em> ci-dessous.</p>
      <p class="body">Pas besoin de répéter deux fois la même chose à Nadine : si vous avez déjà utilisé Nadine, toutes vos données seront perdu à jamais.</p>
      <input type="text" name="input__doyouconfirme" value="" placeholder="Tapez ici">
      <button type="button" name="init__doyouconfirme" class="btn btn__plain">Continuer</button>
    </div>
  </div>
<?php endif; ?>



<section class="row">
  <div class="col l12">
    <h1 class="display1">Bonjour, je suis Nadine</h1>
  </div>
  <div class="col l6">
    <p class="body">Bienvenue dans votre nouveau logiciel de comptablité. Vous êtes actuellement dans le <em>TurboTuto™</em> de <a href="http://nadinecorp.net/" target="_blank"><em>NadineCorp©</em></a>. Je vais vous guider pour notre première rencontre. Pour commencer, j'ai besoin de mieux vous connaître. Pouvez-vous me donner queleques informations sur vous pour que je puisse créer votre profil ?</p>
  </div>
  <form class="form" action="./core/add__profil.php" method="post">


    <?php
    /**
    * Modifier vos coordonnées
    */
    ?>

    <div class="m-accordion col l12">
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

    <div class="m-accordion col l12">
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

    <div class="m-accordion col l12">
      <div class="m-accordion__titre">
        <h2 class="subheading">Vos coordonnées bancaires</h2>
        <div class="m-accordion__ico">
          <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
        </div>
      </div>
      <div class="m-accordion__wrapper">
        <div class="form__input-container">
          <input type="text" name="titulaire_du_compte" placeholder="Titulaire du compte" class="form__input-full"?>
          <input type="text" name="iban" placeholder="IBAN" class="form__input-half form__input-seperator">
          <input type="text" name="bic" placeholder="BIC" class="form__input-half">
        </div>
      </div>
    </div>


    <input type="submit" name="Enregistrer" class="btn btn__plain" value="Suivant">

  </form>
</section>


<?php include './footer.php'; ?>
