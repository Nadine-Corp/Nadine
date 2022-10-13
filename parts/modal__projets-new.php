<?php

// Ce fichier permet de controler l'affichage de la modale
// permettant d'ajouter un nouveau projet

?>

<div class="m-modal__add-projet m-modal is--active">
  <div class="m-modal__denko">
    <div class="is--denko__container">
      <ul>
        <li class="is--denko">
          <span class="display13">Ajouter un projet</span>
        </li>
      </ul>
    </div>
  </div>
  <div class="m-modal__wrapper">



    <?php // Ajout du formulaire ?>

    <form class="m-form m-form__step">

      <?php // Ajout de la navigation ?>

      <nav  class="m-form__nav">
        <ul>
          <li class="display1 is--active" data-step="1">Information</li>
          <li class="display1" data-step="2">Diffuseur</li>
          <li class="display1" data-step="3">Équipe</li>
        </ul>
      </nav>

      <?php // Ajout première étape du formulaire : les Informations ?>
      <div class="m-form__wrapper m-form__step-1">
        <div class="m-form__label-amimate">
          <label for="nom_du_projet">Nom du projet</label>
          <input type="text" name="nom_du_projet" placeholder="Nom du projet" required>
        </div>
        <div class="m-form__label m-form__half">
          <label for="date_de_creation">Date de création</label>
          <input type="date" name="date_de_creation" placeholder="Date de création" value="<?php the_date_today() ?>" required>
        </div>
        <div class="m-form__label m-form__half">
          <label for="date_de_fin">Date de fin</label>
          <input type="date" name="date_de_fin" placeholder="Date de fin" value="">
        </div>
        <div class="m-form__label m-form__select-tab">
          <label for="projet__statut">État du projet</label>
          <select name="projet__statut">
            <option value="Projet en cours" selected>Projet en cours</option>
            <option value="Projet terminé">Projet terminé</option>
            <option value="Projet annulé">Projet annulé</option>
          </select>
        </div>
      </div>


      <?php // Ajout deuxième étape du formulaire : le Diffuseur ?>

      <div class="m-form__wrapper m-form__step-2">
        <div class="m-form__label m-form__select-list m-form__with-btn">
          <label for="diffuseur__societe">Nom du diffuseur</label>
          <select name="diffuseur__societe" required>
            <?php the_diffuseurs_list(); ?>
          </select>
          <button class="btn btn__outline btn__ico"><?php include './assets/img/ico_modifier.svg.php'; ?></button>
          <button class="btn btn__outline btn__ico"><?php include './assets/img/ico_ajouter.svg.php'; ?></button>
        </div>
      </div>


      <?php // Ajout troisième étape du formulaire : l'Équipe ?>

      <div class="m-form__wrapper m-form__step-3">
        <div class="m-form__label m-form__radio-horiz">
          <label for="nom_du_projet">Seul•e ou plusieurs ?</label>
          <span class="m-form__radio-txt subtitle">
            Allez-vous réaliser ce projet avec d’autres Artistes-Auteurs ?
          </span>
          <div class="m-form__radio">
            Non
            <input type="radio" name="projet__retrocession" value="0" checked>
            <span class="checkmark"></span>
          </div>
          <div class="m-form__radio">
            Oui
            <input type="radio" name="projet__retrocession"value="1" >
            <span class="checkmark"></span>
          </div>
        </div>
        <div class="m-form__equipe">
          <div class="m-form__label m-form__select-list m-form__with-btn">
            <label for="diffuseur__societe">Liste des coéquipiers</label>
            <select name="diffuseur__societe" required>
              <?php the_artistes_list(); ?>
            </select>
            <button class="btn btn__outline btn__ico"><?php include './assets/img/ico_modifier.svg.php'; ?></button>
            <button class="btn btn__outline btn__ico"><?php include './assets/img/ico_enlever.svg.php'; ?></button>
          </div>
          <div class="m-form__info m-form__with-btn">
            <span class="body btn__ico-label">Ajouter un•e Artiste-Auteur</span>
            <button class="btn btn__outline btn__ico"><?php include './assets/img/ico_ajouter.svg.php'; ?></button>
          </div>
        </div>
      </div>


      <?php // Ajout la barre avec les boutons ?>

      <div class="m-form__submit-bar m-btn__grp">
        <button class="btn btn__outline btn__ico"><?php include './assets/img/ico_corbeille.svg.php'; ?></button>
        <button class="btn btn__outline btn__cancel">Annuler</button>
        <button class="btn btn__outline btn__prev">Précédent</button>
        <button class="btn btn__plain btn__next">Suivant</button>
        <button class="btn btn__plain btn__submit">Valider</button>
      </div>
    </div>
  </form>
</div>
