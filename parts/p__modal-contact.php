<?php

// Ce fichier permet de controler l'affichage de la modale
// permettant d'ajouter un nouveau contact


/**
 * Importe le fichier rassemblant toutes les fonctions
 * les plus importantes de Nadine
 */

include_once(__DIR__ . '/../core/fonctions.php');
//nadine_log("Nadine ouvre le fichier p__modal-contact.php");


/**
 * Vérifie si la modale doit être préremplie
 */

if (isset($_GET['id'])) {
  nadine_log("Nadine préremplie la modale Ajouter un contact");

  // Récupère l'ID du contact
  $contact__id = $_GET['id'];

  // Vérifie si la modale doit être préremplie ou vidée
  if ($contact__id == 'new') {
    // Réinitialise la variable $row pour éviter toute interférence
    // avec le chargement de la modale Contact

    nadine_log("Nadine vide la modale");
    $row = array();
  } else {
    // Récupère la table
    $contact__table = $_GET['table'];

    // Récupère les infos du projet dans la base de données
    if ($contact__table == 'Diffuseurs') {
      $args = array(
        'FROM'     => 'diffuseurs',
        'WHERE'    => 'diffuseur__id =' . $contact__id,
      );
    } else {
      $args = array(
        'FROM'     => 'artistes',
        'WHERE'    => 'artiste__id =' . $contact__id,
      );
    };
    $loop = nadine_query($args);

    if ($loop->num_rows > 0) {
      $row = $loop->fetch_assoc();
    }
  }
}
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



    <?php // Ajout du formulaire 
    ?>

    <form class="m-form m-form__step" action="./core/form__contact.php" method="post">

      <?php // Ajout de la navigation 
      ?>

      <nav class="m-form__nav">
        <ul>
          <li class="m-lead is--active" data-step="1">Type de contact</li>
          <li class="m-lead" data-step="2">Identité</li>
          <li class="m-lead" data-step="3">Coordonnées</li>
        </ul>
      </nav>

      <?php // Ajout première étape du formulaire : Type de contact 
      ?>
      <div class="m-form__wrapper m-form__step-1">

        <?php // L'Input contact__id est nécessaire pour mettre à jour des contacts
        ?>
        <div class="m-form__label-amimate m-form__hide">
          <label for="contact__nom">ID du contact</label>
          <input type="text" name="contact__id" placeholder="ID du contact" value="<?php the_contact_id($row); ?>">
        </div>

        <div class="m-form__label m-form__select-tab">
          <label for="contact__type">Type de contacts</label>
          <select name="contact__type" data-selected="<?php the_contact_type($row) ?>">
            <option value="Diffuseur" selected>Diffuseur</option>
            <option value="Artiste-Auteur">Artiste-Auteur</option>
          </select>
          <div class="m-form__instructions m-body">
            <strong class="m-ss">Information :</strong><em> Les </em>Diffuseurs<em> sont les personnes physiques ou morales qui rémunèrent un•e </em>Artiste-Auteur<em> en vue de diffuser, exploiter ou utiliser son œuvre. Autrement dit : les </em>Diffuseurs<em> sont les clients des </em>Artistes-Auteurs<em>.</em>
          </div>
        </div>
        <div class="m-form__label m-form__select-tab not--for--artiste-auteur">
          <label for="diffuseur__type">Type de diffuseurs</label>
          <select name="diffuseur__type" data-selected="<?php the_diffuseur_type($row) ?>">
            <option value="Galerie d’art">Galerie d’art</option>
            <option value="Particulier">Particulier</option>
            <option value="Autre" selected>Autre</option>
          </select>
        </div>
      </div>


      <?php // Ajout deuxième étape du formulaire : Identité 
      ?>

      <div class="m-form__wrapper m-form__step-2">
        <div class="m-form__grp">
          <div class="m-form__label m-modal__contact-civilite">
            <?php $value = get_contact_civilite($row); ?>
            <label for="contact__civilite">Civilité</label>
            <div class="m-form__radio-horiz">
              <div class="m-form__radio">
                M.
                <input name="contact__civilite" type="radio" value="M." <?php if (empty($value) || $value == "M.") echo "checked"; ?>>
                <span class="checkmark"></span>
              </div>
              <div class="m-form__radio">
                Mme
                <input name="contact__civilite" type="radio" value="Mme" <?php if ($value == "Mme") echo "checked"; ?>>
                <span class="checkmark"></span>
              </div>
            </div>
          </div>
          <div class="m-form__label-amimate">
            <label for="contact__prenom">Prénom</label>
            <input type="text" name="contact__prenom" placeholder="Prénom" value="<?php the_contact_prenom($row); ?>">
          </div>
          <div class="m-form__label-amimate">
            <label for="contact__nom">Nom</label>
            <input type="text" name="contact__nom" placeholder="Nom" value="<?php the_contact_nom($row); ?>">
          </div>
        </div>
        <div class="m-form__grp not--for--particulier">
          <div class="m-form__label-amimate">
            <label for="contact__societe">Société</label>
            <input type="text" name="contact__societe" placeholder="Société" value="<?php the_contact_societe($row); ?>">
          </div>
          <div class="m-form__label-amimate">
            <label for="contact__siret">N° de Siret</label>
            <input type="text" name="contact__siret" placeholder="N° de Siret" value="<?php the_contact_siret($row); ?>">
          </div>
        </div>
        <div class="m-form__grp not--for--diffuseur">
          <div class="m-form__label-amimate">
            <label for="contact__numero_secu">N° de Sécu</label>
            <input type="text" name="contact__numero_secu" placeholder="N° de Sécu" required value="<?php the_artiste_numero_secu($row); ?>">
          </div>
          <div class="m-form__label-amimate">
            <label for="contact__numero_mda">N° de MDA</label>
            <input type="text" name="contact__numero_mda" placeholder="N° de MDA" required value="<?php the_artiste_numero_mda($row); ?>">
          </div>
        </div>
      </div>


      <?php // Ajout troisième étape du formulaire : Coordonnées 
      ?>

      <div class="m-form__wrapper m-form__step-3">
        <div class="m-form__label-amimate">
          <label for="contact__adresse">Adresse</label>
          <input type="text" name="contact__adresse" placeholder="Adresse" value="<?php the_contact_adresse($row); ?>">
        </div>
        <div class=" m-form__grp">
          <div class="m-form__label-amimate">
            <label for="contact__code_postal">Code postal</label>
            <input type="text" name="contact__code_postal" placeholder="Code postal" value="<?php the_contact_code_postal($row); ?>">
          </div>
          <div class=" m-form__label-amimate">
            <label for="contact__ville">Ville</label>
            <input type="text" name="contact__ville" placeholder="Ville" value="<?php the_contact_ville($row); ?>">
          </div>
          <div class=" m-form__label-amimate">
            <label for="contact__pays">Pays</label>
            <input type="text" name="contact__pays" placeholder="Pays" required value="<?php the_contact_pays($row); ?>">
          </div>
        </div>
        <div class="m-form__grp">
          <div class="m-form__label-amimate">
            <label for="contact__telephone">Téléphone</label>
            <input type="text" name="contact__telephone" placeholder="Téléphone" value="<?php the_contact_telephone($row); ?>">
          </div>
          <div class=" m-form__label-amimate">
            <label for="contact__email">Courriel</label>
            <input type="text" name="contact__email" placeholder="Courriel" value="<?php the_contact_email($row); ?>">
          </div>
          <div class="m-form__label-amimate">
            <label for="contact__website">Site internet</label>
            <input type="text" name="contact__website" placeholder="Site internet" value="<?php the_contact_website($row); ?>">
          </div>
        </div>
      </div>


      <?php // Ajout la barre avec les boutons 
      ?>

      <div class="m-form__submit-bar m-btn__grp">
        <?php
        // Ajout un bouton Supprimé si le contact existe déjà
        if (!empty(get_contact_id($row))) : ?>
          <button class="btn btn__outline btn__ico btn__delete btn__modal" data-modal="delete" data-table="<?php the_contact_table($row) ?>" data-prefix="<?php the_contact_prefix($row) ?>" data-id="<?php the_contact_id($row) ?>" data-location="contacts.php">
            <?php include(__DIR__ . '/../assets/img/ico_corbeille.svg.php'); ?>
          </button>
        <?php endif; ?>
        <button class="btn btn__outline btn__cancel" type="button">Annuler</button>
        <button class="btn btn__outline btn__prev" type="button">Précédent</button>
        <button class="btn btn__plain btn__next" type="button">Suivant</button>
        <button class="btn btn__plain btn__submit" type="submit">Enregistrer</button>
      </div>

    </form>
  </div>
</div>