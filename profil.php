<?php

// Ce fichier permet à l'utilisateur
// de modifier son profil


/**
 * Ajout du Header
 */

include(__DIR__ . '/header.php');
?>

<main class="l-profil" role="main">
  <?php
  // Récupère l'ID du dernier profil dans la base de donnée
  $args = array(
    'FROM'     => 'Profil',
    'ORDER BY' => 'profil__id',
    'ORDER'    => 'DESC',
    'LIMIT'    => 1
  );

  $loop = nadine_query($args);
  if ($loop->num_rows > 0) :
    while ($row = $loop->fetch_assoc()) :
  ?>

      <?php // Ajout du titre 
      ?>

      <section class="m-rom">
        <div class="m-col">
          <h1 class="m-headline">Votre Profil</h1>
        </div>
      </section>

      <?php // Ajout du formulaire 
      ?>

      <section class="m-rom">
        <form class="m-form m-form__step" action="./core/add__profil.php" method="post">


          <?php // Ajout de la navigation 
          ?>

          <nav class="m-form__nav">
            <ul>
              <li class="m-lead is--active" data-step="1">Coordonnées</li>
              <li class="m-lead" data-step="2">Iban</li>
              <li class="m-lead" data-step="3">Gabarits de courriel</li>
              <li class="m-lead" data-step="4">Mentions légales</li>
            </ul>
          </nav>


          <?php // Ajout première étape du formulaire : Coordonnées 
          ?>

          <div class="m-form__wrapper m-form__step-1">

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

            <div class="m-form__grp">
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
                <label for="the_profil_pays">Pays</label>
                <input type="text" name="the_profil_pays" placeholder="Pays" value="<?php the_profil_pays($row); ?>">
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

          <input type="text" name="civilite" placeholder="Civilité" class="form__input-full" <?php if (!empty($row["profil__civilite"])) {
                                                                                                echo 'value="' . $row["profil__civilite"] . '""';
                                                                                              } ?>>


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
              <div class="form__slider-container">
                <p class="lead_paragraph">Êtes-vous assujetti⸱e au précompte ?</p>
                <span>Non</span>
                <label class="switch">
                  <?php
                  if ($row["profil__precompte"] == "1") {
                    echo '<input name="precompte" type="checkbox" checked>';
                  } else {
                    echo '<input name="precompte" type="checkbox">';
                  };
                  ?>
                  <span class="slider  is--fullsize round"></span>
                </label>
                <span>Oui</span>
              </div>
              <div class="form__input-container m-body">
                <input type="text" name="numero_secu" placeholder="N° de Sécurité sociale" class="form__input-half form__input-seperator" <?php if (!empty($row["profil__numero_secu"])) {
                                                                                                                                            echo 'value="' . $row["profil__numero_secu"] . '""';
                                                                                                                                          } ?>>
                <input type="text" name="numero_mda" placeholder="N° MDA" class="form__input-half" <?php if (!empty($row["profil__numero_mda"])) {
                                                                                                      echo 'value="' . $row["profil__numero_mda"] . '""';
                                                                                                    } ?>>
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
              <h2 class="subheading">Coordonnées bancaires</h2>
              <div class="m-accordion__ico">
                <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
              </div>
            </div>
            <div class="m-accordion__wrapper">
              <div class="form__input-container m-body">
                <input type="text" name="titulaire_du_compte" placeholder="Titulaire du compte" class="form__input-full" <?php if (!empty($row["profil__titulaire_du_compte"])) {
                                                                                                                            echo 'value="' . $row["profil__titulaire_du_compte"] . '""';
                                                                                                                          } ?>>
                <input type="text" name="iban" placeholder="IBAN" class="form__input-half form__input-seperator" <?php if (!empty($row["profil__iban"])) {
                                                                                                                    echo 'value="' . $row["profil__iban"] . '""';
                                                                                                                  } ?>>
                <input type="text" name="bic" placeholder="BIC" class="form__input-half" <?php if (!empty($row["profil__bic"])) {
                                                                                            echo 'value="' . $row["profil__bic"] . '""';
                                                                                          } ?>>
              </div>
            </div>
          </div>


          <?php
          /**
           * Gabarits d'email des devis et facture
           */
          ?>

          <div class="m-accordion m-col">
            <div class="m-accordion__titre">
              <h2 class="subheading">Gabarits d'email des devis et facture</h2>
              <div class="m-accordion__ico">
                <?php include './assets/img/ico_arrow-accordion.svg.php'; ?>
              </div>
            </div>
            <div class="m-accordion__wrapper">
              <div class="form__input-container m-body">
                <p>Liste des variables :
                <ul>
                  <li>{{diffuseur__civilite}}</li>
                  <li>{{diffuseur__prenom}}</li>
                  <li>{{diffuseur__nom}}</li>
                  <li>{{diffuseur__societe}}</li>
                  <li>{{diffuseur__email}}</li>
                  <li>{{projet__nom}}</li>
                  <li>{{profil__societe}}</li>
                  <li>{{profil__civilite}}</li>
                  <li>{{profil__prenom}}</li>
                  <li>{{profil__nom}}</li>
                  <li>{{profil__numero_secu}}</li>
                  <li>{{profil__titulaire_du_compte}}</li>
                  <li>{{profil__iban}}</li>
                  <li>{{profil__bic}}</li>
                </ul>
                </p>
                <textarea name="profil__msg_devis" class="form__input-full" rows="10"><?php if (!empty($row["profil__msg_devis"])) {
                                                                                        echo $row["profil__msg_devis"];
                                                                                      } ?></textarea>
                <textarea name="profil__msg_facture" class="form__input-full" rows="10"><?php if (!empty($row["profil__msg_facture"])) {
                                                                                          echo $row["profil__msg_facture"];
                                                                                        } ?></textarea>
              </div>
            </div>
          </div>


          <input type="submit" name="Enregistrer" class="btn btn__plain" value="Enregistrer">

        </form>
      </section>

    <?php endwhile; ?>
  <?php else : ?>
    <section class="m-rom">
      <div class="m-col">
        <p class="m-lead">Chef, on n'a rien trouvé ici...</p>
      </div>
    </section>
  <?php endif; ?>

  <?php
  /**
   * Ajout du Footer
   */

  include './footer.php';
