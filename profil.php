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
              <div class="m-form__label-amimate">
                <label for="profil__initiales">Initiales / Acronyme</label>
                <input type="text" name="profil__initiales" placeholder="Initiales / Acronyme" value="<?php the_profil_initiales($row); ?>">
              </div>
            </div>

            <div class="m-form__grp">
              <div class="m-form__label m-modal__contact-civilite">
                <?php $value = get_profil_civilite($row); ?>
                <label for="profil__civilite">Civilité</label>
                <div class="m-form__radio-horiz">
                  <div class="m-form__radio">
                    M.
                    <input name="profil__civilite" type="radio" value="M." <?php if (empty($value) || $value == "M.") {
                                                                              echo "checked";
                                                                            } ?>>
                    <span class="checkmark"></span>
                  </div>
                  <div class="m-form__radio">
                    Mme
                    <input name="profil__civilite" type="radio" value="Mme" <?php if ($value == "Mme") {
                                                                              echo "checked";
                                                                            } ?>>
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
              <div class="m-form__label-amimate">
                <label for="profil__pseudo">Pseudonyme</label>
                <input type="text" name="profil__pseudo" placeholder="Pseudonyme" value="<?php the_profil_pseudo($row); ?>">
              </div>
            </div>

            <div class="m-form__grp">
              <div class="m-form__label m-modal__contact-civilite">
                <?php $value = get_profil_precompte($row); ?>
                <label for="profil__precompte">Assujetti⸱e au précompte ?</label>
                <div class="m-form__radio-horiz">
                  <div class="m-form__radio">
                    Non
                    <input name="profil__precompte" type="radio" value="Non" <?php if (empty($value) || $value == "Non") {
                                                                                echo "checked";
                                                                              } ?>>
                    <span class="checkmark"></span>
                  </div>
                  <div class="m-form__radio">
                    Oui
                    <input name="profil__precompte" type="radio" value="Oui" <?php if ($value == "Oui") {
                                                                                echo "checked";
                                                                              } ?>>
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


          <?php // Ajout deuxième étape du formulaire : Identité 
          ?>

          <div class="m-form__wrapper m-form__step-2">

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


          <?php // Ajout troisième étape du formulaire : Gabarits de courriel 
          ?>

          <div class="m-form__wrapper m-form__step-3">
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
