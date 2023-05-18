  <?php

  // Cette page du TurboTuto™ permet à l'utilisateur d'ajouter
  // son premier profil dans la base de données.


  /**
   * Importe le fichier rassemblant toutes les fonctions
   * les plus importantes de Nadine
   */

  require_once(__DIR__ . '/../fonctions.php');


  /**
   * Importe le <head>. Séparer le <head> du header.php
   * simplifier l'intégration du TurboTuto™️
   */

  include_once(__DIR__ . '/../../parts/p__head.php');


  /**
   * Vérifie si une modale doit être affichée
   */


  ?>

  <body>
    <main class="l-turbotuto" role="main">

      <section class="m-rom">
        <div class="m-col">
          <h1 class="m-display">Re-Bonjour,<br>je suis Nadine.</h1>
        </div>
        <div class="m-col l6">
          <p class="m-lead">Bienvenue dans votre nouveau logiciel de comptablité. Vous êtes actuellement dans le <em>TurboTuto™</em> de <a href="http://nadinecorp.net/" target="_blank"><em>NadineCorp©</em></a>. Je vais vous guider pour notre première rencontre. Pour commencer, j'ai besoin de mieux vous connaître afin de pouvoir <u>personnaliser vos factures</u>.<br><br>Pouvez-vous me donner quelques informations sur vous pour que je puisse créer votre profil ?</p>
        </div>
      </section>

      <?php
      /**
       * Modifier vos coordonnées
       */
      ?>
      <section class="m-rom">
        <form class="m-form m-form__step" action="./core/form__profil.php" method="post" autocomplete="off">


          <?php // Ajout de la navigation 
          ?>

          <nav class="m-form__nav">
            <ul>
              <li class="m-lead is--active" data-step="1">Identité</li>
              <li class="m-lead is--active" data-step="2">Coordonnées</li>
              <li class="m-lead is--active" data-step="3">MDA</li>
              <li class="m-lead" data-step="4">Iban</li>
            </ul>
          </nav>

          <?php // Ajout première étape du formulaire : Identité 
          ?>

          <div class="m-form__wrapper m-form__step-1">

            <div class="m-form__grp">
              <div class="m-form__label m-modal__contact-civilite">
                <?php $value = get_profil_civilite($row); ?>
                <label for="profil__civilite">Civilité</label>
                <div class="m-form__radio-horiz">
                  <div class="m-form__radio">
                    M.
                    <input name="profil__civilite" type="radio" value="M." <?php if (empty($value) || $value == "M.") echo "checked"; ?>>
                    <span class="checkmark"></span>
                  </div>
                  <div class="m-form__radio">
                    Mme
                    <input name="profil__civilite" type="radio" value="Mme" <?php if ($value == "Mme") echo "checked"; ?>>
                    <span class="checkmark"></span>
                  </div>
                </div>
              </div>
              <div class="m-form__label-amimate">
                <label for="profil__prenom">Prénom</label>
                <input type="text" name="profil__prenom" placeholder="Prénom" value="<?php the_profil_prenom($row); ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="profil__nom">Nom</label>
                <input type="text" name="profil__nom" placeholder="Nom" value="<?php the_profil_nom($row); ?>">
              </div>
            </div>
            <div class="m-form__grp">
              <div class="m-form__label-amimate">
                <label for="profil__pseudo">Pseudonyme</label>
                <input type="text" name="profil__pseudo" placeholder="Pseudonyme" value="<?php the_profil_pseudo($row); ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="profil__initiales">Initiales / Acronyme</label>
                <input type="text" name="profil__initiales" placeholder="Initiales / Acronyme" value="<?php the_profil_initiales($row); ?>">
              </div>
            </div>
            <div class="m-form__grp">
              <div class="m-form__label-amimate">
                <label for="profil__societe">Société</label>
                <input type="text" name="profil__societe" placeholder="Société" value="<?php the_profil_societe($row); ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="profil__siret">N° de Siret</label>
                <input type="text" name="profil__siret" placeholder="N° de Siret" value="<?php the_profil_siret($row); ?>">
              </div>
            </div>
          </div>


          <?php  // Ajout deuxième étape du formulaire : Coordonnées 
          ?>

          <div class="m-form__wrapper m-form__step-2">

            <div class="m-form__grp">
              <div class="m-form__label-amimate">
                <label for="profil__adresse">Adresse</label>
                <input type="text" name="profil__adresse" placeholder="Adresse" value="<?php the_profil_adresse($row); ?>">
              </div>
            </div>

            <div class="m-form__grp">
              <div class="m-form__label-amimate">
                <label for="profil__code_postal">Code postal</label>
                <input type="text" name="profil__code_postal" placeholder="Code postal" value="<?php the_profil_code_postal($row); ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="profil__ville">Ville</label>
                <input type="text" name="profil__ville" placeholder="Ville" value="<?php the_profil_ville($row); ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="profil__pays">Pays</label>
                <input type="text" name="profil__pays" placeholder="Pays" value="<?php the_profil_pays($row); ?>">
              </div>
            </div>

            <div class="m-form__grp">
              <div class="m-form__label-amimate">
                <label for="profil__telephone">Téléphone</label>
                <input type="text" name="profil__telephone" placeholder="Téléphone" value="<?php the_profil_telephone($row); ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="profil__email">Courriel</label>
                <input type="text" name="profil__email" placeholder="Courriel" value="<?php the_profil_email($row); ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="profil__website">Site internet</label>
                <input type="text" name="profil__website" placeholder="Site internet" value="<?php the_profil_website($row); ?>">
              </div>
            </div>

          </div>


          <?php // Ajout troisième étape du formulaire : MDA
          ?>

          <div class="m-form__wrapper m-form__step-3">

            <div class="m-form__grp">
              <div class="m-form__label m-modal__contact-civilite">
                <?php $value = get_profil_precompte($row); ?>
                <label for="profil__precompte">Assujetti⸱e au précompte ?</label>
                <div class="m-form__radio-horiz">
                  <div class="m-form__radio">
                    Non
                    <input name="profil__precompte" type="radio" value="Non" <?php if (empty($value) || $value == "Non") echo "checked"; ?>>
                    <span class="checkmark"></span>
                  </div>
                  <div class="m-form__radio">
                    Oui
                    <input name="profil__precompte" type="radio" value="Oui" <?php if ($value == "Oui") echo "checked"; ?>>
                    <span class="checkmark"></span>
                  </div>
                </div>
              </div>
              <div class="m-form__label-amimate">
                <label for="profil__numero_secu">N° de Sécu</label>
                <input type="text" name="profil__numero_secu" placeholder="N° de Sécu" value="<?php the_profil_numero_secu($row); ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="profil__numero_mda">N° de MDA</label>
                <input type="text" name="profil__numero_mda" placeholder="N° de MDA" value="<?php the_profil_numero_mda($row); ?>">
              </div>
            </div>

          </div>


          <?php // Ajout quatrième étape du formulaire : Iban 
          ?>

          <div class="m-form__wrapper m-form__step-4">

            <div class="m-form__grp">
              <div class="m-form__label-amimate">
                <label for="profil__titulaire_du_compte">Titulaire du compte</label>
                <input type="text" name="profil__titulaire_du_compte" placeholder="Titulaire du compte" value="<?php the_profil_titulaire_du_compte($row); ?>">
              </div>
            </div>

            <div class="m-form__grp">
              <div class="m-form__label-amimate">
                <label for="profil__iban">IBAN</label>
                <input type="text" name="profil__iban" placeholder="IBAN" value="<?php the_profil_iban($row); ?>">
              </div>
              <div class="m-form__label-amimate">
                <label for="profil__bic">BIC</label>
                <input type="text" name="profil__bic" placeholder="BIC" value="<?php the_profil_bic($row); ?>">
              </div>
            </div>

          </div>


          <?php // Ajout cinquième étape du formulaire : Input cachés
          ?>

          <div class="m-form__hide">
            <div class="m-form__grp">
              <div class="m-form__label-amimate">
                <label for="profil__template">Template de facture par defaut</label>
                <input type="text" name="profil__template" placeholder="Template de facture par defaut" value="facture__2021">
              </div>
            </div>


            <textarea name="profil__msg_devis" class="form__input-full" rows="10">
            Bonjour {{diffuseur__civilite}}. {{diffuseur__nom}}


Vous trouverez ci-joint notre proposition commerciale pour {{projet__nom}}.


Nous restons à votre disposition pour toutes questions.
Bonne journée.
{{profil__societe}}


Objet :
Devis → {{projet__nom}}


Email :
{{diffuseur__email}}
          </textarea>
            <textarea name="profil__msg_facture" class="form__input-full" rows="10">
            Bonjour {{diffuseur__civilite}}. {{diffuseur__nom}}

Vous trouverez ci-joint la facture pour {{projet__nom}}.


Attention : pour vous, j'ai choisi d'être à la <a href="https://www.lamaisondesartistes.fr/site/" target="_blank">Maison des Artistes</a>. Mes charges étant peu élevées, je peux vous proposer des tarifs extrêmement compétitifs. En échange, vous devez prendre 5 min pour faire un peu de paperasse :

1 — Régler par virement ce que vous me devez
2 — RDV sur le <a href="https://www.artistes-auteurs.urssaf.fr/aa/accueil" target="_blank">site dédié de l'URSSAF</a> pour la Maison des Artistes afin de créer votre compte «Diffuseur, commerce d’art»
3 — Renseigner la Nature de l’œuvre réalisée : créations graphiques et mon N° de Sécu : {{profil__numero_secu}}
4 — Régler par carte bancaire se que vous devez à l'URSSAF
↳ Plus d'info : www.secu-artistes-auteurs.fr

<b>Règlement par virement bancaire :</b>
Titulaire du compte : {{profil__titulaire_du_compte}}
IBAN : {{profil__iban}}
BIC : {{profil__bic}}


Je reste à votre disposition pour toutes questions.
Bonne journée.
{{profil__societe}}




Objet :
Facture → {{projet__nom}}


Email :
{{diffuseur__email}}
          </textarea>
          </div>


          <?php // Ajout la barre avec les boutons 
          ?>

          <div class="m-form__submit-bar m-btn__grp">
            <button class="btn btn__outline btn__cancel" type="button">Annuler</button>
            <button class="btn btn__outline btn__prev" type="button">Précédent</button>
            <button class="btn btn__plain btn__next" type="button">Suivant</button>
            <button class="btn btn__plain btn__submit" type="submit">Enregistrer</button>
          </div>

        </form>
      </section>



      <?php
      /**
       * Ajout du Footer
       */

      include './footer.php';
      die;
      ?>