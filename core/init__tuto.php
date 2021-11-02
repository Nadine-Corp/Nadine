<?php

  // Cette page de TurboTuto™ est chargée au lancement de Nadine
  // uniquement si Nadine n'arrive pas à joindre la base de donnée.



    include './header.php';

    ?>





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

        <div class="accordion col l12">
          <div class="accordion__titre">
            <h2 class="subheading">Vos coordonnées</h2>
            <div class="accordion__icon">
              <?php include './assets/img/inline-icon_arrow_accordion.svg.php'; ?>
            </div>
          </div>
          <div class="accordion__container">
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

        <div class="accordion col l12">
          <div class="accordion__titre">
            <h2 class="subheading">N° de Secu & Maison des Artistes</h2>
            <div class="accordion__icon">
              <?php include './assets/img/inline-icon_arrow_accordion.svg.php'; ?>
            </div>
          </div>
          <div class="accordion__container">
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

        <div class="accordion col l12">
          <div class="accordion__titre">
            <h2 class="subheading">Vos coordonnées bancaires</h2>
            <div class="accordion__icon">
              <?php include './assets/img/inline-icon_arrow_accordion.svg.php'; ?>
            </div>
          </div>
          <div class="accordion__container">
            <div class="form__input-container">
              <input type="text" name="titulaire_du_compte" placeholder="Titulaire du compte" class="form__input-full"?>
              <input type="text" name="iban" placeholder="IBAN" class="form__input-half form__input-seperator">
              <input type="text" name="bic" placeholder="BIC" class="form__input-half">
            </div>
          </div>
        </div>


        <input type="submit" name="Enregistrer" class="btn btn--plain" value="Suivant">

      </form>
    </section>


  <?php include './footer.php'; ?>
