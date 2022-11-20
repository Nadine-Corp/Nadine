<?php

// Ce fichier permet de controler l'affichage de la modale
// permettant d'ajouter un nouveau contact

?>

<div class="m-modal__contact m-modal">
  <div class="m-modal__denko">
    <div class="is--denko__container m-row">
      <ul>
        <li class="is--denko">
          <span class="m-display">Ajouter un contact</span>
        </li>
      </ul>
    </div>
  </div>
  <div class="m-modal__wrapper">



    <?php // Ajout du formulaire ?>

    <form class="m-form m-form__step" action="./core/add__projet.php" method="post">

      <?php // Ajout de la navigation ?>

      <nav  class="m-form__nav">
        <ul>
          <li class="m-lead is--active" data-step="1">Type de contact</li>
          <li class="m-lead" data-step="2">Identité</li>
          <li class="m-lead" data-step="2">Coordonnées</li>
        </ul>
      </nav>

      <?php // Ajout première étape du formulaire : Type de contact ?>
      <div class="m-form__wrapper m-form__step-1">
        <div class="m-form__label m-form__select-tab">
          <label for="contact__type">Type de contacts</label>
          <select name="contact__type">
            <option value="Diffuseur" selected>Diffuseur</option>
            <option value="Artiste-Auteur">Artiste-Auteur</option>
          </select>
          <div class="m-form__instructions m-body">
            <strong class="m-ss">Information :</strong><em> Les </em>Diffuseurs<em> sont les personnes physiques ou morales qui rémunèrent un•e </em>Artiste-Auteur<em> en vue de diffuser, exploiter ou utiliser son œuvre. Autrement dit : les </em>Diffuseurs<em> sont les clients des </em>Artistes-Auteurs<em>.</em>
          </div>
        </div>
        <div class="m-form__label m-form__select-tab">
          <label for="diffuseur__type">Type de diffuseurs</label>
          <select name="diffuseur__type">
            <option value="Galerie d’art" selected>Galerie d’art</option>
            <option value="Particulier">Particulier</option>
            <option value="Autre">Autre</option>
          </select>
        </div>
      </div>


      <?php // Ajout deuxième étape du formulaire : Identité ?>

      <div class="m-form__wrapper m-form__step-2">
        <div class="m-form__grp">
          <div class="m-form__label m-modal__contact-civilite">
            <label for="contact__civilite">Civilité</label>
            <div class="m-form__radio-horiz">
              <div class="m-form__radio">
                M.
                <input name="contact__civilite" type="radio" checked>
                <span class="checkmark"></span>
              </div>
              <div class="m-form__radio">
                Mme
                <input name="contact__civilite" type="radio">
                <span class="checkmark"></span>
              </div>
            </div>
          </div>
          <div class="m-form__label-amimate">
            <label for="contact__prenom">Prénom</label>
            <input type="text" name="contact__prenom" placeholder="Prénom">
          </div>
          <div class="m-form__label-amimate">
            <label for="contact__nom">Nom</label>
            <input type="text" name="contact__nom" placeholder="Nom">
          </div>
        </div>
        <div class="m-form__grp">
          <div class="m-form__label-amimate">
            <label for="contact__societe">Société</label>
            <input type="text" name="contact__societe" placeholder="Société">
          </div>
          <div class="m-form__label-amimate">
            <label for="contact__siret">N° de Siret</label>
            <input type="text" name="contact__siret" placeholder="N° de Siret">
          </div>
        </div>
        <div class="m-form__grp">
          <div class="m-form__label-amimate">
            <label for="contact__numero_secu">N° de Sécu</label>
            <input type="text" name="contact__numero_secu" placeholder="N° de Sécu" required>
          </div>
          <div class="m-form__label-amimate">
            <label for="contact__numero_mda">N° de MDA</label>
            <input type="text" name="contact__numero_mda" placeholder="N° de MDA" required>
          </div>
        </div>
      </div>


      <?php // Ajout troisième étape du formulaire : Coordonnées ?>
      <div class="m-form__wrapper m-form__step-3">
        <div class="m-form__label-amimate">
          <label for="contact__adresse">Adresse</label>
          <input type="text" name="contact__adresse" placeholder="Adresse" required>
        </div>
        <div class="m-form__grp">
          <div class="m-form__label-amimate">
            <label for="contact__code_postal">Code postal</label>
            <input type="text" name="contact__code_postal" placeholder="Code postal" required>
          </div>
          <div class="m-form__label-amimate">
            <label for="contact__ville">Ville</label>
            <input type="text" name="contact__ville" placeholder="Ville" required>
          </div>
          <div class="m-form__label-amimate">
            <label for="contact__pays">Pays</label>
            <input type="text" name="contact__pays" placeholder="Pays" required>
          </div>
        </div>
        <div class="m-form__grp">
          <div class="m-form__label-amimate">
            <label for="contact__telephone">Téléphone</label>
            <input type="text" name="contact__telephone" placeholder="Téléphone" required>
          </div>
          <div class="m-form__label-amimate">
            <label for="contact__courriel">Courriel</label>
            <input type="text" name="contact__courriel" placeholder="Courriel" required>
          </div>
          <div class="m-form__label-amimate">
            <label for="contact__website">Site internet</label>
            <input type="text" name="contact__website" placeholder="Site internet" required>
          </div>
        </div>
      </div>


      <?php // Ajout la barre avec les boutons ?>

      <div class="m-form__submit-bar m-btn__grp">
        <button class="btn btn__outline btn__ico"><?php include './assets/img/ico_corbeille.svg.php'; ?></button>
        <button class="btn btn__outline btn__cancel" type="button">Annuler</button>
        <button class="btn btn__outline btn__prev" type="button">Précédent</button>
        <button class="btn btn__plain btn__next" type="button">Suivant</button>
        <button class="btn btn__plain btn__submit" type="submit">Valider</button>
      </div>
    </div>
  </form>
</div>
