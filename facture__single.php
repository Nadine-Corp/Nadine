<?php

// Ce fichier gére l'affichage des factures et devis.
// C'est grâce à ce fichier que l'utilisateur peut éditer
// et envoyer ses factures et devis. Ce fichier est donc essentiel
// pour gagner de l'argent.

/**
 * Récupère les infos dans l'URL de la page
 */

// Récupère l'ID du projet
if (isset($_GET['projet__id'])) {
  $projet__id = $_GET['projet__id'];
}

// Récupère la bonne table
if (isset($_GET['devis__id'])) {
  $table = 'Devis';
  $prefix = 'devis';
} elseif (isset($_GET['facturea__id'])) {
  $table = 'Facturesacompte';
  $prefix = 'facturea';
} elseif (isset($_GET['facture__id'])) {
  $table = 'Factures';
  $prefix = 'facture';
}

// Récupère l'id de la facture ou devis
if (isset($_GET[$prefix . '__id'])) {
  $facture__id = $_GET[$prefix . '__id'];
}


/**
 * Si les infos de la facture ou devis n'existe pas : redirection vers la page Projets
 */

if (!isset($projet__id) || !isset($table) || !isset($facture__id)) {
  header('Location: ./projets.php');
  die();
}


/**
 * Ajout du Header
 */

include './header.php';
?>

<main class="l-facture" role="main">

  <?php

  /**
   * Récupère les infos dans la base de données
   */


  // Vérifie s'il s'agit d'une nouvelle facture ou devis
  if ($facture__id == 'new') {
    $args = array(
      'FROM'     => 'Projets',
      'JOIN'     => 'Diffuseurs ON Projets.diffuseur__id = Diffuseurs.diffuseur__id',
      'JOIN '    => 'Profil ON Profil.profil__id = (SELECT MAX(profil__id) FROM Profil)',
      'WHERE'    => 'Projets.projet__id =' . $projet__id
    );
  } else {
    $args = array(
      'FROM'     => $table . ', Profil',
      'WHERE'    => $prefix . '__id' . ' = ' . $facture__id,
      'AND'      => $table . '.profil__id = Profil.profil__id',
      'LIMIT'    => 1
    );
  }
  $loop = nadine_query($args);


  /**
   * Récupère le numéros de la facture ou devis
   */

  ?>
  <?php if ($loop->num_rows > 0) : ?>
    <?php while ($row = $loop->fetch_assoc()) : ?>

      <?php // Ajout du formulaire 
      ?>

      <form class="m-form m-row" action="./core/form__facture.php" method="post" autocomplete="off">

        <?php // Ajout du fil d'Ariane 
        ?>
        <section class="m-breadcrumb">
          <a href="./projets.php" class="m-breadcrumb__link m-body">Projets</a>
          <a href="./projet__single.php?projet__id=<?php the_projet_id($row) ?>" class="m-breadcrumb__link m-body"><?php the_projet_name($row) ?></a>
          <a href="<?php the_facture_link($row) ?>" class="m-breadcrumb__link m-body"><?php the_facture_numero($row, $table) ?></a>
        </section>

        <?php
        /**
         * Aside
         */
        ?>

        <aside class="m-aside">
          <div class="m-form__label m-form__select-tab">
            <?php if ($table == 'Devis') : ?>
              <label for="facture__statut">État du devis</label>
            <?php else: ?>
              <label for="facture__statut">État de la facture</label>
            <?php endif; ?>
            <select name="facture__statut" data-selected="<?php the_facture_statut($row) ?>">
              <option value="Brouillon">Brouillon</option>
              <option value="Envoyé">Envoyé</option>
              <option value="Relancé">Relancé</option>
              <?php if ($table == 'Devis') : ?>
                <option value="Signé">Signé</option>
              <?php endif; ?>
              <?php if ($table != 'Devis') : ?>
                <option value="Payé">Payé</option>
              <?php endif; ?>
              <option value="Annulé">Annulé</option>
            </select>
          </div>

          <div class="m-btn__grp m-btn__grp-v">
            <a href="javascript:window.print()" class="btn btn__outline">
              Imprimer en PDF
            </a>
            <a href="./parts/p__volet-facture-message" class="btn btn__outline btn__volet" data-volet='facturemsg'>
              Générer le couriel
            </a>
            <?php if ($facture__id != 'new') : ?>
              <a href="./facture__single.php?projet__id=<?php echo $projet__id ?>&<?php echo $prefix ?>__id=new&from__table=<?php echo $table ?>&from__id=<?php echo $facture__id ?>" class="btn btn__outline">
                Dupliquer
              </a>
            <?php endif; ?>
            <?php if ($table == 'Devis' && $facture__id != 'new') : ?>
              <a href="./facture__single.php?projet__id=<?php echo $projet__id ?>&facture__id=new&from__table=<?php echo $table ?>&from__id=<?php echo $facture__id ?>" class="btn btn__outline">
                Générer la facture
              </a>
            <?php endif; ?>
          </div>
          <div class="m-form__submit-bar m-btn__grp">
            <button class="btn btn__outline btn__ico btn__delete btn__modal" data-modal="delete" data-table="<?php echo $table ?>" data-prefix="<?php echo $prefix ?>" data-id="<?php echo $facture__id ?>" data-location="projet__single.php?projet__id=<?php the_projet_id($row) ?>">
              <?php include(__DIR__ . '/assets/img/ico_corbeille.svg.php'); ?>
            </button>
            <a href="./projet__single.php?projet__id=<?php the_projet_id($row) ?>" class="btn btn__outline btn__cancel">Annuler</a>
            <button class="btn btn__plain btn__submit" type="submit">Enregistrer</button>
          </div>

          <?php
          // Ajout le statut du précompte
          // sur cette facture ou devis
          ?>
          <div class="m-aside__bottom">
            <span class="m-body m-aside__info">
              <?php if (isset($row[$prefix . '__precompte'])) : ?>
                <?php if ($row[$prefix . '__precompte'] == 1) : ?>
                  <span class="m-ss">Information :</span> <em>Le précompte est activé sur ce projet.</em>
                <?php else : ?>
                  <span class="m-ss">Information :</span> <em>Le précompte est désactivé sur ce projet.</em>
                <?php endif; ?>
              <?php endif; ?>
            </span>
          </div>
        </aside>

        <?php
        /**
         * Sélection du bon Template de facture
         */

        ?>
        <section class="m-rom with--aside">
          <div class="m-col">

            <?php
            // Ajoute des champs caché pour simplifier l'ajout
            // et la modification des factures ou devis dans la base de données
            ?>

            <input type="hidden" name="facture__id" placeholder="facture__id" value="<?php the_facture_id($row) ?>">
            <input type="hidden" name="facture__table" placeholder="facture__table" value="<?php echo get_facture_table($row, $table) ?>">
            <input type="hidden" name="facture__template" placeholder="facture__template" value="<?php the_facture_template($row, $table) ?>">
            <input type="hidden" name="facture__prefix" placeholder="facture__prefix" value="<?php the_facture_prefix($table) ?>">
            <input type="hidden" name="facture__date" placeholder="date" value="<?php the_facture_date($row, 'brut'); ?>">
            <input type="hidden" name="facture__numero" placeholder="facture__numero" value="<?php the_facture_numero($row, $table) ?>">
            <input type="hidden" name="projet__nom" placeholder="projet__nom" value="<?php echo $row["projet__nom"] ?>">
            <input type="hidden" name="projet__numero" placeholder="projet__numero" value="<?php echo $row["projet__numero"] ?>">
            <input type="hidden" name="diffuseur__id" placeholder="diffuseur__id" value="<?php echo $row["diffuseur__id"] ?>">
            <input type="hidden" name="diffuseur__type" placeholder="diffuseur__type" value="<?php echo $row["diffuseur__type"] ?>">
            <input type="hidden" name="diffuseur__societe" placeholder="diffuseur__societe" value="<?php echo $row["diffuseur__societe"] ?>">
            <input type="hidden" name="diffuseur__siret" placeholder="diffuseur__siret" value="<?php echo $row["diffuseur__siret"] ?>">
            <input type="hidden" name="diffuseur__civilite" placeholder="diffuseur__civilite" value="<?php echo $row["diffuseur__civilite"] ?>">
            <input type="hidden" name="diffuseur__prenom" placeholder="diffuseur__prenom" value="<?php echo $row["diffuseur__prenom"] ?>">
            <input type="hidden" name="diffuseur__nom" placeholder="diffuseur__nom" value="<?php echo $row["diffuseur__nom"] ?>">
            <input type="hidden" name="diffuseur__adresse" placeholder="diffuseur__adresse" value="<?php echo $row["diffuseur__adresse"] ?>">
            <input type="hidden" name="diffuseur__code_postal" placeholder="diffuseur__code_postal" value="<?php echo $row["diffuseur__code_postal"] ?>">
            <input type="hidden" name="diffuseur__ville" placeholder="diffuseur__ville" value="<?php echo $row["diffuseur__ville"] ?>">
            <input type="hidden" name="diffuseur__pays" placeholder="diffuseur__pays" value="<?php echo $row["diffuseur__pays"] ?>">
            <input type="hidden" name="diffuseur__telephone" placeholder="diffuseur__telephone" value="<?php echo $row["diffuseur__telephone"] ?>">
            <input type="hidden" name="diffuseur__email" placeholder="diffuseur__email" value="<?php echo $row["diffuseur__email"] ?>">
            <input type="hidden" name="diffuseur__website" placeholder="diffuseur__website" value="<?php echo $row["diffuseur__website"] ?>">
            <input type="hidden" name="facture__total" placeholder="Total" class="facture__subheading">
            <input type="hidden" name="projet__id" placeholder="projet__id" value="<?php the_projet_id($row) ?>">
            <input type="hidden" name="profil__id" placeholder="profil__id" value="<?php the_profil_id($row) ?>">

            <?php
            // Affiche le Template de facture ou devis
            include(__DIR__ . get_facture_template_url($projet__id, $table, $facture__id));
            ?>
          </div>
        </section>

      </form>

    <?php
      /**
       * Ajout des modales
       */

      include './parts/p__volet-facturemsg.php';
    endwhile;
  else : ?>
    <section class="m-rom">
      <p>Chef, on n'a pas trouvé de facture en cours...</p>
    </section>
  <?php endif; ?>



  <?php
  /**
   * Ajout des modales
   */

  include './parts/p__modal-delete.php';


  /**
   * Ajout du Footer
   */

  include './footer.php';
