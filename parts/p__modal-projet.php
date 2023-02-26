<?php

// Ce fichier permet de controler l'affichage de la modal
// permettant d'ajouter un nouveau projet

/**
 * Importe le fichier rassemblant toutes les fonctions
 * les plus importantes de Nadine
 */

include_once(__DIR__ . '/../core/fonctions.php');


/**
 * Vérifie si la modal doit être préremplie
 */

if (isset($_GET['id'])) {
  // Récupère l'ID du projet
  $projet__id = $_GET['id'];

  // Récupère les infos du projet dans la base de données
  $args = array(
    'FROM'     => 'Projets, Diffuseurs',
    'WHERE'    => 'Projets.projet__id =' . $projet__id,
    'AND'      => 'Projets.diffuseur__id = Diffuseurs.diffuseur__id'
  );
  $loop = nadine_query($args);

  if ($loop->num_rows > 0) {
    $row = $loop->fetch_assoc();
  }
}

?>

<div class="m-modal__projet m-modal">
  <div class="m-modal__denko">
    <div class="is--denko__container m-row">
      <ul>
        <li class="is--denko">
          <span class="m-display">Ajouter un projet</span>
        </li>
      </ul>
    </div>
  </div>
  <div class="m-modal__wrapper">



    <?php // Ajout du formulaire 
    ?>

    <form class="m-form m-form__step" action="./core/add__projet.php" method="post">

      <?php // Ajout de la navigation 
      ?>

      <nav class="m-form__nav">
        <ul>
          <li class="m-lead is--active" data-step="1">Information</li>
          <li class="m-lead" data-step="2">Diffuseur</li>
          <li class="m-lead" data-step="3">Équipe</li>
        </ul>
      </nav>

      <?php // Ajout première étape du formulaire : les Informations 
      ?>
      <div class="m-form__wrapper m-form__step-1">

        <?php // L'Input projet__id est nécessaire pour mettre à jour des projets
        ?>
        <div class="m-form__label-amimate m-form__hide">
          <label for="projet__nom">ID du projet</label>
          <input type="text" name="projet__id" placeholder="ID du projet" value="<?php the_projet_id($row); ?>">
        </div>

        <div class="m-form__label-amimate">
          <label for="projet__nom">Nom du projet</label>
          <input type="text" name="projet__nom" placeholder="Nom du projet" value="<?php the_projet_name($row); ?>" required>
        </div>
        <div class="m-form__grp">
          <div class="m-form__label not--for--new--projet">
            <label for="projet__date_de_creation">Date de création</label>
            <input type="date" name="projet__date_de_creation" placeholder="Date de création" value="<?php the_projet_date_de_creation($row) ?>" required>
          </div>
          <div class="m-form__label not--for--new--projet">
            <label for="projet__date_de_fin">Date de fin</label>
            <input type="date" name="projet__date_de_fin" placeholder="Date de fin" value="<?php the_projet_date_de_fin($row) ?>" disabled>
          </div>
        </div>
        <div class="m-form__label m-form__select-tab not--for--new--projet">
          <label for="projet__statut">État du projet</label>
          <select name="projet__statut" data-selected="<?php the_projet_statut($row) ?>">
            <option value="Projet en cours">Projet en cours</option>
            <option value="Projet terminé">Projet terminé</option>
            <option value="Projet annulé">Projet annulé</option>
          </select>
        </div>
      </div>


      <?php // Ajout deuxième étape du formulaire : le Diffuseur 
      ?>

      <div class="m-form__wrapper m-form__step-2">
        <div class="m-form__label m-form__select-list m-form__with-btn">
          <label for="diffuseur__id">Nom du diffuseur</label>
          <select name="diffuseur__id" data-selected='<?php the_diffuseur_id($row) ?>' required>
            <?php the_diffuseurs_list(); ?>
          </select>
          <button class="btn btn__outline btn__ico" type="button"><?php include(__DIR__ . '/../assets/img/ico_modifier.svg.php'); ?></button>
          <button class="btn btn__outline btn__ico" type="button"><?php include(__DIR__ . '/../assets/img/ico_ajouter.svg.php'); ?></button>
        </div>
      </div>


      <?php // Ajout troisième étape du formulaire : l'Équipe 
      ?>

      <div class="m-form__wrapper m-form__step-3">
        <div class="m-form__label m-form__radio-horiz">
          <?php $value = get_projet_retrocession($row); ?>
          <label for="nom_du_projet">Seul•e ou plusieurs ?</label>
          <span class="m-form__radio-txt m-lead">
            Allez-vous réaliser ce projet avec d’autres Artistes-Auteurs ?
          </span>
          <div class="m-form__radio">
            Non
            <input type="radio" name="projet__retrocession" value="0" <?php if (empty($value) || $value == "0") {
                                                                        echo "checked";
                                                                      } ?>>
            <span class="checkmark"></span>
          </div>
          <div class="m-form__radio">
            Oui
            <input type="radio" name="projet__retrocession" value="1" <?php if ($value == "1") {
                                                                        echo "checked";
                                                                      } ?>>
            <span class="checkmark"></span>
          </div>
        </div>
        <div class="m-form__equipe">
          <label for="artiste__1">Liste des coéquipiers</label>

          <?php // INFO : la div.m-form__artiste sera dubliquée si qq'un clic
          // sur Ajouter un•e Artiste-Auteur 
          ?>

          <?php the_projet_input_equipe($row); ?>

          <div class="m-form__info m-form__with-btn">
            <span class="m-body btn__ico-label">Ajouter un•e Artiste-Auteur</span>
            <button class="btn btn__outline btn__ico btn__add-artiste" type="button"><?php include(__DIR__ . '/../assets/img/ico_ajouter.svg.php'); ?></button>
          </div>

          <?php // INFO : la div.m-form__artiste sera dubliqué si qq'un clic
          // sur Ajouter un•e Artiste-Auteur 
          ?>
          <div class="m-form__label m-form__select-list m-form__porteurduprojet">
            <label for="projet__porteurduprojet">Quel•le Artiste-Auteur va facturer au diffuseur ?</label>
            <select name="projet__porteurduprojet" required>
              <option value="0">Vous</option>
            </select>
          </div>
        </div>
      </div>


      <?php // Ajout la barre avec les boutons 
      ?>

      <div class="m-form__submit-bar m-btn__grp">
        <button class="btn btn__outline btn__ico"><?php include(__DIR__ . '/../assets/img/ico_corbeille.svg.php'); ?></button>
        <button class="btn btn__outline btn__cancel" type="button">Annuler</button>
        <button class="btn btn__outline btn__prev" type="button">Précédent</button>
        <button class="btn btn__plain btn__next" type="button">Suivant</button>
        <button class="btn btn__plain btn__submit" type="submit">Enregistrer</button>
      </div>
  </div>
  </form>
</div>